<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatans';
    protected $fillable = ['nama_kecamatan'];

    public function kabupatens(){
        return $this->belongsTo("App\KotaKabupaten","kabupaten_id");
    }
    public function kelurahans(){
    return $this->hasMany("App\Kelurahan");
	}
}
