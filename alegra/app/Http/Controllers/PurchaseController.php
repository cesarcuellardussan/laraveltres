<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Order;
use App\Models\Purchase;
use App\Services\AlegraService;
use Illuminate\Http\Request;
use DataTables;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $purchases = Purchase::get();
            $data = array();
            foreach ($purchases as $key => $purchase) {
                // return $purchase->created_at->format('Y-m-d H:i:s');
                $data[] = [
                    'id'          => $key+1,
                    'fecha'       => $purchase->created_at->format('Y-m-d H:i:s'),
                    'ingrediente' => $purchase->ingredient['name'],
                    'cantidad'    => $purchase->quantity
                ];
            }
            return Datatables::of($data)->addIndexColumn()->make(true);
        }
        return view('purchase');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlegraService $alegraService, $ingredient_id)
    {
        try {
            $ingredient = Ingredient::find($ingredient_id);
            $quantity = $alegraService->shopIngredient($ingredient->code);
            if ($quantity) {
                $ingredient->update([
                    "stock" => $ingredient->stock + $quantity
                ]);
                Purchase::create([
                    "ingredient_id" => $ingredient_id,
                    "quantity"      => $quantity
                ]);
                return $this->successResponse([
                    'title' => 'Compra hecha!',
                    'text'  => 'Se compro x'.$quantity.' de '.$ingredient->name.' se actualizo el stock',
                    'icon'  => 'success'
                ], 200);
            }else{
                return $this->successResponse([
                    'title' => 'Lo sentimos!',
                    'text'  => 'El ingrediente '.$ingredient->name.' no esta disponible en la plaza de mercado',
                    'icon'  => 'error'
                ], 200);
            }
        } catch (\Throwable $th) {
            return $this->errorResponse('Ocurrio un error al intentar crear el recurso. Detalle: ' . $th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
