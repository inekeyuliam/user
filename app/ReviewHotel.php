<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewHotel extends Model
{
    protected $table = 'review_hotels';
    public function hotels(){
        return $this->belongsTo("App\Hotel","hotel_id");
    }
}
