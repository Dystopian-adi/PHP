<?php

$curl_GetDistrict = curl_init();

curl_setopt_array($curl_GetDistrict, array(
  CURLOPT_URL => 'http://mytesting.somee.com/Service.asmx',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'<v:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:d="http://www.w3.org/2001/XMLSchema" xmlns:c="http://schemas.xmlsoap.org/soap/encoding/" xmlns:v="http://schemas.xmlsoap.org/soap/envelope/"><v:Header /><v:Body><GetDistrict xmlns="http://tempuri.org/" id="o0" c:root="1"><StateName i:type="d:string">GUJARAT</StateName><Bankname i:type="d:string">ABHYUDAYA COOPERATIVE BANK LIMITED</Bankname></GetDistrict></v:Body></v:Envelope>',
  CURLOPT_HTTPHEADER => array(
    'accept-encoding:  gzip',
    'connection:  close',
    'content-type:  text/xml',
    'host:  mytesting.somee.com',
    'soapaction:  http://tempuri.org/GetDistrict',
    'user-agent:  kSOAP/2.0'
  ),
));

$GetDistrict = curl_exec($curl_GetDistrict);

curl_close($curl_GetDistrict);
// Create simple XML element
$xml2 = new SimpleXMLElement($GetDistrict);
$xml2->registerXPathNamespace('test', 'http://tempuri.org/');

// Get value of first "GetListResponse" element
$result = (string)$xml2->xpath('//test:GetDistrictResult')[0];
echo $result;
// Parse JSON
$values = json_decode($result, true);
foreach ($values['sumit'] as $key) {
  $bank_name = $key['bank_district'];
}
