<?php

$curl_GetBankState = curl_init();

curl_setopt_array($curl_GetBankState, array(
  CURLOPT_URL => 'http://mytesting.somee.com/Service.asmx',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'<v:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:d="http://www.w3.org/2001/XMLSchema" xmlns:c="http://schemas.xmlsoap.org/soap/encoding/" xmlns:v="http://schemas.xmlsoap.org/soap/envelope/"><v:Header /><v:Body><GetBankState xmlns="http://tempuri.org/" id="o0" c:root="1"><bankname i:type="d:string">ALLAHABAD BANK</bankname></GetBankState></v:Body></v:Envelope>',
  CURLOPT_HTTPHEADER => array(
    'accept-encoding:  gzip',
    'connection:  close',
    'content-type:  text/xml',
    'host:  mytesting.somee.com',
    'soapaction:  http://tempuri.org/GetBankState',
    'user-agent:  kSOAP/2.0'
  ),
));

$GetBankState = curl_exec($curl_GetBankState);

curl_close($curl_GetBankState);
// Create simple XML element
$xml1 = new SimpleXMLElement($GetBankState);
$xml1->registerXPathNamespace('test', 'http://tempuri.org/');

// Get value of first "GetListResponse" element
$result = (string)$xml1->xpath('//test:GetBankStateResult')[0];
echo $result;
// Parse JSON
$values = json_decode($result, true);
foreach ($values['sumit'] as $key) {
	$bank_state = $key['bank_state'];
}
