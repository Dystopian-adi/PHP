<?php
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://mytesting.somee.com/Service.asmx',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'<v:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:d="http://www.w3.org/2001/XMLSchema" xmlns:c="http://schemas.xmlsoap.org/soap/encoding/" xmlns:v="http://schemas.xmlsoap.org/soap/envelope/"><v:Header /><v:Body><GetBank xmlns="http://tempuri.org/" id="o0" c:root="1" /></v:Body></v:Envelope>
',
  CURLOPT_HTTPHEADER => array(
    'accept-encoding:  gzip',
    'connection:  close',
    'content-type:  text/xml',
    'host:  mytesting.somee.com',
    'soapaction:  http://tempuri.org/GetBank',
    'user-agent:  kSOAP/2.0'
  ),
));

$GetBank = curl_exec($curl);

curl_close($curl);
// Create simple XML element
$xml = new SimpleXMLElement($GetBank);
$xml->registerXPathNamespace('test', 'http://tempuri.org/');

// Get value of first "GetListResponse" element
$result = (string)$xml->xpath('//test:GetBankResult')[0];
echo $result;
