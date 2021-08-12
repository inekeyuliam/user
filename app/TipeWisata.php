<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeWisata extends Model
{
    protected $table = 'tipe_wisatas';

    public function wisatas(){
        return $this->hasMany("App\Wisata");
    }
}
