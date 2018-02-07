<?php

namespace App\Http\Controllers;

use App\Location;
use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class RatingsController extends Controller
{
    public function store(Request $request, Location $location)
    {

        Rating::updateOrCreate(
            [   'user_id' => Auth::id(),
                'location_id' => $location->id
            ],
            [
                'star' => Input::get('star'),
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
