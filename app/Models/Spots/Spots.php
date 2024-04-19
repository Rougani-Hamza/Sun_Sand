<?php

namespace App\Models\Spots;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spots extends Model
{
    use HasFactory;

    protected $table = "spots";

    protected $fillable = [
        "name",
        "image",
        "price",
        "category",
        "city_id",



    ];

    public $timestamps = true;
}
