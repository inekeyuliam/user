<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{   
    protected $table = 'kabupatens';
    protected $fillable = ['nama_kabupaten'];

}
