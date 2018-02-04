<?php

namespace App\Http\Controllers;

use App\Event;
use App\Location;
use App\Table;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Auth;


class MyReservationsController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $user_id = Auth::id();
        $events = Table::with('event')->where('user_id',$user_id)->get();
        return view('my-reservations', compact('events', $events));
    }


}
