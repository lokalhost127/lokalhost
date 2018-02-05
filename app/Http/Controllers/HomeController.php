<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $locations = Location::all()->take(3);
        return view('home',compact('locations', $locations));

    }
}
