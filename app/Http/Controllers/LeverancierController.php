<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeverancierController extends Controller
{

    private $LevarancierModel;

    public function __construct()
    {
        $this->LevarancierModel = app('App\Models\Levarancier');
    }
    public function index()
    {
        
       

        return view('leverancier.index');
    }
}
