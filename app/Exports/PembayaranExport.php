<?php

namespace App\Exports;

use App\Pembayaran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use carbon\Carbon;

class PembayaranExport implements FromView
{
    
    public function view(): View
    {

        $pembayaran = Pembayaran::with("sewaRef")->whereMonth('tanggal_pembayaran', Carbon::now()->month)->get();
        return view('admin.pembayaran.eksport', [
            'pembayaran' => $pembayaran
        ]);
    }
}
