<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    //
    protected $table = 'tbl_pesan';

    public function fasilitasRef(){
        return $this->hasOne(Fasilitas::class,'id','id_fasilitas');
    }
}
