<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class AdminVehicleController extends Controller
{
    public function vehiclepage(){
        return view('admin.vehiclepage');
    }

    public function create()
    {
        return view('admin.vehiclecreate');
    }

    public function store(Request $request)
    {
        $vehicle = new Vehicle;
        $vehicle->brand = $request->input('brand');
        $vehicle->model = $request->input('model');
        $vehicle->numberplate = $request->input('numberplate');
        $vehicle->type = $request->input('type');
        $vehicle->save();

        return redirect()->route('admin.vehicle');
    }

    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        return view('admin.vehiclepage', compact('vehicle'));
    }

    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        return view('admin.vehicleedit', compact('vehicle'));
    }

    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->brand = $request->input('brand');
        $vehicle->model = $request->input('model');
        $vehicle->numberplate = $request->input('numberplate');
        $vehicle->type = $request->input('type');
        $vehicle->save();

        return redirect()->route('admin.vehicle');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle -> delete();

        return redirect()->route('admin.vehicle');
    }
}
