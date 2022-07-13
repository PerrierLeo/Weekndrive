<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRegister;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Event;
use App\Models\event_register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventRegisterController extends Controller
{
    public function create($id){
        $user_id = Auth::user()->id;
        return Inertia::render('Event/EventCreate', [
            'event' => Event::where('id', $id)->first(),
            'user' => User::where('id', $user_id)->with('pilote', 'car', 'companion')->first(),
        ]);
    }

    public function storeEventRegister(StoreEventRegister $request, $id, $event_id){

        $event = event_register::create([
            'car_id' => $request->car_id['id'],
            'event_id' => $event_id,
            'user_id' => $id,
            'second_pilote' => $request->second_pilote['id'] ?? 0,
            'third_pilote' => $request->third_pilote['id'] ?? 0,
            'first_companion' => $request->first_companion['id'] ?? 0,
            'second_companion' => $request->second_companion['id'] ?? 0,
            'total_companion_price' => $request->total_companion_price,
            'total_price_ht' => $request->total_price_ht,
            'total_pilote_price' => $request->total_pilote_price,

        ]);

        return redirect()->route('paiement.create',  $event);
    }


}
