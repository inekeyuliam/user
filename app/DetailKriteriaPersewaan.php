<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKriteriaPersewaan extends Model
{
    protected $table = 'detail_kriteria_persewaans';
    protected $fillable = ['nilai', 'persewaan_id', 'kriteria_id'];

}
