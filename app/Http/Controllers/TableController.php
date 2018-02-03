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


class TableController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Location $location, Event $event)
    {
        $tables = Table::where('event_id', $event->id)->get();
        return view('tables.index', compact('tables', $tables, 'location', $location, 'event', $event));
    }

    public function create()
    {
        return view('locations.create');
    }

    public function store(Request $request)
    {
        $admin_id = Auth::guard('admin')->id();

        //Validate
        $this->validate($request, [
            'name' => 'required|min:3',
            'description' => 'required',
            'address' => 'required',
            'capacity' => 'required'
        ]);


        $location = Location::create(['name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'capacity' => $request->capacity,
            'admin_id' => $admin_id

        ]);
        return redirect('/admin/locations/' . $location->id);
    }

    public function show(Location $location)
    {
        return view('locations.show', compact('location', $location));
    }


    public function update(Request $request, Location $location, Event $event, Table $table)
    {
        $user_id = Auth::id();

        $table->reserved = true;
        $table->user_id = $user_id;
        $table->save();

        $request->session()->flash('message', 'Reserved table for event!');
        $tables = Table::where('event_id', $event->id)->get();

        return view('tables.index', compact('tables', $tables, 'location', $location, 'event', $event));
    }


    public function edit(Location $location)
    {
        return view('locations.edit', compact('location', $location));
    }

    public function destroy(Request $request, Location $location)
    {
        $location->delete();
        $request->session()->flash('message', 'Successfully deleted the location!');
        return redirect('/admin/locations');
    }


}
