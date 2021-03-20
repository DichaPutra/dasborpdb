<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DataPdbController extends Controller {

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
        return view('DataPdb');
    }

    public function GenerateFormat(Request $request)
    {
        $request->wilayah;
    }

}
