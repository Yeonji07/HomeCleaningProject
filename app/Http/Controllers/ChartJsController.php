<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class ChartJsController extends Controller
{
    public function index()
    {
        $month = ['1','2','3','4','5','6','7','8','9','10','11','12'];

        $pekerja = [];
        foreach ($month as $m) {
            $pekerja[] = Detail::whereMonth("jam_mulai","=",$m)->count();
        }

    	return view('Admin.chartjs')->with('month',json_encode($month,JSON_NUMERIC_CHECK))->with('pekerja',json_encode($pekerja,JSON_NUMERIC_CHECK));
    }
}
