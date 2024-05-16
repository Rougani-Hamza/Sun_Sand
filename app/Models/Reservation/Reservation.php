<?php

namespace App\Models\Reservation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;


    protected $table = "reservation";

    protected $fillable = [
        "name",
        "phone_number",
        "num_guests",
        "checK_in_date",
        "destination",
        "price",
        "user_id",
        "status",
        
    ];

    public $timestamps = true;
}
