<?php

namespace App\Exports;

use App\Pengeluaran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use carbon\Carbon;

class PengeluaranExport implements FromView
{
    
    public function view(): View
    {

        $pengeluaran = Pengeluaran::whereMonth('tanggal', Carbon::now()->month)->get();
        return view('admin.pengeluaran.eksport', [
            'pengeluaran' => $pengeluaran
        ]);
    }
}
