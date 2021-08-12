<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarKamar extends Model
{
    public function kamars(){
        return $this->belongsTo("App\Kamar","kamar_id");
    }
}
