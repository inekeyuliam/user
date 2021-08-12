<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarHotel extends Model
{
    protected $table = 'gambar_hotels';
    public function hotels(){
        return $this->belongsTo("App\Hotel","hotel_id");
    }
}
