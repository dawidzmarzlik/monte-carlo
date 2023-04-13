<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Validation\Rule;

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
        $messages = [
            'brand.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'model.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'numberplate.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'numberplate.max' => 'Pole powinno się składać z maksymalnie 8 znaków.',     
            'numberplate.unique' => 'Tablica rejestracyjna jest już wykorzystana.',     
            'type.required' => 'Pole jest wymagane. Uzupełnij dane.',     
        ];

        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'numberplate' => 'required|max:8|unique:vehicle',
            'type' => 'required'
        ], $messages);

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
        $messages = [
            'brand.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'model.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'numberplate.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'numberplate.max' => 'Pole powinno się składać z maksymalnie 8 znaków.',     
            'numberplate.unique' => 'Tablica rejestracyjna jest już wykorzystana.',     
            'type.required' => 'Pole jest wymagane. Uzupełnij dane.',     
        ];

        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'numberplate' => [
                'required',
                Rule::unique('vehicle')->ignore($id),
                'max:8'
            ],
            'type' => 'required'
        ], $messages);

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
