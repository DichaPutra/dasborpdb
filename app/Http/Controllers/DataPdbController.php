<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\excelformat;
use App\Models\wilayah;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\excelformatExport;

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

        $wilayah = wilayah::all();
        return view('DataPdb', ["wilayah" => $wilayah]);
    }

    public function GenerateFormat(Request $request)
    {
        $wilayah = $request->wilayah;
        $tahun = $request->tahun;

        //empty data table excelformat
        excelformat::truncate();
        //
        foreach ($tahun as $th)
        {
            for ($a = 1; $a <= 18; $a++)
            {
                $data = new excelformat;
                $data->idWilayah = $wilayah;
                $data->idSektor = $a;
                $data->tahun = $th;
                $data->pdrb = null;
                $data->save();

            }
        }

        return (new excelformatExport)->download('formatinputpdb.xlsx');
    }

}
