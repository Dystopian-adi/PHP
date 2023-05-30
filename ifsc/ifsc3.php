<?php

$curl_GetBranch = curl_init();

curl_setopt_array($curl_GetBranch, array(
  CURLOPT_URL => 'http://mytesting.somee.com/Service.asmx',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'<v:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:d="http://www.w3.org/2001/XMLSchema" xmlns:c="http://schemas.xmlsoap.org/soap/encoding/" xmlns:v="http://schemas.xmlsoap.org/soap/envelope/"><v:Header /><v:Body><GetBranch xmlns="http://tempuri.org/" id="o0" c:root="1"><StateName i:type="d:string">HARYANA</StateName><Bankname i:type="d:string">BANK OF BARODA</Bankname><District i:type="d:string">TARAORI</District></GetBranch></v:Body></v:Envelope>',
  CURLOPT_HTTPHEADER => array(
    'accept-encoding:  gzip',
    'connection:  close',
    'content-type:  text/xml',
    'host:  mytesting.somee.com',
    'soapaction:  http://tempuri.org/GetBranch',
    'user-agent:  kSOAP/2.0'
  ),
));

$GetBranch = curl_exec($curl_GetBranch);
echo($GetBranch);
curl_close($curl_GetBranch);
// Create simple XML element
$xml3 = new SimpleXMLElement($GetBranch);
$xml3->registerXPathNamespace('test', 'http://tempuri.org/');

// Get value of first "GetListResponse" element
$result = (string)$xml3->xpath('//test:GetBranchResult')[0];
echo $result;
// Parse JSON
$values = json_decode($result, true);
foreach ($values['sumit'] as $key) {
  $bank_name = $key['bank_branch'];
}
