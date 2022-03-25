<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori_kerusakan extends Model
{

    public function data(){
        return $this->belongsTo('app/data_kerusakan');
    }
}
