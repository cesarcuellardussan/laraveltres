<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use DataTables;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $orders = Order::where('status_id',2)->get();
            $data = array();
            foreach ($orders as $key => $order) {
                $data[] = [
                    'id'     => $key+1,
                    'food'   => ($order->food_id == null)?'SIN ELEGIR':$order->food->name,
                    'status' => $order->status->name,
                    'action' => '<button class="btn btn-sm btn-info shadow" data-food-id="'.$order->food_id.'" data-order-id="'.$order->id.'" data-toggle="modal" data-target="#deposit" onclick="loadDeposit(this)">Verificar</button>'

                ];
            }
            return Datatables::of($data)->addIndexColumn()->make(true);
        }
        return view('warehouse');
    }
}
