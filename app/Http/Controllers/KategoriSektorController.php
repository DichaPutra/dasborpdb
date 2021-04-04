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
        $sankey = DB::select("SELECT b.nama_wilayah, c.nama_sektor, a.pdrb FROM data a, wilayah b, sektor c WHERE a.tahun = $tha AND a.idWilayah = b.idWilayah AND a.idsektor = c.idSektor AND a.idWilayah <> 0");

        $sankeys = array();
        foreach($sankey as $i)
        {
            $sankeys[] = $i->nama_wilayah;
        }
        var_dump($sankeys);
        return view('KategoriSektor',
                ["wilayah" => $wilayah, "sektor" => $sektor, "sankey" => $sankey]);
    }

}
