<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Countries;
use App\Models\States;
use App\Models\Cities;

class Countrycontroller extends Controller
{
    public function index()
    {
        $country = Countries::all();
        //print_r($country);die;
        return view('index',compact('country'));
    }

    public function getstates(Request $request){
        $states = States::where('country_id',$request->cid)->get();
        return response()->json($states);   
    }

    public function getcities(Request $request){
        $cities = Cities::where('state_id',$request->sid)->get();
        return response()->json($cities);   
    }
}
