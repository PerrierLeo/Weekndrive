<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function show(){
        $user_id = Auth::user()->stripe_id;
        $stripe = new \Stripe\StripeClient(
            'sk_test_51JlbbxFAPYrFMMXCCJlKNFdJT4Vh8LiSY32AtCbK9NtSOIyxVY9yD1V466aLDZM5tXL1tkOwel3rpiD73SLjWcrx00oToiN6rA'
          );
       $charge =  $stripe->customers->retrieve(
        $user_id,
      );

       return Inertia::render('Participations/Show', [
        'charge' => $charge
        ]);
    }
}
