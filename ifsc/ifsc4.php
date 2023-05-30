<?php

$curl_GetIFCScode = curl_init();

curl_setopt_array($curl_GetIFCScode, array(
  CURLOPT_URL => 'http://mytesting.somee.com/Service.asmx',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'<v:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:d="http://www.w3.org/2001/XMLSchema" xmlns:c="http://schemas.xmlsoap.org/soap/encoding/" xmlns:v="http://schemas.xmlsoap.org/soap/envelope/"><v:Header /><v:Body><GetIFCScode xmlns="http://tempuri.org/" id="o0" c:root="1"><statename i:type="d:string">GUJARAT</statename><bankname i:type="d:string">BANK OF BARODA</bankname><districtname i:type="d:string">SURAT</districtname><branchname i:type="d:string">CHHIPWAD BRANCH</branchname></GetIFCScode></v:Body></v:Envelope>',
  CURLOPT_HTTPHEADER => array(
    'accept-encoding:  gzip',
    'connection:  close',
    'content-type:  text/xml',
    'host:  mytesting.somee.com',
    'soapaction:  http://tempuri.org/GetIFCScode',
    'user-agent:  kSOAP/2.0'
  ),
));

$GetIFCScode = curl_exec($curl_GetIFCScode);
echo $GetIFCScode;

curl_close($curl_GetIFCScode);
// Create simple XML element
$xml4 = new SimpleXMLElement($GetIFCScode);
$xml4->registerXPathNamespace('test', 'http://tempuri.org/');

// Get value of first "GetListResponse" element
$result = (string)$xml4->xpath('//test:GetIFCScodeResult')[0];
echo $result;
// Parse JSON
$values = json_decode($result, true);
foreach ($values['sumit'] as $key) {
  $bank_name = $key['bank_ifsc'];
}