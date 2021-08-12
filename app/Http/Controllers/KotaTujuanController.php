<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Kabupaten;
use App\DetailKriteriaWisata;

class KotaTujuanController extends Controller
{
    public function ambilhasil(Request $request) 
    {
      $arr = array();
      $result = $request->data;
   
      $nilaikriteria = DetailKriteriaWisata::all();
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

      $total = array();
      $normalisasi= array();
      $hasil= array();
      $kriteria= array();
      $i = 1;
      $idtipekriteria = DB::table('kriterias')
      ->select('id', 'tipe_kriteria')
      ->where("jenis_kriteria_id",1)->get();

      $idtipekriteria = $idtipekriteria->toArray();
      foreach ($idtipekriteria as $key=>$value) {
        $kriteria[$key] = ['id'=>$i, 'tipe_kriteria'=>$value->tipe_kriteria];
        $i++;
      }
      $count = DB::table('kriterias')->where("jenis_kriteria_id",1)->count();
      $count = $count+1;

      //////////////////////////////////// NORMALISASI MATRIKS KEPUTUSAN //////////////////////////////////// 


      foreach ($nilaikriteria as $idkrit) {
        $id = $idkrit->kriteria_id;
        foreach ($akarkdrt as $idakarkrit) {
          $id2 = $idakarkrit->kriteria_id;
          if($id == $id2)
          {
            $nilai=$idkrit->nilai;
            $jumlah=$idakarkrit->akarkuadrat;
            $normalisasi[] = $nilai/$jumlah;
          }
        }
      }
      //////////////////////////////////// PERKALIAN BOBOT DENGAN NILAI NORMALISASI //////////////////////////////////// 

      foreach ($normalisasi as $norm) {
        // $norm = $hasilnorm['norm'];
        foreach($result as $res)
        {
          $hsil = $res[0];
          $total[] = $norm * $hsil;
          foreach($total as $key=>$value)
          {
            if($i == $count)
            {
              $i=1;
            }
            $hasil[$key] = ['id'=>$i,'hasil'=>$value];
            $i++;
          }
        }
      }
      // dd($hasil);

      //////////////////////////////////// SOLUSI IDEAL POSITIF NEGATIF //////////////////////////////////// 

      $result = array();
      $arraycost = array();
      foreach ($hasil as $element) {
        $result[$element['id']][] = $element['hasil'];
        foreach($kriteria as $cost)
        {
          if($cost['id'] == $element['id'] && $cost['tipe_kriteria'] == 'Benefit')
          {
              // $minimum += $cek['hasil'];
              // $min[] = $minimum;
              // $arraycost[]= max($element);
              // echo $id;
              // break;
          }
        }
      }  
      
      foreach($result as $item){
          $arraycost[]= max($item);
      }

       dd($arraycost);


      //////////////////////////////////// JARAK ALTERNATIF DENGAN POSITIF NEGATIF //////////////////////////////////// 


      //////////////////////////////////// NILAI PREFERENSI ALTERNATIF //////////////////////////////////// 

      return view('wisata.hasil',['norm'=>$normalisasi]);
     
    }
    public function cari()
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
        ->count();
        
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
        return view('index', ['kabupaten'=>$kabupaten, 'kritwis'=>$kriteria,'count'=>$count, 'nilai' =>$arr,'cost'=>$cost]);  
    }

  
    
}
