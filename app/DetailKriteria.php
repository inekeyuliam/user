<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKriteria extends Model
{
    protected $table = 'detail_kriterias';
    
    public function kriterias(){
        return $this->belongsTo("App\Kriteria","kriteria_id");
    }
}
