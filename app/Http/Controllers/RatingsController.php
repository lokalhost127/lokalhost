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


        if ($location->rating == 0) {
            $rating = $request->star;
        } else {
            $rating = ($location->rating + $request->star) / 2;

        }

        $location->rating = $rating;
        $location->save();

        return back();
    }
}
