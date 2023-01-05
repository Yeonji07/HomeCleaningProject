<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metode_Pembayaran extends Model
{
    protected $table = "metode_pembayaran";
    protected $primaryKey = "id_metode_pembayaran";
    public $incrementing = true;
    public $timestamps = false;
}
