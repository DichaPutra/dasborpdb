<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wilayah;
use App\Models\sektor;
use App\Models\data;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        
        //data untuk dropdown wilayah
        $sekt = NULL;
        $tha = NULL;
        $thd = NULL;
        $wilayah = wilayah::all();
        $sektor = sektor::all();
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
        
        return view('KategoriSektor',
                ["tahun" => $tahun, "sekt" => $sekt, "thd" => $thd, "tha" => $tha, "wilayah" => $wilayah, "sektor" => $sektor, "cbasis" => $cbasis, "cnonbasis" => $cnonbasis, "basis" => $basis, "nswilayah" => $nswilayah, "nss" => $nss, "pswilayah" => $pswilayah, "pss" => $pss, "dswilayah" => $dswilayah, "dss" => $dss, "sankeys" => $sankeys, "streams" => $streams, "streamc" => $streamc, "maxns" => $maxns, "minns" => $minns, "maxps" => $maxps, "minps" => $minps, "maxds" => $maxds, "minds" => $minds]);
    }

    public function viewSektor(Request $request)
    {

        //get data
        $sekt = $request->sektor;
        $tha = $request->tahuna;
        $thd = $request->tahund;
        
        //data untuk dropdown wilayah
        $wilayah = wilayah::all();
        $sektor = sektor::all();
        $id = Auth::id();
        $tahun = DB::select("SELECT DISTINCT tahun FROM data WHERE idUser = $id ORDER BY tahun DESC");
        
        //view pie chart
        $pdrb = DB::select("SELECT b.nama_wilayah, a.pdrb FROM data a, wilayah b WHERE a.tahun = $tha AND a.idWilayah = b.idWilayah AND a.idSektor = $sekt AND a.idWilayah <> 0 AND a.idUser = $id");
        $pdrb18 = DB::select("SELECT a.pdrb FROM data a, wilayah b WHERE a.tahun = $tha AND a.idWilayah = b.idWilayah AND a.idSektor = 18 AND a.idWilayah <> 0 AND a.idUser = $id");
        $pdb = DB::select("SELECT a.pdrb FROM data a, wilayah b WHERE a.tahun = $tha AND a.idWilayah = b.idWilayah AND a.idSektor = $sekt AND a.idWilayah = 0 AND a.idUser = $id");
        $pdb18 = DB::select("SELECT a.pdrb FROM data a, wilayah b WHERE a.tahun = $tha AND a.idWilayah = b.idWilayah AND a.idSektor = 18 AND a.idWilayah = 0 AND a.idUser = $id");
        $pie = array();
        $n = sizeof($pdrb);
        for($i=0; $i < $n; $i++)
        {
            $pie[] = ['wilayah'=>$pdrb[$i]->nama_wilayah,'lq'=>($pdrb[$i]->pdrb/$pdrb18[$i]->pdrb)/($pdb[0]->pdrb/$pdb18[0]->pdrb)];
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
            $basis[] = $i->wilayah;
            } else {
            $cnonbasis++;
            $nonbasis[] = $i->wilayah;
            }
        }
        
        //view national share
        //$rn = DB::select("SELECT pdrb / (SELECT pdrb FROM data WHERE idWilayah = 0 AND idSektor = 18 AND idUser = $id AND tahun = $thd) -1 FROM data WHERE tahun = $tha AND idWilayah = 0 AND idSektor = 18 AND idUser = $id");
        $ns = DB::select("SELECT b.nama_wilayah, a.pdrb * (SELECT pdrb / (SELECT pdrb FROM data WHERE idWilayah = 0 AND idSektor = 18 AND idUser = $id AND tahun = $thd) -1 FROM data WHERE tahun = $tha AND idWilayah = 0 AND idSektor = 18 AND idUser = $id) AS ns FROM data a, wilayah b, sektor c WHERE a.tahun = $tha AND a.idWilayah = b.idWilayah AND a.idsektor = c.idSektor AND a.idWilayah <> 0 AND a.idSektor = $sekt AND a.idUser = $id");
        $nswilayah = array();
        $nss = array();
        foreach($ns as $i)
        {
            $nswilayah[] = $i->nama_wilayah;
            $nss[] = $i->ns;
        }
        $maxns = max($ns);
        $minns = min($ns);
        
        //view proportional shift
        //$rin = DB::select("SELECT pdrb / (SELECT pdrb FROM data WHERE idWilayah = 0 AND idSektor = $sekt AND idUser = $id AND tahun = $thd) -1 FROM data WHERE tahun = $tha AND idWilayah = 0 AND idSektor = $sekt AND idUser = $id");
        $ps = DB::select("SELECT b.nama_wilayah, a.pdrb * ((SELECT pdrb / (SELECT pdrb FROM data WHERE idWilayah = 0 AND idSektor = $sekt AND idUser = $id AND tahun = $thd) -1 FROM data WHERE tahun = $tha AND idWilayah = 0 AND idSektor = $sekt AND idUser = $id) - (SELECT pdrb / (SELECT pdrb FROM data WHERE idWilayah = 0 AND idSektor = 18 AND idUser = $id AND tahun = $thd) -1 FROM data WHERE tahun = $tha AND idWilayah = 0 AND idSektor = 18 AND idUser = $id)) AS ps FROM data a, wilayah b, sektor c WHERE a.tahun = $tha AND a.idWilayah = b.idWilayah AND a.idsektor = c.idSektor AND a.idWilayah <> 0 AND a.idSektor = $sekt AND a.idUser = $id");
        $pswilayah = array();
        $pss = array();
        foreach($ps as $i)
        {
            $pswilayah[] = $i->nama_wilayah;
            $pss[] = $i->ps;
        }
        $maxps = max($ps);
        $minps = min($ps);
        
        //view differential shift
        $eijt = DB::select("SELECT b.nama_wilayah, a.pdrb FROM data a, wilayah b WHERE a.idWilayah = b.idWilayah AND a.tahun = $tha AND a.idWilayah <> 0 AND a.idSektor = $sekt AND a.idUser = $id");
        $eijo = DB::select("SELECT pdrb FROM data WHERE tahun = $thd AND idWilayah <> 0 AND idSektor = $sekt AND idUser = $id");
        $rin = DB::select("SELECT pdrb / (SELECT pdrb FROM data WHERE idWilayah = 0 AND idSektor = $sekt AND idUser = $id AND tahun = $thd) -1 AS rin FROM data WHERE tahun = $tha AND idWilayah = 0 AND idSektor = $sekt AND idUser = $id");
        $dswilayah = array();
        $dss = array();
        $ds = array();
        $n1 = sizeof($eijt);
        for($i=0; $i < $n1; $i++)
        {
            $dswilayah[] = $eijt[$i]->nama_wilayah;
            $dss[] = $eijt[$i]->pdrb*(($eijt[$i]->pdrb/$eijo[$i]->pdrb-1)-$rin[0]->rin);
            $ds[] = ['nama_wilayah'=>$dswilayah[$i],'ds'=>$dss[$i]];
        }
        $maxds = json_decode(json_encode(max($ds)));
        $minds = json_decode(json_encode(min($ds)));
        
        //view sankey diagram
        $sankey = DB::select("SELECT b.nama_wilayah, c.nama_sektor, a.pdrb FROM data a, wilayah b, sektor c WHERE a.tahun = $tha AND a.idWilayah = b.idWilayah AND a.idsektor = c.idSektor AND a.idWilayah <> 0 AND a.idSektor <>18 AND a.idUser = $id");
        $sankeys = array();
        foreach($sankey as $i)
        {
            $sankeys[] = [$i->nama_wilayah, $i->nama_sektor, $i->pdrb];
        }
        
        //view stream graph
        $stream = DB::select("SELECT DISTINCT b.nama_wilayah, GROUP_CONCAT(a.pdrb) AS data FROM data a, wilayah b, sektor c WHERE a.tahun <= $tha AND a.tahun >= $thd AND a.idWilayah = b.idWilayah AND a.idsektor = c.idSektor AND a.idWilayah <> 0 AND a.idSektor = $sekt AND a.idUser = $id GROUP BY nama_wilayah");
        $streams = array();
        foreach($stream as $i)
        {
            $streamexplode = explode(",",$i->data);
            $streamdata = array();
            foreach ($streamexplode as $j)
            {
                 $streamdata[] = (int)$j;
            }
            $streams[] = ['name'=>$i->nama_wilayah,'data'=>$streamdata];
        }
        
        $streamc = array();
        for($i = $thd; $i <= $tha; $i++)
        {
            $streamc[] = "$i";
        }
        
        //dd($maxds);
        return view('KategoriSektor',
                ["tahun" => $tahun, "sekt" => $sekt, "thd" => $thd, "tha" => $tha, "wilayah" => $wilayah, "sektor" => $sektor, "cbasis" => $cbasis, "cnonbasis" => $cnonbasis, "basis" => $basis, "nswilayah" => $nswilayah, "nss" => $nss, "pswilayah" => $pswilayah, "pss" => $pss, "dswilayah" => $dswilayah, "dss" => $dss, "sankeys" => $sankeys, "streams" => $streams, "streamc" => $streamc, "maxns" => $maxns, "minns" => $minns, "maxps" => $maxps, "minps" => $minps, "maxds" => $maxds, "minds" => $minds]);
    }

}
