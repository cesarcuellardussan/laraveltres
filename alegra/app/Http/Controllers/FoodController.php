<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\value;
use Illuminate\Http\Request;
use DataTables;

class FoodController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deposit(Request $request,$food_id)
    {
        $verificado = true;
        if ($request->ajax()) {
            $food = Food::find($food_id);
            $data = array();
            foreach ($food->ingredients as $key => $value) {
                if (($value->pivot->quantity > $value->stock)) {
                    $action = '<button class="btn btn-sm btn-primary shadow" data-ingredient-id="'.$value->id.'" onclick="purchase(this)">Comprar</button>';
                    $verificado = false;
                }else{
                    $action = '<strong class="text-success">Disponible</strong>';
                }
                $data[] = [
                    'ingrediente' => $value->name,
                    'requerido'   => $value->pivot->quantity,
                    'inventario'  => $value->stock,
                    'action'      => $action
                ];
            }
            return Datatables::of($data)->addIndexColumn()->with(['verificado' => $verificado])->make(true);
        }
        return view('deposit');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        try {
            $ingredients = $food->ingredients;
            $data = array();
            foreach ($ingredients as $ingredient) {
                $data[] = [
                    'quantity' => $ingredient->pivot['quantity'],
                    'name'     => $ingredient->name,
                    'id'       => $ingredient->id,
                    'image'    => $ingredient->image_dir
                ];
            }
            return $this->successResponse($data, 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Ocurrio un error al intentar crear el recurso. Detalle: ' . $th->getMessage(), 500);
        }
    }
}
