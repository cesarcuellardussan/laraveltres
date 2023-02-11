<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Ingredient;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('order');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|min:1|max:100',
        ],[
            'quantity.required' => 'El campo quantity es obligatorio',
            'quantity.numeric' => 'El campo quantity debe ser numérico',
            'quantity.min' => 'El campo quantity debe ser al menos 1',
            'quantity.max' => 'El campo quantity debe ser como máximo 100',
        ]);
        try {
            if ($validator->fails()) {
                return $this->errorResponse($validator->errors()->first(), 400);
            } else {
                $orders = array_fill(0, $request->quantity, ["status" => 1]);
                foreach ($orders as $order) {
                    Order::create($order);
                }
                if ($request->quantity>1) {
                    return $this->successResponse([
                        'title' => 'Ordenes creadas!',
                        'text'  => 'Se ha enviado una orden a la cocina para preparar '.count($orders).' nuevos platos',
                        'icon'  => 'success'
                    ], 200);
                }else{
                    return $this->successResponse([
                        'title' => 'Orden creada!',
                        'text'  => 'Se ha enviado una orden a la cocina para preparar un nuevo plato',
                        'icon'  => 'success'
                    ], 200);
                }
            }
        } catch (\Throwable $th) {
            return $this->errorResponse('Ocurrio un error al intentar crear el recurso. Detalle: ' . $th->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        try {
            $Order = Order::findOrFail($id);
            // return $food = Food::find($Order->food_id);
            if ($Order->status_id == 1) {
                $food_id = mt_rand(1, 6);
                $Order->update([
                    "food_id"   => $food_id,
                    "status_id" => 2
                ]);
                return $this->successResponse([
                    'title' => 'Plato elegido!',
                    'text'  => 'El plato fue elegido y se envio la solicitud de ingredientes a la bodega',
                    'icon'  => 'success'
                ], 200);
            }else if($Order->status_id == 2){
                $food = Food::find($Order->food_id);
                $data = array();
                DB::beginTransaction();
                foreach ($food->ingredients as $key => $value) {
                    if (($value->pivot->quantity > $value->stock)) {
                        DB::rollback();
                        return $this->successResponse([
                            'title' => 'Lo sentimos!',
                            'text'  => 'No se pudo entregar los ingredientes porque estan incompletos',
                            'icon'  => 'error'
                        ], 200);
                    }
                    Ingredient::where('id',$value->pivot->ingredient_id)->update([
                        "stock" => $value->stock - $value->pivot->quantity
                    ]);
                }
                $Order->update(["status_id" => 3]);
                DB::commit();
                return $this->successResponse([
                    'title' => 'Ingredientes entregados!',
                    'text'  => 'La cocina puede iniciar la preparación',
                    'icon'  => 'success'
                ], 200);
            }else if($Order->status_id == 3){
                $Order->update([
                    "status_id" => 4
                ]);
                return $this->successResponse([
                    'title' => 'Orden completada!',
                    'text'  => 'El plato esta listo para ser servido',
                    'icon'  => 'success'
                ], 200);
            }
        } catch (\Throwable $th) {
            return $this->errorResponse('Ocurrio un error al intentar crear el recurso. Detalle: ' . $th->getMessage(), 500);
        }
    }
}
