<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Detail;
use App\Models\Subscription;
use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class Char3 extends BaseChart
{

    public ?string $routeName = 'chart3';
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $listAppointment = Subscription::where("id_subscription",">",4)->get();
        $jumlahPemesanan = [];
        $namaSubscription = [];

        foreach ($listAppointment as $i) {
            $namaSubscription[] = $i->nama_subscription;
            $temp  = Detail::where("id_subscription",$i->id_subscription)->get();
            $totalAppointment = 0;
            foreach ($temp as $j) {
                $totalAppointment+=1;
            }
            $jumlahPemesanan[] = $totalAppointment;
        }

        return Chartisan::build()
            ->labels($namaSubscription)
            ->dataset('Sample', $jumlahPemesanan);
    }
}
