<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = "subscription";
    protected $primaryKey = "id_subscription";
    public $incrementing = true;
    public $timestamps = false;
}
