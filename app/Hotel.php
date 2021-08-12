<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';
    public function users(){
        return $this->belongsTo("App\User","user_id");
    }
    public function kelurahans(){
        return $this->belongsTo("App\Kelurahan","kelurahan_id");
    }
    public function kriterias(){
        return $this->belongsToMany("App\Kriteria", 'detail_kriteria_hotels');
    }
    public function gambar_hotels(){
        return $this->hasMany("App\GambarHotel");
    }
    public function kamars(){
        return $this->hasMany("App\Kamar");
    }
    public function review_hotels(){
        return $this->hasMany("App\ReviewHotel");
    }
    protected $fillable = [
        'user_id','nama_hotel', 'email','kelurahan_id','status','longitude','latitude','no_telp','rating'
    ];

}
