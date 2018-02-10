<?php

namespace App\Http\Controllers;

use App\Event;
use App\Location;
use App\Table;
use Auth;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class EventController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Location $location)
    {
        if ($location->id == "") {

            $events = Event::with("location")->get();
        } else {

            $events = Event::where('location_id', $location->id)->get();

        }
        $date = Carbon::now();
        return view('events.index', compact('events', $events, 'location', $location, 'date', $date));
    }

    public function create(Location $location, Event $event)
    {
        return view('events.create', compact('location', $location, 'event', $event));
    }

    public function store(Request $request, Location $location)
    {

        //Validate
        $this->validate($request, [
            'name' => 'required|min:3',
            'from' => 'required',
            'to' => 'required',
            'price' => 'required'
        ]);


        $event = Event::create(['name' => $request->name,
            'description' => $request->description,
            'from' => $request->from,
            'to' => $request->to,
            'price' => $request->price,
            'location_id' => $location->id

        ]);

        for ($i = 0; $i < $location->capacity; $i++) {
            $table = Table::create(['event_id' => $event->id,
                'user_id' => 0,
                'reserved' => false
            ]);

        }

        return redirect('/admin/locations/' . $location->id . '/events/' . $event->id);
    }

    public function show(Location $location, Event $event)
    {
        if ($event->to > Carbon::now()) {
            $event->to = "Expired";
        }
        return view('events.show', compact('event', $event, 'location', $location));
    }


    public function update(Request $request, Location $location, Event $event)
    {
        //Validate
        $this->validate($request, [
            'name' => 'required|min:3',
            'from' => 'required',
            'to' => 'required',
            'price' => 'required'
        ]);

        $event->name = $request->name;
        $event->from = $request->from;
        $event->to = $request->to;
        $event->price = $request->price;
        $event->location_id = $location->id;
        $event->save();
        $request->session()->flash('message', 'Настанот е успешно ажуриран');
        return redirect('admin/locations/' . $location->id . '/events');
    }


    public function edit(Location $location, Event $event)
    {
        return view('events.edit', compact('event', $event, 'location', $location));
    }

    public function destroy(Request $request, Location $location, Event $event)
    {
        Table::where('event_id', $event->id)->delete();
        $event->delete();
        $request->session()->flash('message', 'Успешно избришан настан!');
        return back();
    }


}
