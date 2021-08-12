<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraans';
    public function persewaans(){
        return $this->belongsTo("App\Persewaan","persewaan_id");
    }

    public function merk_kendaraan(){
        return $this->belongsTo("App\MerkKendaraan",'merk_id');
    }
}
