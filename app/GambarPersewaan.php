<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarPersewaan extends Model
{
    protected $table = 'gambar_persewaans';
    public function persewaans(){
        return $this->belongsTo("App\Persewaan","persewaan_id");
    }
}
