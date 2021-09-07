<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Penghuni;
use App\Kamar;
use App\Cabang;

class Sewa extends Model
{
    //
    protected $table = 'tbl_sewa';

    public function penghuniRef(){
        return $this->hasOne(Penghuni::class,'id','id_penghuni');
    }
    public function kamarRef(){
        return $this->hasOne(Kamar::class,'id','id_kamar');
    }
    public function cabangRef(){
        return $this->hasOne(Cabang::class,'id','id_kamar');
    }
}
