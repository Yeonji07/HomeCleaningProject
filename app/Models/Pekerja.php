<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerja extends Model
{
    protected $table = "pekerja";
    protected $primaryKey = "id_pekerja";
    public $incrementing = true;
    public $timestamps = false;
}
