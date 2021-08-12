<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = 'wisatas';

    public function kelurahans(){
        return $this->belongsTo("App\Kelurahan","kelurahan_id");
    }
    public function tipe_wisatas(){
        return $this->belongsTo("App\TipeWisata","tipe_wisata_id");
    }
    public function kriterias(){
        return $this->belongsToMany("App\Kriteria",'detail_kriteria_wisatas','wisata_id','kriteria_id');
    }
    public function gambar_wisatas(){
        return $this->hasMany("App\GambarWisata");
    }
    public function review_wisatas(){
        return $this->hasMany("App\ReviewWisata");
    }
}
