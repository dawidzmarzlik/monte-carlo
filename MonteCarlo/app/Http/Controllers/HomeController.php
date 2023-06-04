<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Opinion;
use App\Models\Student;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function about(){
        return view('about');
    }

    public function pricing(){

        $categories = Category::all();
        return view('pricing', compact('categories'));
    }

    public function opinion(){
        $opinions = Opinion::all();

        return view('opinion', compact('opinions'));
    }



}