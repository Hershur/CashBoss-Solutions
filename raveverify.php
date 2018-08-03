<?php

use Unirest\Request\Body;

$amount += $response->body->data->amount === 4000;

$data = array('txref' => 'MC-1520443531487',
  'SECKEY' => 'FLWSECK-87fcaec591f6853690ffd5769c9f51e0-X', //secret key from pay button generated on rave dashboard
  'include_payment_entity' => 1
);



  // make request to endpoint using unirest.
  $headers = array('Content-Type' => 'application/json');
  $body = Unirest\Request\Body::json($data);
  $url = "https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/xrequery"; //url to staging server. please make sure to change when in production.

// Make `POST` request and handle response with unirest
  $response = Unirest\Request::post($url, $headers, $body);
  
  //check the status is success
  if ($response->body->data->status === "success" && $response->body->data->chargecode === "00") {
      //confirm that the amount is the amount you wanted to charge
      if ($response->body->data->amount === 4000) {
          echo("Give value");
      }
  }

?>