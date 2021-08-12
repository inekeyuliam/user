<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KotaKabupaten extends Model
{
    protected $table = 'kabupatens';
    protected $fillable = ['nama_kabupaten'];

    public function kecamatans(){
    return $this->hasMany("App\Kecamatan");
	}
}
