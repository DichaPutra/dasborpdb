<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\excelformat;
use App\Models\wilayah;
use App\Models\sektor;
use App\Models\data;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\excelformatExport;
use App\Imports\dataImport;

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

        // data untuk dropdown wilayah
        $wilayah = wilayah::all();
        $wilayah2 = wilayah::all();

        //data untuk melihat semua data pdrb
        $sql = 'SELECT * FROM `data` a, wilayah b, sektor c WHERE a.idWilayah = b.idWilayah AND a.idSektor = c.idSektor';
        $pdrb = DB::select($sql);

//        dd($pdrb);
        return view('DataPdb',
                ["wilayah" => $wilayah, "wilayah2" => $wilayah2, "pdrb" => $pdrb]);
    }

    public function pdbFilter(Request $request)
    {

        //get data
        $wil = $request->wilayah;
        $th = $request->tahun;


        // data untuk dropdown wilayah
        $wilayah = wilayah::all();
        $wilayah2 = wilayah::all();

        //data untuk melihat semua data pdrb
        $sql = "SELECT * FROM `data` a, wilayah b, sektor c WHERE a.idWilayah = $wil AND a.tahun = $th AND a.idWilayah = b.idWilayah AND a.idSektor = c.idSektor";
        $pdrb = DB::select($sql);

//        dd($pdrb);
        return view('DataPdbFilter',
                ["wilayah" => $wilayah, "wilayah2" => $wilayah2, "pdrb" => $pdrb, "swil" => $wil, "sth" => $th]);
    }

    public function pdbDelete(Request $request)
    {
        $delwilayah = $request->delwilayah;
        $deltahun = $request->deltahun;
        $res = data::where('idWilayah', $delwilayah)->where('tahun', $deltahun)->delete();
        return back();
    }

    public function generateFormat(Request $request)
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

    public function ImportData(Request $request)
    {
        try {
            \Excel::import(new dataImport, $request->import_file);
            \Session::put('success', 'Your file is imported successfully in database.');
            return back();
        } catch (\Exception $e) {
            \Session::put('error', $e->getMessage());
            return back();
        }
    }

}
