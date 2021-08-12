<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKamar extends Model
{
    protected $table = 'jenis_kamars';
    public function kamars(){
        return $this->hasMany("App\Kamar");
    }
}
