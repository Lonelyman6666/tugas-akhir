<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    //
    protected $table = 'tbl_keluhan';
    public function sewaRef(){
        return $this->hasOne(Sewa::class,'id','id_sewa');
    }
}
