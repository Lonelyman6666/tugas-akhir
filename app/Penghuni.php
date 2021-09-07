<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DetailPenghuni;

class Penghuni extends Model
{
    //
    protected $table = 'tbl_penghuni';
    protected $fillable = [
        'username_penghuni', 'password_penghuni','status'
    ];


    public function detailPenghuniRef(){
        return $this->belongsTo(DetailPenghuni::class,'id','penghuni_id');
    }
}