<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Event;
use App\Models\Pilote;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        return Inertia::render('Admin/Admin', [
            'CountEvents' => Event::count(),
            'CountUsers' => User::count()
        ]);


    }

    //Users

    public function indexUsers(Request $request){

        //$user = User::with('car', 'pilote', 'companion')->first();
        //dd($user);

        return Inertia::render('Admin/IndexUsers', [
            'users' => User::latest()->with('car', 'pilote')->when($request->term, function($query, $term){
                $query->where('email', 'LIKE', '%'.$term.'%')->orWhere('firstname', 'LIKE', '%' . $term . '%')->orWhere('lastname', 'LIKE', '%' . $term . '%');;
            })->paginate(),

        ]);
    }


    public function showUser($id){
        $user = User::with('car', 'companion', 'pilote')->where('id', $id)->first();
        return Inertia::render('Admin/ShowUser', [
            'user' => $user

        ]);
    }

    public function userUpdate(Request $request, $id){

        $user = User::where('id', $id)->first();
        $user->civility = $request->civility;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->birthdate = $request->birthdate;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->licence_status = $request->licence_status;


        $user->save();

        return redirect()->back();



    }

    public function carUpdate(Request $request, $id){

        $car = Car::where('id', $id)->first();
        $car->status = $request->status;
        $car->save();

        return redirect()->back();
    }

    public function piloteUpdate(Request $request, $id){

        $pilote = Pilote::where('id', $id)->first();
        $pilote->licence_status = $request->licence_status;
        $pilote->save();

        return redirect()->back();
    }

    public function userDestroy($id){

        User::where('id', $id)->delete();

        return redirect()->route('admin.index');
    }

    // Events

    public function indexEvents(Request $request){


        return Inertia::render('Admin/IndexEvents', [
            'events' => Event::when($request->term, function($query, $term){
                $query->where('name', 'LIKE', '%'.$term.'%')->orWhere('start_date', 'LIKE', '%' . $term . '%');
            })->paginate(),

        ]);
    }
}
