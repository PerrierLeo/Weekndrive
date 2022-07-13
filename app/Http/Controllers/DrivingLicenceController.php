<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreDrivingLicence;

class DrivingLicenceController extends Controller
{
    public function store(StoreDrivingLicence $request)
    {

    $driving_licence_path = '';

    if ($request->hasFile('driving_licence')) {
        $driving_licence_path = $request->file('driving_licence')->store('driving_licence', 'public');
    }

    $user = User::where('id', Auth::user()->id)->first();

    $user->driving_licence = $driving_licence_path;
    $user->licence_status = 'send';

    $user->save();

    return redirect()->back();
    }

    public function download($path){

        $file = Storage::download($path);
        dd($file);
        return redirect()->back();



    }

}
