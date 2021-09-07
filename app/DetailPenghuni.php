<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Penghuni;

class DetailPenghuni extends Model
{
    //
    protected $table = 'tbl_detail_penghuni';
    protected $primaryKey = 'penghuni_id';
    protected $timestamp = false;

    public function penghuniRef(){
        return $this->hasOne(Penghuni::class,'id','penghuni_id');
    }
}
