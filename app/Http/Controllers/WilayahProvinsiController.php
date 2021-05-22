<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wilayah;
use App\Models\sektor;
use App\Models\data;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        
        $wil = NULL;
        $tha = NULL;
        $thd = NULL;
        $wilayah = wilayah::all();
        $sektor = sektor::all();
        $tahunlc = NULL;
        $datalc = NULL;
        $cbasis = NULL;
        $cnonbasis = NULL;
        $basis = NULL;
        $nswilayah = NULL;
        $nss = NULL;
        $pswilayah = NULL;
        $pss = NULL;
        $dswilayah = NULL;
        $dss = NULL;
        $sankeys = NULL;
        $streams = NULL;
        $streamc = NULL;
        $maxns = NULL;
        $minns = NULL;
        $maxps = NULL;
        $minps = NULL;
        $maxds = NULL;
        $minds = NULL;
        $id = Auth::id();
        $tahun = DB::select("SELECT DISTINCT tahun FROM data WHERE idUser = $id ORDER BY tahun DESC");
        
        return view('WilayahProvinsi',
                ["tahun" => $tahun, "wil" => $wil, "thd" => $thd, "tha" => $tha, "wilayah" => $wilayah, "sektor" => $sektor, "tahunlc" => $tahunlc, "datalc" => $datalc, "cbasis" => $cbasis, "cnonbasis" => $cnonbasis, "basis" => $basis, "nswilayah" => $nswilayah, "nss" => $nss, "pswilayah" => $pswilayah, "pss" => $pss, "dswilayah" => $dswilayah, "dss" => $dss, "sankeys" => $sankeys, "streams" => $streams, "streamc" => $streamc, "maxns" => $maxns, "minns" => $minns, "maxps" => $maxps, "minps" => $minps, "maxds" => $maxds, "minds" => $minds]);
    }
    
    public function viewProvinsi(Request $request)
    {
        //get data
        $wil = $request->wilayah;
        $tha = $request->tahuna;
        $thd = $request->tahund;
        
        //peringatan
        if ($thd >= $tha){
            Session::put('error', 'Tahun dasar tidak boleh melebihi tahun analisis');
            return back();
        }
        else {        
        
            //data untuk dropdown wilayah
            $wilayah = wilayah::all();
            $sektor = sektor::all();
            $id = Auth::id();
            $tahun = DB::select("SELECT DISTINCT tahun FROM data WHERE idUser = $id ORDER BY tahun DESC");

            //view line chart
            $lc = DB::select("SELECT tahun, pdrb FROM data WHERE idWilayah = $wil AND idSektor = 18 AND idUser = $id ORDER BY tahun");
            $tahunlc; $datalc;
            foreach($lc as $i)
            {
                $tahunlc[] = $i->tahun;
                $datalc[] = $i->pdrb;
            }

            //view pie chart
            $pdrb = DB::select("SELECT b.nama_sektor, a.pdrb FROM data a, sektor b WHERE a.tahun = $tha AND a.idSektor = b.idSektor AND a.idSektor <> 18 AND a.idWilayah = $wil AND a.idUser = $id");
            $pdrb18 = DB::select("SELECT pdrb FROM data WHERE tahun = $tha AND idWilayah = $wil AND idSektor = 18 AND idUser = $id");
            $pdb = DB::select("SELECT pdrb FROM data WHERE tahun = $tha AND idWilayah = 0 AND idSektor <> 18 AND idUser = $id");
            $pdb18 = DB::select("SELECT pdrb FROM data WHERE tahun = $tha AND idWilayah = 0 AND idSektor = 18 AND idUser = $id");
            $pie = array();
            $n = sizeof($pdrb);
            for($i=0; $i < $n; $i++)
            {
               $pie[] = ['sektor'=>$pdrb[$i]->nama_sektor,'lq'=>($pdrb[$i]->pdrb/$pdrb18[0]->pdrb)/($pdb[$i]->pdrb/$pdb18[0]->pdrb)];
            }
            $jpie = json_decode(json_encode($pie));
            $cbasis = 0;
            $cnonbasis = 0;
            $basis = array();
            $nonbasis = array();
            foreach($jpie as $i)
            {
                if($i->lq>1){
                $cbasis++;
                $basis[] = $i->sektor;
                } else {
                $cnonbasis++;
                $nonbasis[] = $i->sektor;
                }
            }

            $maxlq = max(array_column($jpie, 'lq'));
            $minlq = min(array_column($jpie, 'lq'));
            $sektormaxlq = array_filter(array_map(function ($jpie)
                use ($maxlq) {
                return $jpie->lq == $maxlq ? $jpie->sektor : null;
            }, $jpie));
            $sektorminlq = array_filter(array_map(function ($jpie)
                use ($minlq) {
                return $jpie->lq == $minlq ? $jpie->sektor : null;
            }, $jpie));        
            $smaxlq; $sminlq;
            foreach($sektormaxlq as $i){
                $smaxlq = $i;
            }
            foreach($sektorminlq as $i){
                $sminlq = $i;
            }

            //view national share        
            $ns = DB::select("SELECT b.nama_sektor, a.pdrb * (SELECT pdrb / (SELECT pdrb FROM data WHERE idWilayah = 0 AND idSektor = 18 AND idUser = $id AND tahun = $thd) -1 FROM data WHERE tahun = $tha AND idWilayah = 0 AND idSektor = 18 AND idUser = $id) AS ns FROM data a, sektor b WHERE a.tahun = $tha AND a.idSektor = b.idSektor AND a.idWilayah = $wil AND a.idSektor <> 18 AND a.idUser = $id");
            $nswilayah = array();
            $nss = array();
            $nsss = array();
            foreach($ns as $i)
            {
                $nswilayah[] = $i->nama_sektor;
                $nss[] = $i->ns;
            }

            $maxns = max(array_column($ns, 'ns'));
            $minns = min(array_column($ns, 'ns'));
            $sektormaxns = array_filter(array_map(function ($ns)
                use ($maxns) {
                return $ns->ns == $maxns ? $ns->nama_sektor : null;
            }, $ns));
            $sektorminns = array_filter(array_map(function ($ns)
                use ($minns) {
                return $ns->ns == $minns ? $ns->nama_sektor : null;
            }, $ns));        
            $smaxns; $sminns;
            foreach($sektormaxns as $i){
                $smaxns = $i;
            }
            foreach($sektorminns as $i){
                $sminns = $i;
            }

            //view proportional shift
            $eint = DB::select("SELECT pdrb FROM data WHERE tahun = $tha AND idWilayah = 0 AND idSektor <> 18 AND idUser = $id");
            $eino = DB::select("SELECT pdrb FROM data WHERE tahun = $thd AND idWilayah = 0 AND idSektor <> 18 AND idUser = $id");       
            $rn = DB::select("SELECT pdrb / (SELECT pdrb FROM data WHERE idWilayah = 0 AND idSektor = 18 AND idUser = $id AND tahun = $thd) -1 AS rn FROM data WHERE tahun = $tha AND idWilayah = 0 AND idSektor = 18 AND idUser = $id");
            $pswilayah = array();
            $pss = array();
            $ps = array();
            $n1 = sizeof($eint);
            for($i=0; $i < $n1; $i++)
            {
                $pswilayah[] = $pdrb[$i]->nama_sektor;
                $pss[] = $pdrb[$i]->pdrb*(($eint[$i]->pdrb/$eino[$i]->pdrb-1)-$rn[0]->rn);
                $ps[] = ['nama_sektor'=>$pswilayah[$i],'ps'=>$pss[$i]];
            }

            $maxps = max(array_column($ps, 'ps'));
            $minps = min(array_column($ps, 'ps'));
            $sektormaxps = array_filter(array_map(function ($ps)
                use ($maxps) {
                return $ps['ps'] == $maxps ? $ps['nama_sektor'] : null;
            }, $ps));
            $sektorminps = array_filter(array_map(function ($ps)
                use ($minps) {
                return $ps['ps'] == $minps ? $ps['nama_sektor'] : null;
            }, $ps));        
            $smaxps; $sminps;
            foreach($sektormaxps as $i){
                $smaxps = $i;
            }
            foreach($sektorminps as $i){
                $sminps = $i;
            }

            //view differential shift
            $eijo = DB::select("SELECT pdrb FROM data WHERE tahun = $thd AND idWilayah = $wil AND idSektor <> 18 AND idUser = $id");       
            $dswilayah = array();
            $dss = array();
            $ds = array();
            $n1 = sizeof($pdrb);
            for($i=0; $i < $n1; $i++)
            {
                if (empty($eijo[$i])){
                    $dswilayah[] = $pdrb[$i]->nama_sektor;
                    $dss[] = "null";
                    $ds[] = ['nama_sektor'=>$dswilayah[$i],'ds'=>$dss[$i]];
                }
                else{
                    $dswilayah[] = $pdrb[$i]->nama_sektor;
                    $dss[] = $pdrb[$i]->pdrb*(($pdrb[$i]->pdrb/$eijo[$i]->pdrb-1)-($eint[$i]->pdrb/$eino[$i]->pdrb-1));
                    $ds[] = ['nama_sektor'=>$dswilayah[$i],'ds'=>$dss[$i]];
                }
            }

            $maxds = max(array_column($ds, 'ds'));
            $minds = min(array_column($ds, 'ds'));
            $sektormaxds = array_filter(array_map(function ($ds)
                use ($maxds) {
                return $ds['ds'] == $maxds ? $ds['nama_sektor'] : null;
            }, $ds));
            $sektorminds = array_filter(array_map(function ($ds)
                use ($minds) {
                return $ds['ds'] == $minds ? $ds['nama_sektor'] : null;
            }, $ds));        
            $smaxds; $sminds;
            foreach($sektormaxds as $i){
                $smaxds = $i;
            }
            foreach($sektorminds as $i){
                $sminds = $i;
            }       


            //dd(json_encode($smaxlq));
            return view('WilayahProvinsi',
                    ["tahun" => $tahun, "wil" => $wil, "thd" => $thd, "tha" => $tha, "wilayah" => $wilayah, "sektor" => $sektor, "tahunlc" => $tahunlc, "datalc" => $datalc, "cbasis" => $cbasis, "cnonbasis" => $cnonbasis, "basis" => $basis, "nswilayah" => $nswilayah, "nss" => $nss, "pswilayah" => $pswilayah, "pss" => $pss, "nss" => $nss, "dswilayah" => $dswilayah, "dss" => $dss, "maxlq" => $maxlq, "minlq" => $minlq, "smaxlq" => $smaxlq, "sminlq" => $sminlq, "maxns" => $maxns, "minns" => $minns, "smaxns" => $smaxns, "sminns" => $sminns, "maxps" => $maxps, "minps" => $minps, "smaxps" => $smaxps, "sminps" => $sminps, "maxds" => $maxds, "minds" => $minds, "smaxds" => $smaxds, "sminds" => $sminds]);

        }
    }

}
