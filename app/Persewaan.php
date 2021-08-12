<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persewaan extends Model
{
    protected $table = 'persewaans';
    public function users(){
        return $this->belongsTo("App\User","user_id");
    }
    public function kelurahans(){
        return $this->belongsTo("App\Kelurahan","kelurahan_id");
    }
    public function kriterias(){
        return $this->belongsToMany("App\Kriteria", 'detail_kriteria_persewaans');
    }
    public function kendaraans(){
        return $this->hasMany("App\Kendaraan");
    }
    public function gambar_persewaans(){
        return $this->hasMany("App\GambarPersewaan");
    }
    public function review_persewaans(){
        return $this->hasMany("App\ReviewPersewaan");
    }
    protected $fillable = [
        'user_id','nama_persewaan', 'email','kelurahan_id','status','longitude','latitude','no_telp','biaya_perhari'
    ];

}
