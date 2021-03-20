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

    public function GenerateFormat()
    {
        Excel::create('FormatPDB', function($excel) {

            // Set the title
            $excel->setTitle('FormatPDB');

            // Chain the setters
            $excel->setCreator('chafri')
                    ->setCompany('BPS');

            // Call them separately
            $excel->setDescription('Format Excel input data pdb');
        })->download('xlsx');
    }

}
