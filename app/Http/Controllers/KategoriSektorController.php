<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wilayah;
use App\Models\sektor;
use App\Models\data;
use Illuminate\Support\Facades\DB;

class KategoriSektorController extends Controller {

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
        $sektor = sektor::all();
        
        return view('KategoriSektor',
                ["wilayah" => $wilayah, "sektor" => $sektor]);
    }

    public function viewSektor(Request $request)
    {

        //get data
        $sekt = $request->sektor;
        $tha = $request->tahuna;
        $thd = $request->tahund;
        
        // data untuk dropdown wilayah
        $wilayah = wilayah::all();
        $sektor = sektor::all();

        //view pie chart
        $basis = DB::select("SELECT MAX(pdrb) FROM data WHERE idSektor = $sekt AND tahun = $tha");

        dd($basis);
        return view('KategoriSektor',
                ["wilayah" => $wilayah, "sektor" => $sektor, "basis" => $basis]);
    }

}
