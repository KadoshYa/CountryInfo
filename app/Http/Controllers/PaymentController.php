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
        $data['link'] = "http://127.0.0.1:4000/payment?name=".$request->name."&email=".$request->email."&amount=".$request->amount;  

        return $data;
    }
}
