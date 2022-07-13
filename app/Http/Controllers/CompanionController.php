<?php

namespace App\Http\Controllers;

use App\Models\Companion;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCompanion;

class CompanionController extends Controller
{
    public function store(StoreCompanion $request)
    {

        $id = Auth::user()->id;

        Companion::create([
            'user_id' => $id,
            'civility' => $request->civility,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'birthdate' => $request->birthdate,

        ]);


        return redirect()->back();
    }

    public function destroy($id){

        Companion::where('id', $id)->delete();

        return redirect()->back();
    }
}
