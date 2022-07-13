<?php

namespace App\Http\Controllers;

use App\Models\Pilote;
use App\Http\Requests\StorePilote;
use Illuminate\Support\Facades\Auth;

class PiloteController extends Controller
{
    public function store(StorePilote $request)
    {

        $driving_licence_photo_path = '';
        $id = Auth::user()->id;


        if ($request->hasFile('driving_licence')) {
            $driving_licence_photo_path = $request->file('driving_licence')->store('pilotes_image', 'public');
         }

        Pilote::create([
            'user_id' => $id,
            'civility' => $request->civility,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'licence_status' => 'send',
            'birthdate' => $request->birthdate,
            'driving_licence' => $driving_licence_photo_path,

        ]);

        return redirect()->back();

    }

    public function destroy($id){

        Pilote::where('id', $id)->delete();

        return redirect()->back();
    }
}
