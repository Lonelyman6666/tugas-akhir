<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cabang;
use App\Fasilitas;


class Kamar extends Model
{
    //
    protected $table = 'tbl_kamar';

    public function cabangRef(){
        return $this->hasOne(Cabang::class,'id','id_cabang');
    }
    public function fasilitasRef(){
        return $this->hasOne(Fasilitas::class,'id','id_fasilitas');
    }

}
