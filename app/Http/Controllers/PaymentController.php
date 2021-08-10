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
        $data['link'] = "https://chapacheckout.herokuapp.compayment?email=".$request->email."&amount=".$request->amount;  

        return $data;
    }
    public function payment (Request $request)
    {
        $response = Http::asForm()->post('https://paymentuat.psseth.com/ss-ecom-merchant-kit/buyForm', [
            'PSP ID' => 'PSP_001',
            'MPI ID' => 'mpi-test',
            'Merchant ID' => '000030010400090',
            'MCC' => '6011',
            'Merchant Kit ID' => 'mki-test',
            'Authentification Token' => 'ABA50477AF5266E2E053CF01010A0914',
            'Currency' => '230 ',
        ]);

        dd($response);
        return $payment;
    }
}
