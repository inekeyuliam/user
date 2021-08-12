<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Kabupaten;
use App\DetailKriteriaWisata;

class WisataController extends Controller
{
    public function index()
    {
        $kriteria = DB::table('kriterias')->where("jenis_kriteria_id",1)->get();
        $count = DB::table('kriterias')->where("jenis_kriteria_id",1)->count();
        $nilaikriteria = DB::table('detail_kriteria_wisatas')
        ->join('wisatas','detail_kriteria_wisatas.wisata_id','=','wisatas.id')
        ->join('kriterias','detail_kriteria_wisatas.kriteria_id','=','kriterias.id')
        ->get();
        $akarkdrt = DB::table('detail_kriteria_wisatas')
        ->select(DB::raw('kriteria_id, SQRT(SUM(POW(nilai,2))) as akarkuadrat'))
        ->groupby('kriteria_id')
        ->get();

        $cost = DB::table('detail_kriteria_wisatas')
        ->select('kriterias.id')
        ->join('wisatas','detail_kriteria_wisatas.wisata_id','=','wisatas.id')
        ->join('kriterias','detail_kriteria_wisatas.kriteria_id','=','kriterias.id')
        ->where('kriterias.tipe_kriteria','=','Cost')
        ->groupby('kriteria_id')
        ->get();

        $jum = DB::table('detail_kriteria_wisatas')
        ->groupby('wisata_id')
        ->count();;
        $arr = array();
        $normalisasi= array();
        foreach ($nilaikriteria as $idkrit) {
            $id = $idkrit->kriteria_id;
            foreach ($akarkdrt as $idakarkrit) {
              $id2 = $idakarkrit->kriteria_id;
              if($id == $id2)
              {
                  $nilai=$idkrit->nilai;
                  $jumlah=$idakarkrit->akarkuadrat;
                  $arr[] = $nilai/$jumlah;
              }
            }
        }
          
        // dd(array_chunk($arr, $count, true));
        $kabupaten = Kabupaten::all();
        return view('wisata.index', ['kritwis'=>$kriteria,'count'=>$count, 'nilai' =>$arr,'cost'=>$cost]);  
    }
    public function store()
    {
        
        foreach($request->input('prioritas') as $key => $value) {
            dd($value);
        }
        return view('wisata.hasil');
    }
    public function show()
    {
        
        foreach($request->input('prioritas') as $key => $value) {
            dd($value);
        }
        return view('wisata.hasil');
    }
    public function create()
    {
        
    
        return view('wisata.hasil');
    }
}
