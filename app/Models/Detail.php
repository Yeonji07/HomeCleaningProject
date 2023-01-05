<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = "detail_transaksi";
    protected $primaryKey = "id_dt_transaksi";
    public $incrementing = true;
    public $timestamps = false;
}
