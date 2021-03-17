<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WilayahProvinsiController extends Controller {

    /**
     * CONSTRUCT
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * FUNCTION
     */
    public function index()
    {
        return view('WilayahProvinsi');
    }

}
