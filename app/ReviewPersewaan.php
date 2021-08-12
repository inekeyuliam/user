<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewPersewaan extends Model
{
    protected $table = 'review_persewaans';
    public function persewaans(){
        return $this->belongsTo("App\Persewaan","persewaan_id");
    }
}
