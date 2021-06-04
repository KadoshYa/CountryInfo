<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisaninweb\SoapWrapper\SoapWrapper;
use SoapClient;

class SoapController extends Controller

{
   
      public function data(Request $request){

      
$contextOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    ));

$sslContext = stream_context_create($contextOptions);

$params =  array(
    'trace' => 1,
    'exceptions' => true,
    'cache_wsdl' => WSDL_CACHE_NONE,
    'stream_context' => $sslContext
    );

try {


    $soapClient = new SoapClient('http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL');

        $ct_name = $request->countryName;

        $countryName = array(
            'sCountryName'=>$ct_name
           );

        $code_tmp= $soapClient->CountryISOCode ($countryName);

        $code =json_decode(json_encode($code_tmp), true);

        $code = $code['CountryISOCodeResult'];

        $param2 = array(
            'sCountryISOCode'=>($code)
        );
        
     $countryInfo =$soapClient->FullCountryInfo ($param2);

   echo '<br><br>';

   //If the json output is needed you can use this output
        $json_output = json_encode($countryInfo);

        $array =json_decode($json_output, true);


        return view('welcome')->with('array', $array);   

} catch (Exception $e) {
    echo $e->getMessage();
}

}

public function check(Request $request)
{
 
}

}