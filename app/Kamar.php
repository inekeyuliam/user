<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamars';

    public function hotels(){
        return $this->belongsTo("App\Hotel","hotel_id");
    }
    public function jenis_kamars(){
        return $this->belongsTo("App\JenisKamar","jenis_kamar_id");
    }
    public function gambar_kamars(){
        return $this->hasMany("App\GambarKamar");
    }
}
