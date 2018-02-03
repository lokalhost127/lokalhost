<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Location;
use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingsController extends Controller
{
    public function store(Request $request, Location $location)
    {

        Rating::create([
            'star' => $request->star,
            'location_id' => $location->id,
            'user_id' => Auth::id()

        ]);
        return back();
    }
}
