<?php
set_time_limit(15000);
// $curl = curl_init();
// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'http://mytesting.somee.com/Service.asmx',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_POSTFIELDS =>'<v:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:d="http://www.w3.org/2001/XMLSchema" xmlns:c="http://schemas.xmlsoap.org/soap/encoding/" xmlns:v="http://schemas.xmlsoap.org/soap/envelope/"><v:Header /><v:Body><GetBank xmlns="http://tempuri.org/" id="o0" c:root="1" /></v:Body></v:Envelope>
// ',
//   CURLOPT_HTTPHEADER => array(
//     'accept-encoding:  gzip',
//     'connection:  close',
//     'content-type:  text/xml',
//     'host:  mytesting.somee.com',
//     'soapaction:  http://tempuri.org/GetBank',
//     'user-agent:  kSOAP/2.0'
//   ),
// ));

// $GetBank = curl_exec($curl);

// curl_close($curl);
// // Create simple XML element
// $xml = new SimpleXMLElement($GetBank);
// $xml->registerXPathNamespace('test', 'http://tempuri.org/');

// // Get value of first "GetListResponse" element
// $result = (string)$xml->xpath('//test:GetBankResult')[0];
// echo $result;
	


$filename = "bank_list.json";
$result = file_get_contents($filename);  
$resp = array();
$values = json_decode($result, true);
foreach ($values['sumit'] as $key) {
	$bank_name = $key['bank_name'];
	// echo $bank_name;
	$ad['bank_name']=$bank_name;
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
	  CURLOPT_POSTFIELDS =>'<v:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:d="http://www.w3.org/2001/XMLSchema" xmlns:c="http://schemas.xmlsoap.org/soap/encoding/" xmlns:v="http://schemas.xmlsoap.org/soap/envelope/"><v:Header /><v:Body><GetBankState xmlns="http://tempuri.org/" id="o0" c:root="1"><bankname i:type="d:string">'.$bank_name.'</bankname></GetBankState></v:Body></v:Envelope>',
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
	$result1 = (string)$xml1->xpath('//test:GetBankStateResult')[0];
	// echo $result1;
	// Parse JSON
	$values1 = json_decode($result1, true);
	$ar = array();
	foreach ($values1['sumit'] as $key1) {
		$bank_state = $key1['bank_state'];
		$adi['bank_state'] = $bank_state;
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
		  CURLOPT_POSTFIELDS =>'<v:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:d="http://www.w3.org/2001/XMLSchema" xmlns:c="http://schemas.xmlsoap.org/soap/encoding/" xmlns:v="http://schemas.xmlsoap.org/soap/envelope/"><v:Header /><v:Body><GetDistrict xmlns="http://tempuri.org/" id="o0" c:root="1"><StateName i:type="d:string">'.$bank_state.'</StateName><Bankname i:type="d:string">'.$bank_name.'</Bankname></GetDistrict></v:Body></v:Envelope>',
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
		$result2 = (string)$xml2->xpath('//test:GetDistrictResult')[0];
		// echo $result2;
		// Parse JSON
		$arr=array();
		$values2 = json_decode($result2, true);
		foreach ($values2['sumit'] as $key2) {
			$haystack1 = $key2['bank_district'];
			$needle1   = '&';
			if (strpos($haystack1, $needle1) !== false) {
		  		$bank_district = str_replace('&', '&amp;', $key2['bank_district']);
			} else {
		  		$bank_district = $key2['bank_district'];
			}
		  	$adii['bank_district']=$bank_district;
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
			  CURLOPT_POSTFIELDS =>'<v:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:d="http://www.w3.org/2001/XMLSchema" xmlns:c="http://schemas.xmlsoap.org/soap/encoding/" xmlns:v="http://schemas.xmlsoap.org/soap/envelope/"><v:Header /><v:Body><GetBranch xmlns="http://tempuri.org/" id="o0" c:root="1"><StateName i:type="d:string">'.$bank_state.'</StateName><Bankname i:type="d:string">'.$bank_name.'</Bankname><District i:type="d:string">'.$bank_district.'</District></GetBranch></v:Body></v:Envelope>',
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

			curl_close($curl_GetBranch);
			// Create simple XML element
			$xml3 = new SimpleXMLElement($GetBranch);
			$xml3->registerXPathNamespace('test', 'http://tempuri.org/');

			// Get value of first "GetListResponse" element
			$result3 = (string)$xml3->xpath('//test:GetBranchResult')[0];
			// echo $result3;
			// Parse JSON
			$arrr=array();
			$values3 = json_decode($result3, true);
			foreach ($values3['sumit'] as $key3) {
				$haystack = $key3['bank_branch'];
				$needle   = '&';
				if (strpos($haystack, $needle) !== false) {
			  		$bank_branch = str_replace('&', '&amp;', $key3['bank_branch']);
				} else {
			  		$bank_branch = $key3['bank_branch'];
				}
				// echo $bank_branch;
			  	$adiii['bank_branch']=$bank_branch;
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
				  CURLOPT_POSTFIELDS =>'<v:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:d="http://www.w3.org/2001/XMLSchema" xmlns:c="http://schemas.xmlsoap.org/soap/encoding/" xmlns:v="http://schemas.xmlsoap.org/soap/envelope/"><v:Header /><v:Body><GetIFCScode xmlns="http://tempuri.org/" id="o0" c:root="1"><statename i:type="d:string">'.$bank_state.'</statename><bankname i:type="d:string">'.$bank_name.'</bankname><districtname i:type="d:string">'.$bank_district.'</districtname><branchname i:type="d:string">'.$bank_branch.'</branchname></GetIFCScode></v:Body></v:Envelope>',
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
				// echo $GetIFCScode;
				curl_close($curl_GetIFCScode);
				// Create simple XML element
				$xml4 = new SimpleXMLElement($GetIFCScode);
				$xml4->registerXPathNamespace('test', 'http://tempuri.org/');

				// Get value of first "GetListResponse" element
				$result4 = (string)$xml4->xpath('//test:GetIFCScodeResult')[0];
				// echo $result4;die();
				// Parse JSON
				$arra=array();
				$values4 = json_decode($result4, true);
				if(isset($values4['sumit'])) {
					foreach ($values4['sumit'] as $key4) {
					  $bank_address = $key4['bank_address'];
					  $bank_ifsc = $key4['bank_ifsc'];
					  $ade['bank_address']=$bank_address;
					  $ade['bank_ifsc']=$bank_ifsc;
					  $arra[]=$ade;
					}
				}
				else{
					$ade['bank_address']="Not Found";
					$ade['bank_ifsc']="Not Found";
					$arra[]=$ade;
				}
				$adiii['branch_details']=$arra;
			  	$arrr[]=$adiii;
			}
			$adii['district_details']=$arrr;
			$arr[]=$adii;
		}
		$adi['state_details']=$arr;
		$ar[]=$adi;
	}
	$ad['bank_details']=$ar;
	$resp[]=$ad;
echo json_encode(array("status"=>200,"data"=>$resp));die();
}
?>