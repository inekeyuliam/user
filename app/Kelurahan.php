<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahans';
    protected $fillable = ['nama_kelurahan'];

    public function kecamatans(){
        return $this->belongsTo("App\Kecamatan","kecamatan_id");
    }
}
