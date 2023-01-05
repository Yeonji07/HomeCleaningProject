<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Detail;
use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class Test1 extends BaseChart
{
    //jumlah transaksi yang dilakukan dalam 1 tahun
    public ?string $name = 'test1';

    /**
     * Determines the name suffix of the chart route.
     * This will also be used to get the chart URL
     * from the blade directrive. If null, the chart
     * name will be used.
     */
    public ?string $routeName = 'chart1';

    /**
     * Determines the prefix that will be used by the chart
     * endpoint.
     */
    // public ?string $prefix = 'admin/';

    /**
     * Determines the middlewares that will be applied
     * to the chart endpoint.
     */
    // public ?array $middlewares = ['auth'];

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        date_default_timezone_set("Asia/Jakarta");
        $arrayOfMonth = [];$arrayOfMonths = [];
        $totalTransaksi=[];
        for ($i=11; $i > 0; $i--) {
            $arrayOfMonth[] = Carbon::now()->subMonths($i)->format("m");
            $arrayOfMonths[] = Carbon::now()->subMonths($i)->format("M");
            $totalTransaksi[] = Detail::whereMonth("jam_selesai",Carbon::now()->subMonths($i)->format("m"))->count();

        }


        $arrayOfMonth[] = Carbon::now()->format("m");
        $arrayOfMonths[] = Carbon::now()->format("M");

        $totalTransaksi[] = Detail::whereMonth("jam_selesai",Carbon::now()->format("m"))->count();
        return Chartisan::build()
            ->labels($arrayOfMonths)
            ->dataset('Sample', $totalTransaksi);
    }
}
