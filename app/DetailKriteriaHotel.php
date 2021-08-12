<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKriteriaHotel extends Model
{
    protected $table = 'detail_kriteria_hotels';
    protected $fillable = ['nilai', 'hotel_id', 'kriteria_id'];

}
