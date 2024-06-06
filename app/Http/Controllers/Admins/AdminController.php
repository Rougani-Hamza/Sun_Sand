<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Cities\Cities;
use App\Models\Reservation\Reservation;
use App\Models\Spots\Spots;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use File;


class AdminController extends Controller
{
    public function viewLogin() {

        return view('admins.login');

        
    }   

    public function checkLogin(Request $request) {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            
            return redirect() -> route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
        
    }

   
    public function index() {

        $citiesCount = Cities::select()->count();
        $spotsCount = Spots::select()->count();
        $adminsCount = Admin::select()->count();


        return view('admins.index', compact('adminsCount','citiesCount', 'spotsCount'));
  
    }

    public function allAdmins() {

        $allAdmins = Admin::select()->orderBy('id', 'desc')->get();


        return view('admins.alladmins', compact('allAdmins'));
  
    }

public function createAdmins() {

    return view('admins.createadmins');



}

public function storeAdmins(Request $request) {

    $storeAdmins = Admin::create([

         "name" => $request->name,
         "email" => $request->email,
         "password" =>  Hash::make($request->password),



    ]);

    if ($storeAdmins) {

        return Redirect::route('admins.all.admins')->with(['success' =>'Admin created successfully']);
    }

}

public function allCities (){

    $allCities = Cities::select()->orderBy('id', 'asc')->get();


    return view('admins.allcities', compact('allCities'));


}

public function createCities (){



    return view('admins.createcities');

}

public function storeCities(Request $request) {


    Request()->validate([

        "name" => "required|max:40",
        "population" => "required|max:40",
        "territory" => "required|max:40",
        "avg_rent_price" => "required|max:40",
        "description" => "required|max:240",
        "image" => "required|max:40",
        "region" => "required|max:40",
    ]);
    
    $destinationPath = 'assets/images/';
    $myimage = $request->image->getClientOriginalName();
    $request->image->move(public_path($destinationPath), $myimage);


    $storeCities = Cities::create([

         "name" => $request->name,
         "population" => $request->population,
         "territory" => $request->territory,
         "avg_rent_price" => $request->avg_rent_price,
         "description" => $request->description,
         "image" => $myimage,
         "region" => $request->region,


    ]);

    if ($storeCities) {

        return Redirect::route('all.cities')->with(['success' =>'City Created Successfully']);
    }

}

public function deleteCities ($id) {

    $deleteCity = Cities::find($id);

    if(File::exists(public_path('assets/images/' . $deleteCity->image))){
        File::delete(public_path('assets/images/' . $deleteCity->image));
    }else{
        //dd('File does not exists.');
    }

    $deleteCity->delete();

    if ($deleteCity) {

        return Redirect::route('all.cities')->with(['delete' =>'City Deleted Successfully']);
    }


}

public function editcity($id)
{
    $city = Cities::findOrFail($id);
    return view('admins.edit', compact('city'));
}

public function updatecity(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'population' => 'required|integer',
        'territory' => 'required',
        'avg_rent_price' => 'required|numeric'
    ]);

    $city = Cities::findOrFail($id);
    $city->update($request->all());

    return redirect()->route('all.cities')->with('success', 'City updated successfully');
}



public function allSpots () {

    $spots = Spots::select()->orderBy('id', 'desc')->get();

    return view ('admins.allspots', compact('spots'));
}

public function createSpots (){

    $cities = Cities::all();

    return view('admins.createspots', compact('cities'));

}



public function storeSpots(Request $request) {


    Request()->validate([

        "name" => "required|max:40",
        "image" => "required|max:900",
        "price" => "required|max:40",
        "category" => "required|max:40",
        "city_id" => "required|max:240",
    ]);
    
    $destinationPath = 'assets/images/';
    $myimage = $request->image->getClientOriginalName();
    $request->image->move(public_path($destinationPath), $myimage);


    $storeSpots = Spots::create([

         "name" => $request->name,
         "image" => $myimage,
         "price" => $request->price,
         "category" => $request->category,
         "city_id" => $request->city_id,


    ]);

    if ($storeSpots) {

        return Redirect::route('all.spots')->with(['success' =>'Spot Created Successfully']);
    }

}

public function editSpot($id)
{
    $spot = Spots::findOrFail($id);  // Ensure the spot exists or throw a 404 error
    return view('admins.editspots', compact('spot'));  // Return the edit view with the spot data
}

public function updateSpot(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'price' => 'required|numeric',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $spot = Spots::findOrFail($id);

    $spot->name = $request->name;
    $spot->category = $request->category;
    $spot->price = $request->price;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('assets/images'), $imageName);
        $spot->image = $imageName;
    }

    $spot->save();

    return redirect()->route('all.spots')->with('success', 'Spot updated successfully!');
}



public function deleteSpots ($id) {

    $deleteSpot = Spots::find($id);

    if(File::exists(public_path('assets/images/' . $deleteSpot->image))){
        File::delete(public_path('assets/images/' . $deleteSpot->image));
    }else{
        //dd('File does not exists.');
    }

    $deleteSpot->delete();

    if ($deleteSpot) {

        return Redirect::route('all.spots')->with(['delete' =>'Spot Deleted Successfully']);
    }


}

public function allBookings () {

    $bookings = Reservation::select()->orderBy('id', 'desc')->get();

    return view ('admins.allbookings', compact('bookings'));
}

public function editBookings ($id) {

    $booking = Reservation::find($id);

    return view ('admins.editbooking', compact('booking'));
}

public function updateBookings (Request $request, $id) {

    $editBooking = Reservation::find($id);
    $editBooking->update($request->all());

    if ($editBooking) {

        return Redirect::route('all.bookings')->with(['update' =>'The Booking Status Successfully Update']);
    }}



    public function deleteBookings ($id) {

        $deleteBooking = Reservation::find($id);
    
    
    
        $deleteBooking->delete();
    
        if ($deleteBooking) {
    
            return Redirect::route('all.bookings')->with(['delete' =>'The Booking Has Been Deleted Successfully']);
        }
    
    
    }
    

}
