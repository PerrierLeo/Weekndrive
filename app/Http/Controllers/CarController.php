<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\StoreCar;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function store(StoreCar $request)
    {

        $car_photo_path = '';
        $gray_card_path = '';
        $green_card_path = '';
        $id = Auth::user()->id;


        if ($request->hasFile('car_photo', 'gray_card', 'green_card')) {
            $car_photo_path = $request->file('car_photo')->store('cars_image', 'public');
            $gray_card_path = $request->file('gray_card')->store('cars_gray_card', 'public');
            $green_card_path = $request->file('green_card')->store('cars_green_card', 'public');
         }

        Car::create([
            'user_id' => $id,
            'brand' => $request->brand,
            'model' => $request->model,
            'year' => $request->year,
            'license_plate' => $request->license_plate,
            'gray_card' => $gray_card_path,
            'green_card' => $green_card_path,
            'car_photo' => $car_photo_path,
        ]);


        return redirect()->back();

    }

    public function destroy($id){

        Car::where('id', $id)->delete();

        return redirect()->back();
    }
}
