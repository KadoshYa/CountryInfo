<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {

        // $data['name'] = $request->name;  
        // $data['email'] = $request->email;  
        // $data['amount'] = $request->amount;
        $data['link'] = "https://chapacheckout.herokuapp.compayment?name=".$request->name."&email=".$request->email."&amount=".$request->amount;  

        return $data;
    }
}
