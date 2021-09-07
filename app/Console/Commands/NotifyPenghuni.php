<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Sewa;

class NotifyPenghuni extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:penghuni';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // echo "Test";
        $sewa = Sewa::whereNotNull('tenggak_waktu')->with('penghuniRef')->get();
        foreach($sewa as $s) {
            $tenggak = \Carbon\Carbon::parse($s->tenggak_waktu);
            $diffInDays = $tenggak->diff(\Carbon\Carbon::now())->days;
            $nomor = $s->penghuniRef->detailPenghuniRef->wa_penghuni;
            if ($diffInDays == 7 ){
                $nomor = $s->penghuniRef->detailPenghuniRef->wa_penghuni;
                $pesan = "Sewa Kost Anda tersisa 1 minggu lagi silahkan lakukan pembayaran untuk memperpanjang waktu sewa  \n Lestari Kost";
                $this->sendWa($nomor, $pesan);
            }
        }
    }
    public function sendWa($number, $message){

        $userkey = 'f755728c5026';
        $passkey = '2781a12b1b66632be44ffd12';
        $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $number,
            'message' => $message
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);
    }
}
