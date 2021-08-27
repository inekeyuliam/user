<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Kabupaten;
use App\Wisata;
use App\ReviewWisata;
use App\DetailKriteriaWisata;

class RekomendasiWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ambilhasil(Request $request) 
    {
      $arr = array();
      $result = json_decode($request->data);
   
      $nilaikriteria = DetailKriteriaWisata::all();
      $akarkdrt = DB::table('detail_kriteria_wisatas')
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
      ->where("jenis_kriteria_id",1)
      ->get();

      $idtipekriteria = $idtipekriteria->toArray();
      foreach ($idtipekriteria as $key=>$value) {
        $kriteria[$key] = ['id'=>$i, 'tipe_kriteria'=>$value->tipe_kriteria];
        $i++;
      }
      // dd($kriteria);
      $count = DB::table('kriterias')->where("jenis_kriteria_id",1)->count();
      $count = $count+1;
      $jumwisata = DB::table('wisatas')->count();


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
    
     
      $wisata = Wisata::with('gambar_wisatas')->get();
     
      $result = [];
      $rank = 1;

      foreach ($wisata as $key => $w) {

        $result[$key]['id'] = $w->id;
        $result[$key]['nama'] = $w->nama_wisata;
        $result[$key]['rating'] = $w->rating;
        $result[$key]['alamat'] = $w->alamat;
        $result[$key]['jam_buka'] = $w->jam_buka;
        $result[$key]['jam_tutup'] = $w->jam_tutup;
        // $result[$key]['filename'] = $w->filename;
        $result[$key]['pref'] = $nilaipref[$key];
        $result[$key]['rank'] = $rank;
        $rank++;

      }
      $result = collect($result);
      $sorted = $result->sortByDesc('pref')->toArray();
      // dd($wisata);
      return view('wisata.hasil',['ranking'=>$sorted]);
     
    }
 
    public function form()
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
        return view('wisata.form', ['kabupaten'=>$kabupaten, 'kritwis'=>$kriteria,'count'=>$count, 'nilai' =>$arr,'cost'=>$cost]);  
    }

    
    public function result() 
    {
      $result = $_POST['data'];
      $arr = array();

      foreach($result as $row){
        $arr[] = $row;
      }
      return $arr;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // foreach($request->input('prioritas') as $key => $value) {
        //     dd($value);
        // }
        return view('wisata.hasil');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('wisata.hasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $wis = Wisata::find($id);

      $gambarwisata = DB::table('wisatas')
      ->join('gambar_wisatas', 'gambar_wisatas.wisata_id','=','wisatas.id')
      ->where('wisatas.id','=',$wis->id)
      ->first();

      $hargawisata = DB::table('wisatas')
      ->join('harga_wisatas', 'harga_wisatas.wisata_id','=','wisatas.id')
      ->where('wisatas.id','=',$wis->id)
      ->get();

      $reviewwisata = DB::table('wisatas')
      ->join('review_wisatas', 'review_wisatas.wisata_id','=','wisatas.id')
      ->where('wisatas.id','=',$wis->id)
      ->get();
      // dd($reviewwisata);
      return view('wisata.show',['list' => $wis, 'gambar' => $gambarwisata, 'harga' => $hargawisata, 'review' => $reviewwisata]);
     
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $nama = $request->get('name');
      $rate = $request->get('rate');
      $review = $request->get('review');

      $rev = new ReviewWisata();
      $rev->wisata_id = $id;
      $rev->nama = $nama;
      $rev->rate = $rate;
      $rev->review = $review;
      $rev->save();
      dd($rev);
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function daftar()
    {
      $wisata = Wisata::with('gambar_wisatas')->get();
      return view('wisata.daftar',['wisata'=>$wisata]);

    }
    public function index()
    {
      return view('wisata.daftar');

    }
    public function kriteria()
    {
      return view('wisata.form');

    }
}
