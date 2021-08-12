<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKriteria extends Model
{
    
    protected $table = 'jenis_kriterias';
    public function kriterias(){
        return $this->hasMany("App\Kriteria");
    }
}
