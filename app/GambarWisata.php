<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarWisata extends Model
{
    protected $table = 'gambar_wisatas';
    public function wisatas(){
        return $this->belongsTo("App\Wisata","wisata_id");
    }
}
