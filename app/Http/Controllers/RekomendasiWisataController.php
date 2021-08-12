<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\DetailKriteriaWisata;
use App\Kabupaten;

class RekomendasiWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function result() 
    {
      $result = $_POST['data'];
      $arr = array();

      foreach($result as $row){
        $arr[] = $row;
      }
      return $arr;
    }
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
        $count = DB::table('kriterias')->where("jenis_kriteria_id",1)->count();
        $sum = 0;
        $arr = array();
        foreach($request->input('prioritas') as $key => $value) {
            if($value == 10){
                $value = round((1/9) * 100) / 100;
              }
              else if($value  == 11){
                $value = round((1/8) * 100) / 100;
              }
              else if($value  == 12){
                $value  = round((1/7) * 100) / 100;
              }
              else if($value == 13){
                $value  = ound((1/6) * 100) / 100;
              }
              else if($value  == 14){
                $value = round((1/5) * 100) / 100;
              }
              else if($value == 15){
                $value  = round((1/4) * 100) / 100;
              }
              else if($value == 16){
                $value = round((1/3) * 100) / 100;
              }
              else if($value == 17){
                $value = round((1/2) * 100) / 100;
              }
              else{
                $value = ($value*100) / 100 ;
              }

              $arr[] = $value;
              $sum += $value;
        }
       
        // dd($arrHolder);
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
        //
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
        //
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
}
