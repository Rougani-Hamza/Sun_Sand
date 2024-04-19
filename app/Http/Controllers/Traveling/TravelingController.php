<?php

namespace App\Http\Controllers\Traveling;

use App\Http\Controllers\Controller;
use App\Models\Spots\Spots;
use App\Models\Cities\Cities;
use App\Models\Reservation\Reservation;
use Illuminate\Http\Request;
use Auth;

class TravelingController extends Controller
{
    public function about($id){
        $spots = Spots::select()->orderby('id', 'desc')->take(5)->where('City_id', $id)->get();


        $cities = Cities::find($id);

        return view('traveling.about', compact('spots', 'cities'));
    }


    public function makeReservations($id){


        $spots = Spots::find($id);

        return view('traveling.reservation', compact('spots'));
    }


    public function storeReservations (Request $request, $id){


        $spots = Spots::find($id);

        if ($request ->checK_in_date > date("Y-m-d")){
            $storeReservations = Reservation::create([
                "name" => $request ->name, 
                "phone_number" => $request ->phone_number, 
                "num_guests" => $request ->num_guests, 
                "checK_in_date" => $request ->checK_in_date, 
                "spots" => $request ->spots, 
                "price" => $spots ->price * $request ->num_guests, 
                "user_id" =>Auth::user()->id, 
    
    
            ]);

            if  ($storeReservations) {

                $price =Session::put('price', $spots ->price * $request ->num_guests);
                
                $newPrice =Session::get($price);

                echo "Reservation is made successfully";
            }

        } else {
            echo "Invalid Date ,You Need to choose a date in the future.";
        }
 


        //return view('traveling.reservation', compact('spots'));
    }


    
}
