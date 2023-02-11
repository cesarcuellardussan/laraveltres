<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use DataTables;

class KitchenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $orders = Order::get();
            $data = array();
            foreach ($orders as $key => $order) {
                switch ($order->status_id) {
                    case 1:
                        $action = '<button class="btn btn-sm btn-primary shadow" data-order="'.$order->id.'" onclick="dispatch(this)">Elegir plato</button>';
                        break;
                    case 2:
                        $action = '<button class="btn btn-sm btn-secondary shadow" data-food-id="'.$order->food_id.'" data-food-name="'.$order->food->name.'" data-toggle="modal" data-target="#recipe-detail" onclick="recipe(this)">Ver receta</button>';
                        break;
                    case 3:
                        $action = '<button class="btn btn-sm btn-success btn-block shadow" data-order="'.$order->id.'" onclick="dispatch(this)">Preparar/Entregar</button>';
                        break;
                    case 4:
                        $action = '<button class="btn btn-sm btn-success shadow" data-food-id="'.$order->food_id.'" data-food-name="'.$order->food->name.'" data-toggle="modal" data-target="#recipe-detail" onclick="recipe(this)">Ver receta</button>';
                        break;
                    default:
                        # code...
                        break;
                }
                $data[] = [
                    'id'     => $key+1,
                    'food'   => ($order->food_id == null)?'SIN ELEGIR':$order->food->name,
                    'status' => $order->status->name,
                    'action' => $action
                ];
            }
            return Datatables::of($data)->addIndexColumn()->make(true);
        }
        return view('kitchen');
    }
}
