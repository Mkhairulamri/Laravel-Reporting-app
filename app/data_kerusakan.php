<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_kerusakan extends Model
{   
    public function kategori(){
        return $this->kategori_kerusakan('app/kategori_kerusakan');
    }
}
