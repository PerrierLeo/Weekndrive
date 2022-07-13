<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\event_register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaiementController extends Controller
{
    public function create($event_id){
        $event = event_register::where('id', $event_id)->first();
        return view('paiement', [
            'event' => $event
        ]);
    }


    public function paiementValidate(Request $request){
        $user = Auth::user()->id;
        $users = User::where('id', $user)->first()->id;
        $amount= 20000;
        dd($users);

        try {
            $payment = $users->charge(
                $amount,
                $request->payment_method_id,
                [
                    'currency' => 'eur',
                ]
            );

         Order::create([
                'user_id' => $users,
                'email' => $request->email,
                'address' => $request->address,
                'city' => $request->city,
                'zip_code' => $request->zip_code,
                'transaction_id' => $payment->charges->data[0]->id,
                'total' => $payment->charges->data[0]->amount
            ]

        );

            $payment = $payment->asStripePaymentIntent();



        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }



    }

    public function billingStore(Request $request, $event){
        $user_id = Auth::user()->id;

        $user = Auth::user();
        $amount = $event * 100;


            $payment = $user->charge(
                $amount,
                $request->payment_method,[
                    'currency' => 'eur',
                ],
            );

            $payment = $payment->asStripePaymentIntent();

           if(!$user->stripe_id){
            $stripeCustomer = $user->createAsStripeCustomer([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
            ]);
            }


            Order::create([
                'user_id' => $user_id,
                'transaction_id' => $payment->charges->data[0]->id,
                'email' => $request->email,
                'address' => $request->address,
                'city' => $request->city,
                'zip_code' => $request->zip_code,
                'total' => $event,
            ]);

            $success = 1;


        return redirect()->route('dashboard')->with($success);

     }


}
