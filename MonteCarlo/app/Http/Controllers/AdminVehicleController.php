<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminVehicleController extends Controller
{
    public function vehiclepage(){
        return view('admin.vehiclepage');
    }
}
