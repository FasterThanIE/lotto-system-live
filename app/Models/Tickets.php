<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = "tickets";

    protected $fillable = [
        "user_id", "numbers", "price",
    ];
}
