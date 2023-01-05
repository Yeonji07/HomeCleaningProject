<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Detail;
use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class Chart2 extends BaseChart
{
    public ?string $name = 'chart2';

    /**
     * Determines the name suffix of the chart route.
     * This will also be used to get the chart URL
     * from the blade directrive. If null, the chart
     * name will be used.
     */
    public ?string $routeName = 'chart2';
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        date_default_timezone_set("Asia/Jakarta");
        $arrayOfDay = [];
        $totalPerDay = [];

        // $dayNow = Carbon::now()->subDay(30)->format('m Y');

        for ($i=0; $i <= 30; $i++) {
            $arrayOfDay[] = Carbon::now()->subDay(31)->addDay($i)->format('d');
            $tempDay = Carbon::now()->subDay(31)->addDay($i)->format('y-m-d');
            $temp = Detail::whereDate("jam_selesai","=",$tempDay)->get();
            $total1hari = 0;
            foreach($temp as $j){
                $tempp = $j->jumlah_voucher;
                $total1hari+= $tempp;
            }
            $totalPerDay[] = $total1hari;
        }



        return Chartisan::build()
            ->labels($arrayOfDay)
            ->dataset('Sample', $totalPerDay);
    }
}
