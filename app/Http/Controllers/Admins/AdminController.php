<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Cities\Cities;
use App\Models\Spots\Spots;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


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

}
