<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = "rating_pekerja";
    protected $primaryKey = "id_rating";
    public $incrementing = true;
    public $timestamps = false;
}
