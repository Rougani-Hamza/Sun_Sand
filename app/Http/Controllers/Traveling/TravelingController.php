<?php

namespace App\Http\Controllers\Traveling;
use App\Http\Controllers\Controller;
use App\Models\Spots\Spots;
use App\Models\Cities\Cities;
use App\Models\Reservation\Reservation;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Auth;

class TravelingController extends Controller
{
    public function about($id){
        $spots = Spots::select()->orderby('id', 'desc')->take(5)->where('city_id', $id)->get();


        $cities = Cities::find($id);

        return view('traveling.about', compact('spots', 'cities'));
    }


    public function makeReservations($id){


        $spots = Spots::find($id);

        return view('traveling.reservation', compact('spots'));
    }


    public function storeReservations (Request $request){


        $spots = Spots::find($request->id);


        if ($request ->checK_in_date > date("Y-m-d")){
            $totalPrice =(int)$spots->price * (int)$request->num_guests;
            $storeReservations = Reservation::create([
                "name" => $request->name, 
                "phone_number" => $request->phone_number, 
                "num_guests" => $request->num_guests, 
                "checK_in_date" => $request->checK_in_date, 
                "destination" => $request->destination, 
                "price" => $totalPrice, 
                "user_id" => $request->user_id, 
    
    
            ]);

            if  ($storeReservations) {

                $price =Session::put('price', $spots ->price * $request ->num_guests);
                
                $newPrice =Session::get($price);

                return Redirect::route('traveling.pay', ['id' => $spots->id]);
            }

        } else {
            echo "Invalid Date ,You Need to choose a date in the future.";
        }
 


    }

    public function payWithPaypal(){

        

        return view('traveling.pay');
    }


    public function success(){

        Session::forget('price');

        return view('traveling.success');


    }

    public function deals(){

        $spots = Spots::select()->orderby('id', 'desc')->take(4)->get();
        $cities = Cities::all();
        return view('traveling.deals', compact('spots', 'cities'));


    }

    public function searchDeals(Request $request) {
        $cities_id = $request->get('cities_id');
        $price = (int) $request->get('price');
        
        $searches = Spots::where('city_id', $cities_id)
                         ->where('price', '<=', $price)
                         ->orderBy('id', 'desc')
                         ->take(4)
                         ->get();
        $cities = Cities::all();
    
        return view('traveling.searchdeals', compact('searches', 'cities'));
    }
    
    

    

    

    
}
