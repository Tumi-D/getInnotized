<?php 
$url = 'https://client.teamcyst.com/api_call.php';

$additional_headers = array(
   'Content-Type: application/json'
);   
$data = array(
  "price"=> 0.1,
  "network"=> "mtn",
  "recipient_number"=> "0541386626",
  "sender"=> "0546945817",
  "option"=> "rmtm",
  "apikey"=> "ad453aaf52ca5cb22292a37bb6452eba4f6b4405",
  "orderID"=> "6728292"

  );
$data = json_encode($data);

$ch = curl_init($url);                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // $data is the request payload in JSON format                                                                 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers); 

$server_output = curl_exec($ch);
echo "done  ".$server_output;