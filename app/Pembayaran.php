<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sewa;

class Pembayaran extends Model
{
    //
    protected $table = 'tbl_pembayaran';

    public function sewaRef(){
        return $this->belongsTo(Sewa::class, 'id_sewa', 'id');
    }

}
