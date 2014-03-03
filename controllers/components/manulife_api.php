<?php

class ManulifeApiComponent extends Object {

  var $components = array('Auth'); // need to get username for agent code

// build XML file and send to WS, 
  function quote($data = null){
	// build xml file
    $xml = simplexml_load_string('<XML></XML>');
	$request = $xml->addChild('REQUEST');
	$request->addChild('SERVICEKEY', 'QgBEAC0ARgAxAC0AMQA5AC0ANwBDAC0ARgAyAC0AQQAwAC0AQQAyAC0ARQA2AC0AQQA4AC0AMgBEAC0AMQAwAC0ARQA1AC0AQQBFAC0AQgA0AC0AMAA2AC0ARgBGAA==');
	$request->addChild('LANGUAGE', strtoupper($_SESSION['lang']));
	//$request->addChild('SEARCHTYPE', '');
	$request->addChild('DATEDEP', $data['ManulifePlan']['departure_date']['year'] . $data['ManulifePlan']['departure_date']['month'] . $data['ManulifePlan']['departure_date']['day']);
	$request->addChild('DATERET', $data['ManulifePlan']['return_date']['year'] . $data['ManulifePlan']['return_date']['month'] . $data['ManulifePlan']['return_date']['day']);
	$request->addChild('PROVINCE', $this->translate_province($data['ManulifePlan']['province']));
	// passengers
	$num_pax = count($data['ManulifeCompanion']);
	$request->addChild('NBPAX', count($data['ManulifeCompanion']));
	$request->addChild('PAXES');
	foreach($data['ManulifeCompanion'] as $companion){
	  $comp_pax = $request->PAXES->addChild('PAX');
	  $comp_pax->addChild('BIRTHDATE', $companion['date_of_birth']['year'] . $companion['date_of_birth']['month'] . $companion['date_of_birth']['day']);
	  $comp_pax->addChild('TRIPCOST', $companion['trip_cost']);
	}
	// up to here is the 'quote' xml file. below is what is added for 'book'
	$ch = curl_init();
	$options = array(
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_URL => "www.igoinsured.com/test/pottruffws/raws.asmx/Quote2",
	  CURLOPT_POST => true,
	  CURLOPT_POSTFIELDS => 'QuoteXml=' . $xml->asXML() 
	);
	curl_setopt_array($ch, $options);
    $response = curl_exec($ch);
	// need to massage the returned XML file
	$response = $this->massage_xml($response);
	return $this->extract_quote($response, 'GCS');
	//$out = fopen('C:\wamp\www\app\webroot\response.xml', 'w');
	//fwrite( $out, $response );
	//pr($xml->asXML());
  }
  
  function extract_quote($response, $plan_code){
  // extract data from quote response, structure for Cake and return for insertion to $this->data
	  //$response1 = file_get_contents('C:\wamp\www\app\webroot\test_response.xml');
    $xml = simplexml_load_string($response);
	$plan = $xml->xpath("//Product[CODE/text()='$plan_code']");
	
	// main plan data
	$plan_data = array();
	$plan_data['product_code'] = (string)$plan[0]->CODE;
	$plan_data['product_name'] = (string) $plan[0]->NAME;
	$plan_data['product_description_url'] = (string) $plan[0]->DESCURL;
	$plan_data['policy_price'] = (string) $plan[0]->PRICE;
	$plan_data['policy_tax'] = (string) $plan[0]->TAX;
	$plan_data['policy_total'] = (string) $plan[0]->TOTAL;
	//pr($plan_data);
	
	// companion data
	$companions = $xml->xpath("//Product[CODE/text()='$plan_code']//PAX");
	$companion_data = array();
	for($i = 0; $i < count($companions); $i++){
	  $companion_data[$i] = array();
	  $companion_data[$i]['policy_price'] = (string) $companions[$i]->PRICE;
	  $companion_data[$i]['policy_tax'] = (string) $companions[$i]->TAX;
	}
	return array('plan' => $plan_data, 'companions' => $companion_data);
  }

  // build XML file and send to WS, 
  function book($data = null){
	// build xml file
    $xml = simplexml_load_string('<XML></XML>');
	$request = $xml->addChild('REQUEST');
	$request->addChild('SERVICEKEY', 'QgBEAC0ARgAxAC0AMQA5AC0ANwBDAC0ARgAyAC0AQQAwAC0AQQAyAC0ARQA2AC0AQQA4AC0AMgBEAC0AMQAwAC0ARQA1AC0AQQBFAC0AQgA0AC0AMAA2AC0ARgBGAA==');
	if ($this->Auth->user('username') != '')
		$request->addChild('AGENTCODE', $this->Auth->user('username'));
	$request->addChild('LANGUAGE', strtoupper($_SESSION['lang']));
	//$request->addChild('SEARCHTYPE', '');
	$request->addChild('DATEDEP', $data['ManulifePlan']['departure_date']['year'] . $data['ManulifePlan']['departure_date']['month'] . $data['ManulifePlan']['departure_date']['day']);
	$request->addChild('DATERET', $data['ManulifePlan']['return_date']['year'] . $data['ManulifePlan']['return_date']['month'] . $data['ManulifePlan']['return_date']['day']);
	$request->addChild('GATEWAY', $data['ManulifePlan']['departure_airport']);
	$request->addChild('DESTINATION', $data['ManulifePlan']['destination_airport']);
	$request->addChild('POLICYCODE', $data['ManulifePlan']['product_code']);
	//$request->addChild('PHONE', $data['ManulifePlan']['']);
	$request->addChild('EMAIL', $data['ManulifePlan']['email']);
	$request->addChild('ADDRESS', $data['ManulifePlan']['address']);
	$request->addChild('CITY', $data['ManulifePlan']['city']);
	$request->addChild('PROVINCE', $this->translate_province($data['ManulifePlan']['province']));
	$request->addChild('POSTALCODE', $data['ManulifePlan']['postal_code']);
	$request->addChild('COUNTRY', $data['ManulifePlan']['country']);
	// passengers
	$num_pax = count($data['ManulifeCompanion']);
	$request->addChild('NBPAX', count($data['ManulifeCompanion']));
	$request->addChild('TRAVELLERS'); // one or two Ls?
	foreach($data['ManulifeCompanion'] as $companion){
	  $comp_pax = $request->TRAVELLERS->addChild('TRAVELLER');
	  $comp_pax->addChild('FIRSTNAME', $companion['first_name']);
	  $comp_pax->addChild('LASTNAME', $companion['last_name']);
	  $comp_pax->addChild('BIRTHDATE', $companion['date_of_birth']['year'] . $companion['date_of_birth']['month'] . $companion['date_of_birth']['day']);
	  $comp_pax->addChild('TRIPCOST', $companion['trip_cost']);
	}
	// payment
	$payment = $request->addChild('PAYMENTS')->addChild('PAYMENT');
	$payment->addChild('CCAMOUNT', $data['ManulifePlan']['policy_total']);
	$payment->addChild('CCTYPE', $data['ManulifePlan']['type_of_credit_card']);
	$payment->addChild('CCNUMBER', $data['ManulifePlan']['credit_card_number']);
	$payment->addChild('CCEXPMONTH', $data['ManulifePlan']['expiry_date']['month']);
	$payment->addChild('CCEXPYEAR', $data['ManulifePlan']['expiry_date']['year']);
	$payment->addChild('CCNAME', $data['ManulifePlan']['cardholders_name']);
	
	echo $xml->asXML();
	return;
	$ch = curl_init();
	$options = array(
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_URL => "www.igoinsured.com/test/pottruffws/raws.asmx/Quote2",
	  CURLOPT_POST => true,
	  CURLOPT_POSTFIELDS => 'QuoteXml=' . $xml->asXML() 
	);
	curl_setopt_array($ch, $options);
    $response = curl_exec($ch);
	// all angled bracket are escaped in response, very strange
	$response = str_replace('&lt;', '<', str_replace('&gt;', '>', $response));
	// trim xml declaration and some other crap
	$response = str_replace('<?xml version="1.0" encoding="utf-8"?>', '', $response);
	$response = str_replace('<string xmlns="http://tempuri.org/">', '', $response);
	$response = str_replace('</string>', '', $response);
	return $this->extract_quote($response, 'GCS');
	//$out = fopen('C:\wamp\www\app\webroot\response.xml', 'w');
	//fwrite( $out, $response );
	//pr($xml->asXML());
  }
  
  function extract_book($response, $plan_code){
  // extract data from quote response, structure for Cake and return for insertion to $this->data
	  //$response1 = file_get_contents('C:\wamp\www\app\webroot\test_response.xml');
    $xml = simplexml_load_string($response);
	$plan = $xml->xpath("//Product[CODE/text()='$plan_code']");
	
	// main plan data
	$plan_data = array();
	$plan_data['product_code'] = (string)$plan[0]->CODE;
	$plan_data['product_name'] = (string) $plan[0]->NAME;
	$plan_data['product_description_url'] = (string) $plan[0]->DESCURL;
	$plan_data['policy_price'] = (string) $plan[0]->PRICE;
	$plan_data['policy_tax'] = (string) $plan[0]->TAX;
	$plan_data['policy_total'] = (string) $plan[0]->TOTAL;
	//pr($plan_data);
	
	// companion data
	$companions = $xml->xpath("//Product[CODE/text()='$plan_code']//PAX");
	$companion_data = array();
	for($i = 0; $i < count($companions); $i++){
	  $companion_data[$i] = array();
	  $companion_data[$i]['policy_price'] = (string) $companions[$i]->PRICE;
	  $companion_data[$i]['policy_tax'] = (string) $companions[$i]->TAX;
	}
	return array('plan' => $plan_data, 'companions' => $companion_data);
  }

  // some string manipulation of the return xml file, not sure why this is necessary
  function massage_xml($response) {
	// all angled bracket are escaped in response, very strange
    $response = str_replace('&lt;', '<', str_replace('&gt;', '>', $response));
	// trim xml declaration and some other crap
	$response = str_replace('<?xml version="1.0" encoding="utf-8"?>', '', $response);
	$response = str_replace('<string xmlns="http://tempuri.org/">', '', $response);
	$response = str_replace('</string>', '', $response);
	return $response;
  }
  
  // translate province name to two letter code for Manulife web service
  function translate_province($prov = null){
	
    $translate = array(
		'Alberta' => 'AB', 
		'British Columbia' => 'BC', 
		'Prince Edward Island' => 'PE', 
		'Manitoba' => 'MB', 
		'New Brunswick' => 'NB', 
		'Nova Scotia' => 'NS',
		'Nunavut' => 'NU', 
	  'Ontario' => 'ON',
	  'Quebec' => 'PQ',
		'Saskatchewan' => 'SK', 
		'Newfoundland & Labrador' => 'NL', 
		'Northwest Territories' => 'NT', 
		'Yukon' => 'YT'
	);
	
	if (array_key_exists($prov, $translate)){
	  return $translate[$prov];
	}
	else return null;
	
  }
  
}

?>