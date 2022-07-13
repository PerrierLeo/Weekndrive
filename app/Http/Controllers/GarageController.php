<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Inertia\Inertia;
use App\Models\Pilote;
use App\Models\Companion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GarageController extends Controller
{
    public function index(){

        $user = Auth::user();
        $cars = Car::where('user_id', Auth::user()->id)->get();
        $countCar = Car::where('user_id', Auth::user()->id)->count();
        $pilotes = Pilote::where('user_id', Auth::user()->id)->get();
        $countPilote = Pilote::where('user_id', Auth::user()->id)->count();
        $companions = Companion::where('user_id', Auth::user()->id)->get();
        $countCompanion = Companion::where('user_id', Auth::user()->id)->count();

        return Inertia::render('Garage/Garage', ['cars' => $cars, 'user' => $user, 'pilotes' => $pilotes, 'companions' => $companions, 'countCar' => $countCar, 'countPilote' => $countPilote, 'countCompanion' => $countCompanion]);
    }
}
