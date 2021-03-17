<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataPdrbController extends Controller {

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
        echo 'Data PDRB VIEW';
    }

}
