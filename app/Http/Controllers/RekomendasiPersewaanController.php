<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Kabupaten;
use App\Persewaan;
use App\ReviewPersewaan;
use App\DetailKriteriaPersewaan;

class RekomendasiPersewaanController extends Controller
{
    public function ambilhasil(Request $request) 
    {
        $arr = array();
        $result = json_decode($request->data);

        $nilaikriteria = DetailKriteriaPersewaan::all();
        $akarkdrt = DB::table('detail_kriteria_persewaans')
        ->select(DB::raw('kriteria_id, SQRT(SUM(POW(nilai,2))) as akarkuadrat'))
        ->groupby('kriteria_id')
        ->get();
  
        $total = array();
        $normalisasi= array();
        $hasil= array();
        $kriteria= array();
        $i = 1;
        $idtipekriteria = DB::table('kriterias')
        ->select('id', 'tipe_kriteria')
        ->where("jenis_kriteria_id",3)
        ->get();
  
        $idtipekriteria = $idtipekriteria->toArray();
        foreach ($idtipekriteria as $key=>$value) {
          $kriteria[$key] = ['id'=>$i, 'tipe_kriteria'=>$value->tipe_kriteria];
          $i++;
        }
        // dd($kriteria);
        $count = DB::table('kriterias')->where("jenis_kriteria_id",3)->count();
        $count = $count+1;
        $jumpersewaan = DB::table('persewaans')->count();
  
  
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
        $result = array();
        $arraybenefit = array();      
        $arraycost = array();
  
        foreach($kriteria as $ben)
        {
          foreach ($hasil as $element) {
          $result[$element['id']][] = $element['hasil'];
            if($ben['id'] == $element['id'] && $ben['tipe_kriteria'] == 'Benefit')
            {
              $arraybenefit[$element['id']][]= $element['hasil'];
            }
          }
        }  
  
        foreach($kriteria as $cost)
        {
          foreach ($hasil as $element) {
          $result[$element['id']][] = $element['hasil'];
            if($cost['id'] == $element['id'] && $cost['tipe_kriteria'] == 'Cost')
            {
              $arraycost[$element['id']][]= $element['hasil'];
            }
          }
        }  
  
        //////////////////////////////////// SOLUSI IDEAL POSITIF //////////////////////////////////// 
        $costpositif=[];
        $benefitpositif=[];
        $costnegatif=[];
        $benefitnegatif=[];

        foreach($arraycost as $key=>$value){
          $costpositif[]= [
                'id' => $key,
                'hasil' => min($value)
              ];
        }
        
        foreach($arraybenefit as $key=>$value){
          $benefitpositif[]= [
            'id' => $key,
            'hasil' => max($value)
          ];
        }
        $solusipositif = array_merge($costpositif, $benefitpositif);
        usort($solusipositif, function($a, $b) {
          return $a['id'] - $b['id'];
        });
        //  dd($solusipositif);
  
        ////////////////////////////////////  SOLUSI IDEAL NEGATIF //////////////////////////////////// 
  
        foreach($arraycost as $key=>$value){
          $costnegatif[]= [
                'id' => $key,
                'hasil' => max($value)
              ];
        }
        
        foreach($arraybenefit as $key=>$value){
          $benefitnegatif[]= [
            'id' => $key,
            'hasil' => min($value)
          ];
        }
        $solusinegatif = array_merge($costnegatif, $benefitnegatif);
        usort($solusinegatif, function($a, $b) {
          return $a['id'] - $b['id'];
        });
        // dd($solusinegatif);
  
        //////////////////////////////////// JARAK ALTERNATIF DENGAN SOLUSI IDEAL POSITIF //////////////////////////////////// 
        $sum=0;
        $akar=0;
        $countkriteria = $count-1;
        $arrakarpositif = [];
  
        $arrsolusipositif = [];
        foreach($hasil as $key=>$value){
          $id1 = $value['id'];
          $hasil1 = $value['hasil'];
          foreach($solusipositif as $key2 => $value2)
          {
            $id2 = $value2['id'];
            $hasil2 = $value2['hasil'];
            if($id1 == $id2)
            {
              $arrsolusipositif[]=[
                'id' => $id1,
                'hasil' => POW(($hasil1-$hasil2),2)
              ];
            }
          }
        }
        
        $bagiarraypos = array_chunk($arrsolusipositif,$countkriteria);
        foreach($bagiarraypos as $key=>$value){
          foreach($value as $key2=>$value2)
          {
            $sum += $value2['hasil'];
          }
          $arrakarpositif[] = sqrt($sum);
          $sum=0;
        }
        // dd($arrakarpositif);
  
        //////////////////////////////////// JARAK ALTERNATIF DENGAN SOLUSI IDEAL NEGATIF //////////////////////////////////// 
        $arrsolusinegatif = [];
        foreach($hasil as $key=>$value){
          $id1 = $value['id'];
          $hasil1 = $value['hasil'];
          foreach($solusinegatif as $key2 => $value2)
          {
            $id2 = $value2['id'];
            $hasil2 = $value2['hasil'];
            if($id1 == $id2)
            {
              $arrsolusinegatif[]=[
                'id' => $id1,
                'hasil' => POW(($hasil1-$hasil2),2)
              ];
            }
          }
        }
   
        $arrakarnegatif = [];
        $bagiarrayneg = array_chunk($arrsolusinegatif,$countkriteria);
        foreach($bagiarrayneg as $key=>$value){
          foreach($value as $key2=>$value2)
          {
            $sum += $value2['hasil'];
          }
          $arrakarnegatif[] = sqrt($sum);
          $sum=0;
        }
        // dd($arrakarnegatif);
  
        //////////////////////////////////// NILAI PREFERENSI ALTERNATIF //////////////////////////////////// 
        
        $nilaipref = array_map(function($x, $y) { return $x/($x + $y); },
                     $arrakarnegatif, $arrakarpositif);
  
        //////////////////////////////////// SORT NILAI PREFERENSI ////////////////////////////////////
        // rsort($nilaipref);
      
       
        $persewaan = Persewaan::all();
        $result = [];
        foreach ($persewaan as $key => $w) {
          $result[$key]['id'] = $w->id;
          $result[$key]['nama'] = $w->nama_persewaan;
          $result[$key]['alamat'] = $w->alamat;
          $result[$key]['jam_buka'] = $w->jam_buka;
          $result[$key]['jam_tutup'] = $w->jam_tutup;
          $result[$key]['rating'] = $w->rating;
          $result[$key]['no_telp'] = $w->no_telp;
          $result[$key]['no_wa'] = $w->no_wa;
          $result[$key]['link_ig'] = $w->link_ig;
          $result[$key]['link_fb'] = $w->link_fb;
          $result[$key]['pref'] = $nilaipref[$key];
        }
        $result = collect($result);
        $sorted = $result->sortByDesc('pref')->toArray();
        // dd($sorted);
        return view('persewaan.hasil',['ranking'=>$sorted]);
       
      }
 
    public function index()
    {
        $kriteria = DB::table('kriterias')->where("jenis_kriteria_id",3)->get();
        $count = DB::table('kriterias')->where("jenis_kriteria_id",3)->count();
        $nilaikriteria = DB::table('detail_kriteria_persewaans')
        ->join('persewaans','detail_kriteria_persewaans.persewaan_id','=','persewaans.id')
        ->join('kriterias','detail_kriteria_persewaans.kriteria_id','=','kriterias.id')
        ->get();

        $akarkdrt = DB::table('detail_kriteria_persewaans')
        ->select(DB::raw('kriteria_id, SQRT(SUM(POW(nilai,2))) as akarkuadrat'))
        ->groupby('kriteria_id')
        ->get();

        $cost = DB::table('detail_kriteria_persewaans')
        ->select('kriterias.id')
        ->join('persewaans','detail_kriteria_persewaans.persewaan_id','=','persewaans.id')
        ->join('kriterias','detail_kriteria_persewaans.kriteria_id','=','kriterias.id')
        ->where('kriterias.tipe_kriteria','=','Cost')
        ->groupby('kriteria_id')
        ->get();

        $jum = DB::table('detail_kriteria_persewaans')
        ->groupby('persewaan_id')
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
        return view('persewaan.index', ['kabupaten'=>$kabupaten, 'kritwis'=>$kriteria,'count'=>$count, 'nilai' =>$arr,'cost'=>$cost]);  
    }
    public function show($id)
    {
      $sewa = Persewaan::find($id);

      $gambarpersewaan = DB::table('persewaans')
      ->join('gambar_persewaans', 'gambar_persewaans.persewaan_id','=','persewaans.id')
      ->where('persewaans.id','=',$sewa->id)
      ->first();

      $reviewsewa = DB::table('persewaans')
      ->join('review_persewaans', 'review_persewaans.persewaan_id','=','persewaans.id')
      ->where('persewaans.id','=',$sewa->id)
      ->get();
      // dd($hargapersewaan);
      return view('persewaan.show',['list' => $sewa, 'gambar' => $gambarpersewaan, 'review' => $reviewsewa]);
     
    }
    public function update(Request $request, $id)
    {
      $nama = $request->get('name');
      $rate = $request->get('rate');
      $review = $request->get('review');

      $rev = new ReviewPersewaan();
      $rev->persewaan_id = $id;
      $rev->nama = $nama;
      $rev->rate = $rate;
      $rev->review = $review;
      $rev->save();
      dd($rev);
      return redirect()->back();
    }
}
