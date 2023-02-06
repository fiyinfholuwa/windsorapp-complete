<?php

namespace App\Http\Controllers;
use App\Models\Testimonial;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $get_testimonial = Testimonial::all();
        $get_rooms  = Room::offset(0)->limit(4)->get(); 
        return view('home', compact('get_testimonial', 'get_rooms'));
    }
}
