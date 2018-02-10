<?php

namespace App\Http\Controllers;

use App\Location;
use Auth;
use File;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LocationController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function __construct()
    {
        $this->middleware('locations');
    }

    public function index()
    {
        $admin_id = Auth::guard('admin')->id();
        if ($admin_id == null) {
            $locations = Location::all();
        } else {
            $locations = Location::where('admin_id', $admin_id)->get();

        }

        return view('locations.index', compact('locations', $locations));
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
            'capacity' => 'required',
            'contact' => 'required',
            'image' => 'required',
        ]);

        $location = Location::create(['name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'capacity' => $request->capacity,
            'admin_id' => $admin_id,
            'rating' => 0,
            'contact' => $request->contact,
            'image' => ""
        ]);

        $location->image = "lokal" . $location->id . ".svg";
        $location->save();
        Storage::put("public/" . $location->image, $request->image, 'public');

        return redirect('/admin/locations/' . $location->id);
    }

    public function show(Location $location)
    {
        return view('locations.show', compact('location', $location));
    }


    public function update(Request $request, Location $location)
    {
        //Validate
        $this->validate($request, [
            'name' => 'required|min:3',
            'description' => 'required',
        ]);

        $location->name = $request->name;
        $location->description = $request->description;
        $location->capacity = $request->capacity;
        $location->address = $request->address;
        $location->save();
        $request->session()->flash('message', 'Successfully modified the location!');
        return redirect('admin/locations');
    }


    public function edit(Location $location)
    {
        return view('locations.edit', compact('location', $location));
    }

    public function destroy(Request $request, Location $location)
    {
        $location->delete();
        $request->session()->flash('message', 'Successfully deleted the location!');
        return back();
    }


}
