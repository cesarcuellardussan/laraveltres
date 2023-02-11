<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener platos disponibles del restaurante de la base de datos
        $foods = Food::get();
        return view('home', ['foods' => $foods]);
    }
}
