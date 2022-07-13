<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEvent;

class EventController extends Controller
{
    public function index(){

        return Inertia::render('Event/Events', [
            'events' => Event::get()
        ]);
    }

    public function show($id){

        return Inertia::render('Event/Event', [
            'event' => Event::where('id', $id)->first()
        ]);
    }



    public function eventShow($id){
        $event = Event::where('id', $id)->first();
        return Inertia::render('Admin/ShowEvent', [
            'event' => $event

        ]);
    }

    public function store(StoreEvent $request)
    {

        $image_event_path = '';

        if ($request->hasFile('image_event')) {
            $image_event_path = $request->file('image_event')->store('event', 'public');
         }

        Event::create([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'available_car' => $request->available_car,
            'available_place' => $request->available_place,
            'image_event' => $image_event_path,
            'price' => $request->price,
            'pilote_price' => $request->pilote_price,
            'companion_price' => $request->companion_price,

        ]);

        return redirect()->back();

    }

    public function eventUpdate(Request $request, $id){

        $event = Event::where('id', $id)->first();
        $event->name = $request->name;
        $event->title = $request->title;
        $event->description= $request->description;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->start_time = $request->start_time;
        $event->end_time= $request->end_time;
        $event->available_place = $request->available_place;
        $event->price = $request->price;
        $event->status = $request->status;
        $event->pilote_price = $request->pilote_price;
        $event->companion_price = $request->companion_price;

        $event->save();

        return redirect()->back();

    }

    public function destroy($id){

        Event::where('id', $id)->delete();

        return redirect()->route('admin.index.events');
    }
}
