<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Detail;
use App\Models\User;
use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class Chart4 extends BaseChart
{
    public ?string $name = 'chart4';
    public ?string $routeName = 'chart4';
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        date_default_timezone_set("Asia/Jakarta");
        $arrayOfMonth = [];$arrayOfMonths = [];
        $totalUser=[];
        for ($i=11; $i > 0; $i--) {
            $arrayOfMonth[] = Carbon::now()->subMonths($i)->format("m");
            $arrayOfMonths[] = Carbon::now()->subMonths($i)->format("M");
            $totalUser[] = User::whereMonth("created_at",Carbon::now()->subMonths($i)->format("m"))->count();

        }


        $arrayOfMonth[] = Carbon::now()->format("m");
        $arrayOfMonths[] = Carbon::now()->format("M");

        $totalUser[] =  User::whereMonth("created_at",Carbon::now()->format("m"))->count();
        return Chartisan::build()
            ->labels($arrayOfMonths)
            ->dataset('Sample', $totalUser);
    }
}
