<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewWisata extends Model
{
    protected $table = 'review_wisatas';
    public function wisatas(){
        return $this->belongsTo("App\Wisata","wisata_id");
    }
}
