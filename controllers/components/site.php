<?php
class SiteComponent extends Object {

 var $site_name = 'generic', $bilingual = false;
 
 function siteName() {
	return $this->site_name;
 }
 function bilingual(){
	return $this->bilingual;
 }
 
 function __construct(){ // initialize component
  // parses hostname to set site_name
  
  $host = $_SERVER['HTTP_HOST'];
  if (preg_match('/^(www\.)?yak/', $host)){
   $this->site_name = 'yak';
  }
  elseif (preg_match('/^(www\.)?malta/', $host)){
   $this->site_name = 'malta';
  }
  elseif (preg_match('/^(www\.)?mexico/', $host)){
   $this->site_name = 'mexico';
  }
  elseif (preg_match('/^(www\.)?generic/', $host)){
   $this->site_name = 'generic';
  }
  elseif (preg_match('/^(www\.)?agent/', $host) || preg_match('/^(www\.)?ingle(-)?agents/', $host)){
   $this->site_name = 'agent';
   $this->bilingual = true;
  }
  elseif (preg_match('/^(www\.)?ingle/', $host)){
   $this->site_name = 'ingle';
  }
  elseif (preg_match('/^(www\.)?diabetes/', $host)  || preg_match('/^(www\.)?cda/', $host)){
   $this->site_name = 'cda';
  }
  elseif (preg_match('/^(www\.)?brokeradvantage/', $host)){
   $this->site_name = 'brokeradvantage';
  }
  elseif (preg_match('/^(www\.)?insurance-canada/', $host)){
   $this->site_name = 'insurancecanada';
  }
  elseif (preg_match('/^(www\.)?sportsure/', $host)){
   $this->site_name = 'sportsure';
  }
  elseif (preg_match('/^(www\.)?amero/', $host)){
   $this->site_name = 'amero';
  }
  elseif (preg_match('/^(www\.)?marchofdimes/', $host)){
   $this->site_name = 'marchofdimes';
  }
  elseif (preg_match('/^(www\.)?travelability/', $host)){
   $this->site_name = 'travelability';
  }
  elseif (preg_match('/^(www\.)?journeyman/', $host)){
   $this->site_name = 'journeyman';
  }
  elseif (preg_match('/^(www\.)?staynomad/', $host)){
   $this->site_name = 'staynomad';
  }
  elseif (preg_match('/^(www\.)?suelee/', $host)){
   $this->site_name = 'suelee';
  }
  elseif (preg_match('/^(www\.)?absolute/', $host)){
   $this->site_name = 'absolute';
  }
  elseif (preg_match('/^(www\.)?cystic/', $host)  || preg_match('/^(www\.)?ccff/', $host)){
   $this->site_name = 'cystic';
   $this->bilingual = true;
  }
  else {
   $this->site_name = 'generic';
   $this->bilingual = false;
  }
  
 }

 function redirect(){
  // redirects to SSL for certain domain names
  $host = $_SERVER['HTTP_HOST'];
  if (isset( $_SERVER['HTTPS']))
	return false;
  if (preg_match('/^(www\.)?diabetes/', $host)  || preg_match('/^(www\.)?cda/', $host))
   return 'https://www.diabetesinsuranceservice.com';
  else if (preg_match('/^(www\.)?ingleagents\.com/', $host))
   return 'https://www.ingleagents.com';
  else if (preg_match('/^(www\.)?ingleagents\.ca/', $host))
   return 'https://www.ingleagents.ca';
  else
   return false;
 }

 function siteTitle(){ 
  
 $site_titles = array(
  'yak' => 'Yak with Ingle',
  'cda' => 'Ingle Insurance - Insurance for the CDA',
  'brokeradvantage' => 'Broker Advantage'
 );

  $site_name = $this->siteName();
  if (array_key_exists($site_name, $site_titles))
   return $site_titles[$site_name];
  else return 'Ingle International';
 }

 function gaCode(){ // returns code for Google Analytics
  
 $site_codes = array(
  'yak' => 'UA-2647477-12',
  'malta' => 'UA-2647477-15',
  'mexico' => 'UA-2647477-16',
  'generic' => 'UA-2647477-17',
  'ingle' => 'UA-2647477-18',
  'cda' => 'UA-2647477-19',
  'insurance_canada' => 'UA-2647477-23',
  'amero' => 'UA-2647477-24',
  'brokeradvantage' => 'UA-2647477-20'
 );

  $site_name = $this->siteName();
  if (array_key_exists($site_name, $site_codes))
   return $site_codes[$site_name];
 }
 
 function hss_code(){ 
  
 $codes = array(
   'yak' => '9032',
   'cda' => '9033',
   'brokeradvantage' => '9035',
   'insurance_canada' => '9013',
   'sportsure' => '9016',
   'amero' => '9017',
   'marchofdimes' => '9018',
   'journeyman' => '9039',
   'staynomad' => '9040',
   'suelee' => '9041',
   'absolute' => '9042',
   'cystic' => '9043'
 );

  $site_name = $this->siteName();
  if (array_key_exists($site_name, $codes))
   return $codes[$site_name];
  else
   return '9002';
 }

 function nav(){ // returns array for navigation
  
 $site_navs = array(

  // this one should be the most complete, delete stuff for specific sites
  'template' => array(
    array('link'=>'travel', 'name'=>'Travel Insurance', 'subNav'=>array(
     array('link'=>'canadianResidents', 'name'=>'Canadian Residents', 'subNav'=>array(
      array('link'=>'travel_allInclusiveApp', 'name'=>'All-Inclusive Travel Plan'),
      array('link'=>'canadianResidentsQE', 'name'=>'Medical Only Plan'),
      array('link'=>'travel_nonMedicalApp', 'name'=>'Non-Medical Plan'))),
     array('link'=>'visitorsToCanada', 'name'=>'Visitors to Canada', 'subNav'=>array(
      array('link'=>'visitorsToCanadaQE', 'name'=>'Visitors to Canada'),
      array('link'=>'travel_visitorsApp', 'name'=>'Visitors to Canada'))),
     array('link'=>'internationalStudents', 'name'=>'International Students', 'subNav'=>array(
      array('link'=>'internationalStudentsQE', 'name'=>'International Students'))),
     array('link'=>'expatriate', 'name'=>'Expatriate', 'subNav'=>array(
      array('link'=>'citizenSecure', 'name'=>'Citizen Secure'))),
     array('link'=>'internationalTravel', 'name'=>'International Travel', 'subNav'=>array(
      array('link'=>'atlas', 'name'=>'Atlas Travel'))),
     array('link'=>'snowbirds', 'name'=>'Snowbirds', 'subNav'=>array(
      array('link'=>'snowbirdsQE', 'name'=>'Snowbirds'))),
     array('link'=>'specialRisk', 'name'=>'Special Risk'),
     array('link'=>'customGroupRequest', 'name'=>'Custom / Group Quote'))),
    array('link'=>'student', 'name'=>'Student Insurance'),
    array('link'=>'health', 'name'=>'Health Insurance', 'subNav'=>array(
     array('link'=>'extendedHealth', 'name'=>'Extended Health', 'subNav'=>array(
      array('link'=>'association', 'name'=>''),
      array('link'=>'prism', 'name'=>''),
      array('link'=>'followMe', 'name'=>''),
      array('link'=>'prism', 'name'=>''),
      array('link'=>'healthRequest', 'name'=>'Request Form'))),
     array('link'=>'employerGroupHealth', 'name'=>'Employee Group'))),
    array('link'=>'life', 'name'=>'Life &amp Living Benefits', 'subNav'=>array(
     array('link'=>'lifeInsurance', 'name'=>'Life Insurance', 'subNav'=>array(
      array('link'=>'lifeRequest', 'name'=>'Request Form'))),
     array('link'=>'livingBenefits', 'name'=>'Living Benefits', 'subNav'=>array(
      array('link'=>'livingRequest', 'name'=>'Request Form'))))),
    array('link'=>'allProducts', 'name'=>'All Products'),
    array('link'=>'info', 'name'=>'Important Information', 'subNav'=>array(
     array('link'=>'travelInfo', 'name'=>'Travel Information'),
     array('link'=>'healthInfo', 'name'=>'Health Information'),
     array('link'=>'whyInsurance', 'name'=>'Why Do I Need Insurance?'),
     array('link'=>'choosingInsurance', 'name'=>'Choosing the Right Travel Insurance'),
     array('link'=>'understandingInsurance', 'name'=>'Understanding Your Travel Insurance Policy'),
     array('link'=>'faq', 'name'=>'Frequently Asked Questions'),
     array('link'=>'claims', 'name'=>'Claims Information'))),
    array('link'=>'about', 'name'=>'About Us'),
    array('link'=>'contact', 'name'=>'Contact Us')
  ),

  'generic' => array(
    array('link'=>'travel', 'name'=>__('Travel Insurance', true), 'subNav'=>array(
     array('link'=>'canadianResidents', 'name'=>__('Canadian Residents', true), 'subNav'=>array(
      array('link'=>'travel_allInclusiveApp', 'name'=>__('All-Inclusive Travel Plan', true)),
      array('link'=>'canadianResidentsQE', 'name'=>__('Medical Only Plan', true)),
      array('link'=>'travel_nonMedicalApp', 'name'=>__('Non-Medical Plan', true)))),
     array('link'=>'visitorsToCanada', 'name'=>__('Visitors to Canada', true), 'subNav'=>array(
      array('link'=>'visitorsToCanadaQE', 'name'=>__('Visitors to Canada', true)),
      array('link'=>'travel_visitorsApp', 'name'=>__('Visitors to Canada', true)))),
     array('link'=>'internationalStudents', 'name'=>__('International Students', true), 'subNav'=>array(
      array('link'=>'internationalStudentsQE', 'name'=>__('International Students', true)))),
     array('link'=>'expatriate', 'name'=>__('Expatriate', true), 'subNav'=>array(
      array('link'=>'citizenSecure', 'name'=>__('Citizen Secure', true)))),
     array('link'=>'internationalTravel', 'name'=>__('International Travel', true), 'subNav'=>array(
      array('link'=>'atlas', 'name'=>__('Atlas Travel', true)))),
     array('link'=>'snowbirds', 'name'=>__('Snowbirds', true), 'subNav'=>array(
      array('link'=>'snowbirdsQE', 'name'=>__('Snowbirds', true)))),
     array('link'=>'specialRisk', 'name'=>__('Special Risk', true)),
     array('link'=>'customGroupRequest', 'name'=>__('Custom / Group Quote', true)))),
    array('link'=>'student', 'name'=>__('Student Insurance', true)),
    array('link'=>'health', 'name'=>__('Health Insurance', true), 'subNav'=>array(
     array('link'=>'extendedHealth', 'name'=>__('Extended Health', true), 'subNav'=>array(
      array('link'=>'association', 'name'=>''),
      array('link'=>'prism', 'name'=>''),
      array('link'=>'followMe', 'name'=>''),
      array('link'=>'prism', 'name'=>''),
      array('link'=>'healthRequest', 'name'=>__('Request Form', true)))),
     array('link'=>'employerGroupHealth', 'name'=>__('Employee Group', true)))),
    array('link'=>'life', 'name'=>__('Life & Living Benefits', true), 'subNav'=>array(
     array('link'=>'lifeInsurance', 'name'=>__('Life Insurance', true), 'subNav'=>array(
      array('link'=>'lifeRequest', 'name'=>__('Request Form', true)))),
     array('link'=>'livingBenefits', 'name'=>__('Living Benefits', true), 'subNav'=>array(
      array('link'=>'livingRequest', 'name'=>__('Request Form', true)))))),
    array('link'=>'homeInsurance', 'name'=>__('Home Insurance', true)),
    array('link'=>'auto', 'name'=>__('Auto Insurance', true)),
    array('link'=>'allProducts', 'name'=>__('All Products', true)),
    array('link'=>'info', 'name'=>__('Important Information', true), 'subNav'=>array(
     array('link'=>'travelInfo', 'name'=>__('Travel Information', true)),
     array('link'=>'healthInfo', 'name'=>__('Health Information', true)),
     array('link'=>'whyInsurance', 'name'=>__('Why Do I Need Insurance?', true)),
     array('link'=>'choosingInsurance', 'name'=>__('Choosing the Right Travel Insurance', true)),
     array('link'=>'understandingInsurance', 'name'=>__('Understanding Your Travel Insurance Policy', true)),
     array('link'=>'faq', 'name'=>__('Frequently Asked Questions', true)),
     array('link'=>'claims', 'name'=>__('Claims Information', true)))),
    array('link'=>'about', 'name'=>__('About Us', true)),
    array('link'=>'contact', 'name'=>__('Contact Us', true))
  ),

  'yak' => array(
    array('link'=>'travel', 'name'=>'Travel Insurance', 'subNav'=>array(
     array('link'=>'canadianResidents', 'name'=>'Canadian Residents', 'subNav'=>array(
      array('link'=>'travel_allInclusiveApp', 'name'=>'All-Inclusive Travel Plan'),
      array('link'=>'canadianResidentsQE', 'name'=>'Medical Only Plan'),
      array('link'=>'travel_nonMedicalApp', 'name'=>'Non-Medical Plan'))),
     array('link'=>'visitorsToCanada', 'name'=>'Visitors to Canada', 'subNav'=>array(
      array('link'=>'visitorsToCanadaQE', 'name'=>'Visitors to Canada'),
      array('link'=>'travel_visitorsApp', 'name'=>'Visitors to Canada'))),
     array('link'=>'internationalStudents', 'name'=>'International Students', 'subNav'=>array(
      array('link'=>'internationalStudentsQE', 'name'=>'International Students'))),
     array('link'=>'expatriate', 'name'=>'Expatriate', 'subNav'=>array(
      array('link'=>'citizenSecure', 'name'=>'Citizen Secure'))),
     array('link'=>'internationalTravel', 'name'=>'International Travel', 'subNav'=>array(
      array('link'=>'atlas', 'name'=>'Atlas Travel'))),
     array('link'=>'snowbirds', 'name'=>'Snowbirds', 'subNav'=>array(
      array('link'=>'snowbirdsQE', 'name'=>'Snowbirds'))),
     array('link'=>'specialRisk', 'name'=>'Special Risk'),
     array('link'=>'customGroupRequest', 'name'=>'Custom / Group Quote'))),
    array('link'=>'student', 'name'=>'Student Insurance'),
    array('link'=>'health', 'name'=>'Health Insurance', 'subNav'=>array(
     array('link'=>'extendedHealth', 'name'=>'Extended Health', 'subNav'=>array(
      array('link'=>'association', 'name'=>''),
      array('link'=>'prism', 'name'=>''),
      array('link'=>'followMe', 'name'=>''),
      array('link'=>'prism', 'name'=>''),
      array('link'=>'healthRequest', 'name'=>'Request Form'))),
     array('link'=>'employerGroupHealth', 'name'=>'Employee Group'))),
    array('link'=>'life', 'name'=>'Life &amp Living Benefits', 'subNav'=>array(
     array('link'=>'lifeInsurance', 'name'=>'Life Insurance', 'subNav'=>array(
      array('link'=>'lifeRequest', 'name'=>'Request Form'))),
     array('link'=>'livingBenefits', 'name'=>'Living Benefits', 'subNav'=>array(
      array('link'=>'livingRequest', 'name'=>'Request Form'))))),
    array('link'=>'homeInsurance', 'name'=>'Home Insurance'),
    array('link'=>'auto', 'name'=>'Auto Insurance'),
    array('link'=>'allProducts', 'name'=>'All Products'),
    array('link'=>'info', 'name'=>'Information Centre', 'subNav'=>array(
     array('link'=>'travelInfo', 'name'=>'Travel Information'),
     array('link'=>'healthInfo', 'name'=>'Health Information'),
     array('link'=>'whyInsurance', 'name'=>'Why Do I Need Insurance?'),
     array('link'=>'choosingInsurance', 'name'=>'Choosing the Right Travel Insurance'),
     array('link'=>'understandingInsurance', 'name'=>'Understanding Your Travel Insurance Policy'),
     array('link'=>'faq', 'name'=>'Frequently Asked Questions'),
     array('link'=>'claims', 'name'=>'Claims Information'))),
    array('link'=>'about', 'name'=>'About Us'),
    array('link'=>'contact', 'name'=>'Contact Us')
  ),

  'cda' => array(
    array('link'=>'travel', 'name'=>'Travel Insurance', 'subNav'=>array(
     array('link'=>'canadianResidents', 'name'=>'Canadian Residents', 'subNav'=>array(
      array('link'=>'travel_allInclusiveApp', 'name'=>'All-Inclusive Travel Plan'),
      array('link'=>'canadianResidentsQE', 'name'=>'Medical Only Plan'),
      array('link'=>'travel_nonMedicalApp', 'name'=>'Non-Medical Plan'))),
     array('link'=>'visitorsToCanada', 'name'=>'Visitors to Canada', 'subNav'=>array(
      array('link'=>'visitorsToCanadaQE', 'name'=>'Visitors to Canada'),
      array('link'=>'travel_visitorsApp', 'name'=>'Visitors to Canada'))),
     array('link'=>'internationalStudents', 'name'=>'International Students', 'subNav'=>array(
      array('link'=>'internationalStudentsQE', 'name'=>'International Students'))),
     array('link'=>'expatriate', 'name'=>'Expatriate', 'subNav'=>array(
      array('link'=>'citizenSecure', 'name'=>'Citizen Secure'))),
     array('link'=>'internationalTravel', 'name'=>'International Travel', 'subNav'=>array(
      array('link'=>'atlas', 'name'=>'Atlas Travel'))),
     array('link'=>'snowbirds', 'name'=>'Snowbirds', 'subNav'=>array(
      array('link'=>'snowbirdsQE', 'name'=>'Snowbirds'))),
     array('link'=>'specialRisk', 'name'=>'Special Risk'),
     array('link'=>'customGroupRequest', 'name'=>'Custom / Group Quote'))),
    array('link'=>'student', 'name'=>'Student Insurance'),
    array('link'=>'health', 'name'=>'Health Insurance', 'subNav'=>array(
     array('link'=>'extendedHealth', 'name'=>'Extended Health', 'subNav'=>array(
      array('link'=>'association', 'name'=>''),
      array('link'=>'prism', 'name'=>''),
      array('link'=>'followMe', 'name'=>''),
      array('link'=>'prism', 'name'=>''),
      array('link'=>'healthRequest', 'name'=>'Request Form'))),
     array('link'=>'employerGroupHealth', 'name'=>'Employee Group'))),
    array('link'=>'life', 'name'=>'Life &amp Living Benefits', 'subNav'=>array(
     array('link'=>'lifeInsurance', 'name'=>'Life Insurance', 'subNav'=>array(
      array('link'=>'lifeRequest', 'name'=>'Request Form'))),
     array('link'=>'livingBenefits', 'name'=>'Living Benefits', 'subNav'=>array(
      array('link'=>'livingRequest', 'name'=>'Request Form'))))),
    array('link'=>'allProducts', 'name'=>'All Products'),
    array('link'=>'info', 'name'=>'Important Information', 'subNav'=>array(
     array('link'=>'diabetesResources', 'name'=>'Diabetes Resource Centre'),
     array('link'=>'travelInfo', 'name'=>'Travel Information'),
     array('link'=>'healthInfo', 'name'=>'Health Information'),
     array('link'=>'whyInsurance', 'name'=>'Why Do I Need Insurance?'),
     array('link'=>'choosingInsurance', 'name'=>'Choosing the Right Travel Insurance'),
     array('link'=>'understandingInsurance', 'name'=>'Understanding Your Travel Insurance Policy'),
     array('link'=>'faq', 'name'=>'Frequently Asked Questions'),
     array('link'=>'claims', 'name'=>'Claims Information'))),
    array('link'=>'about', 'name'=>'About Us'),
    array('link'=>'contact', 'name'=>'Contact Us')
  ),

  'insurance_canada' => array(
    array('link'=>'travel', 'name'=>'Travel Insurance', 'subNav'=>array(
     array('link'=>'canadianResidents', 'name'=>'Canadian Residents', 'subNav'=>array(
      array('link'=>'travel_allInclusiveApp', 'name'=>'All-Inclusive Travel Plan'),
      array('link'=>'canadianResidentsQE', 'name'=>'Medical Only Plan'),
      array('link'=>'travel_nonMedicalApp', 'name'=>'Non-Medical Plan'))),
     array('link'=>'visitorsToCanada', 'name'=>'Visitors to Canada', 'subNav'=>array(
      array('link'=>'visitorsToCanadaQE', 'name'=>'Visitors to Canada'),
      array('link'=>'travel_visitorsApp', 'name'=>'Visitors to Canada'))),
     array('link'=>'internationalStudents', 'name'=>'International Students', 'subNav'=>array(
      array('link'=>'internationalStudentsQE', 'name'=>'International Students'))),
     array('link'=>'expatriate', 'name'=>'Expatriate', 'subNav'=>array(
      array('link'=>'citizenSecure', 'name'=>'Citizen Secure'))),
     array('link'=>'internationalTravel', 'name'=>'International Travel', 'subNav'=>array(
      array('link'=>'atlas', 'name'=>'Atlas Travel'))),
     array('link'=>'snowbirds', 'name'=>'Snowbirds', 'subNav'=>array(
      array('link'=>'snowbirdsQE', 'name'=>'Snowbirds'))),
     array('link'=>'specialRisk', 'name'=>'Special Risk'),
     array('link'=>'productSelector', 'name'=>'Product Selector'),
     array('link'=>'customGroupRequest', 'name'=>'Custom / Group Quote'))),
    array('link'=>'student', 'name'=>'Student Insurance'),
    array('link'=>'health', 'name'=>'Health Insurance', 'subNav'=>array(
     array('link'=>'extendedHealth', 'name'=>'Extended Health', 'subNav'=>array(
      array('link'=>'association', 'name'=>''),
      array('link'=>'prism', 'name'=>''),
      array('link'=>'followMe', 'name'=>''),
      array('link'=>'prism', 'name'=>''),
      array('link'=>'healthRequest', 'name'=>'Request Form'))),
     array('link'=>'employerGroupHealth', 'name'=>'Employee Group'))),
    array('link'=>'life', 'name'=>'Life &amp Living Benefits', 'subNav'=>array(
     array('link'=>'lifeInsurance', 'name'=>'Life Insurance', 'subNav'=>array(
      array('link'=>'lifeRequest', 'name'=>'Request Form'))),
     array('link'=>'livingBenefits', 'name'=>'Living Benefits', 'subNav'=>array(
      array('link'=>'livingRequest', 'name'=>'Request Form'))))),
    array('link'=>'getQuote', 'name'=>'Get a Quote'),
    array('link'=>'allProducts', 'name'=>'All Products'),
    array('link'=>'info', 'name'=>'Important Information', 'subNav'=>array(
     array('link'=>'travelInfo', 'name'=>'Travel Information'),
     array('link'=>'healthInfo', 'name'=>'Health Information'),
     array('link'=>'whyInsurance', 'name'=>'Why Do I Need Insurance?'),
     array('link'=>'choosingInsurance', 'name'=>'Choosing the Right Travel Insurance'),
     array('link'=>'understandingInsurance', 'name'=>'Understanding Your Travel Insurance Policy'),
     array('link'=>'faq', 'name'=>'Frequently Asked Questions'),
     array('link'=>'claims', 'name'=>'Claims Information'))),
    array('link'=>'about', 'name'=>'About Us'),
    array('link'=>'contact', 'name'=>'Contact Us')
  ),

  'brokeradvantage' => array(
    array('link'=>'travel', 'name'=>'Travel Insurance', 'subNav'=>array(
     array('link'=>'canadianResidents', 'name'=>'Canadian Residents', 'subNav'=>array(
      array('link'=>'travel_allInclusiveApp', 'name'=>'All-Inclusive Travel Plan'),
      array('link'=>'canadianResidentsQE', 'name'=>'Medical Only Plan'),
      array('link'=>'travel_nonMedicalApp', 'name'=>'Non-Medical Plan'))),
     array('link'=>'visitorsToCanada', 'name'=>'Visitors to Canada', 'subNav'=>array(
      array('link'=>'visitorsToCanadaQE', 'name'=>'Visitors to Canada'),
      array('link'=>'travel_visitorsApp', 'name'=>'Visitors to Canada'))),
     array('link'=>'internationalStudents', 'name'=>'International Students', 'subNav'=>array(
      array('link'=>'internationalStudentsQE', 'name'=>'International Students'))),
     array('link'=>'expatriate', 'name'=>'Expatriate', 'subNav'=>array(
      array('link'=>'citizenSecure', 'name'=>'Citizen Secure'))),
     array('link'=>'internationalTravel', 'name'=>'International Travel', 'subNav'=>array(
      array('link'=>'atlas', 'name'=>'Atlas Travel'))),
     array('link'=>'snowbirds', 'name'=>'Snowbirds', 'subNav'=>array(
      array('link'=>'snowbirdsQE', 'name'=>'Snowbirds'))),
     array('link'=>'specialRisk', 'name'=>'Special Risk'),
     array('link'=>'customGroupRequest', 'name'=>'Custom / Group Quote'))),
    array('link'=>'student', 'name'=>'Student Insurance'),
    array('link'=>'health', 'name'=>'Health Insurance', 'subNav'=>array(
     array('link'=>'extendedHealth', 'name'=>'Extended Health', 'subNav'=>array(
      array('link'=>'association', 'name'=>''),
      array('link'=>'prism', 'name'=>''),
      array('link'=>'followMe', 'name'=>''),
      array('link'=>'prism', 'name'=>''),
      array('link'=>'healthRequest', 'name'=>'Request Form'))),
     array('link'=>'employerGroupHealth', 'name'=>'Employee Group'))),
    array('link'=>'life', 'name'=>'Life &amp Living Benefits', 'subNav'=>array(
     array('link'=>'lifeInsurance', 'name'=>'Life Insurance', 'subNav'=>array(
      array('link'=>'lifeRequest', 'name'=>'Request Form'))),
     array('link'=>'livingBenefits', 'name'=>'Living Benefits', 'subNav'=>array(
      array('link'=>'livingRequest', 'name'=>'Request Form'))))),
    array('link'=>'allProducts', 'name'=>'All Products'),
    array('link'=>'info', 'name'=>'Important Information', 'subNav'=>array(
     array('link'=>'travelInfo', 'name'=>'Travel Information'),
     array('link'=>'healthInfo', 'name'=>'Health Information'),
     array('link'=>'whyInsurance', 'name'=>'Why Do I Need Insurance?'),
     array('link'=>'choosingInsurance', 'name'=>'Choosing the Right Travel Insurance'),
     array('link'=>'understandingInsurance', 'name'=>'Understanding Your Travel Insurance Policy'),
     array('link'=>'faq', 'name'=>'Frequently Asked Questions'),
     array('link'=>'claims', 'name'=>'Claims Information'))),
    array('link'=>'about', 'name'=>'About Us'),
    array('link'=>'contact', 'name'=>'Contact Us')
  ),

  'agent' => array(
    array('link'=>'travel', 'name'=>__('Travel Insurance', true), 'subNav'=>array(
     array('link'=>'canadianResidents', 'name'=>__('Canadian Residents', true), 'subNav'=>array(
      array('link'=>'travel_allInclusiveApp', 'name'=>__('All-Inclusive Travel Plan', true)),
      array('link'=>'canadianResidentsQE', 'name'=>__('Medical Only Plan', true)),
      array('link'=>'travel_nonMedicalApp', 'name'=>__('Non-Medical Plan', true)))),
     array('link'=>'visitorsToCanada', 'name'=>__('Visitors to Canada', true), 'subNav'=>array(
      array('link'=>'visitorsToCanadaQE', 'name'=>__('Visitors to Canada', true)),
      array('link'=>'travel_visitorsApp', 'name'=>__('Visitors to Canada', true)))),
     array('link'=>'internationalStudents', 'name'=>__('International Students', true), 'subNav'=>array(
      array('link'=>'internationalStudentsQE', 'name'=>__('International Students', true)))),
     array('link'=>'expatriate', 'name'=>__('Expatriate', true), 'subNav'=>array(
      array('link'=>'citizenSecure', 'name'=>__('Citizen Secure', true)))),
     array('link'=>'internationalTravel', 'name'=>__('International Travel', true), 'subNav'=>array(
      array('link'=>'atlas', 'name'=>__('Atlas Travel', true)))),
     array('link'=>'snowbirds', 'name'=>__('Snowbirds', true), 'subNav'=>array(
      array('link'=>'snowbirdsQE', 'name'=>__('Snowbirds', true)))))),
    array('link'=>'student', 'name'=>__('Student Insurance', true)),
    array('link'=>'health', 'name'=>__('Health Insurance', true), 'subNav'=>array(
     array('link'=>'extendedHealth', 'name'=>__('Extended Health', true), 'subNav'=>array(
      array('link'=>'association', 'name'=>''),
      array('link'=>'prism', 'name'=>''),
      array('link'=>'followMe', 'name'=>''),
      array('link'=>'prism', 'name'=>''),
      array('link'=>'healthRequest', 'name'=>__('Request Form', true)))),
     array('link'=>'employerGroupHealth', 'name'=>__('Employee Group', true)))),
    array('link'=>'life', 'name'=>__('Life & Living Benefits', true), 'subNav'=>array(
     array('link'=>'lifeInsurance', 'name'=>__('Life Insurance', true), 'subNav'=>array(
      array('link'=>'lifeRequest', 'name'=>__('Request Form', true)))),
     array('link'=>'livingBenefits', 'name'=>__('Living Benefits', true), 'subNav'=>array(
      array('link'=>'livingRequest', 'name'=>__('Request Form', true)))))),
    array('link'=>'specialRisk', 'name'=>__('Special Risk', true)),
    array('link'=>'customGroupRequest', 'name'=>__('Custom / Group Quote', true)),
    array('link'=>'allProducts', 'name'=>__('All Products', true))
  ),

  'amero' => array(
    array('link'=>'travel', 'name'=>'Travel Insurance', 'subNav'=>array(
     array('link'=>'canadianResidents', 'name'=>'Canadian Residents', 'subNav'=>array(
      array('link'=>'travel_allInclusiveApp', 'name'=>'All-Inclusive Travel Plan'),
      array('link'=>'canadianResidentsQE', 'name'=>'Medical Only Plan'),
      array('link'=>'travel_nonMedicalApp', 'name'=>'Non-Medical Plan'))),
     array('link'=>'visitorsToCanada', 'name'=>'Visitors to Canada', 'subNav'=>array(
      array('link'=>'visitorsToCanadaQE', 'name'=>'Visitors to Canada'),
      array('link'=>'travel_visitorsApp', 'name'=>'Visitors to Canada'))),
     array('link'=>'internationalStudents', 'name'=>'International Students', 'subNav'=>array(
      array('link'=>'internationalStudentsQE', 'name'=>'International Students'))),
     array('link'=>'expatriate', 'name'=>'Expatriate', 'subNav'=>array(
      array('link'=>'citizenSecure', 'name'=>'Citizen Secure'))),
     array('link'=>'internationalTravel', 'name'=>'International Travel', 'subNav'=>array(
      array('link'=>'atlas', 'name'=>'Atlas Travel'))),
     array('link'=>'snowbirds', 'name'=>'Snowbirds', 'subNav'=>array(
      array('link'=>'snowbirdsQE', 'name'=>'Snowbirds'))),
     array('link'=>'specialRisk', 'name'=>'Special Risk'),
     array('link'=>'customGroupRequest', 'name'=>'Custom / Group Quote'))),
    array('link'=>'info', 'name'=>'Information Centre', 'subNav'=>array(
     array('link'=>'travelInfo', 'name'=>'Travel Information'),
     array('link'=>'healthInfo', 'name'=>'Health Information'),
     array('link'=>'whyInsurance', 'name'=>'Why Do I Need Insurance?'),
     array('link'=>'choosingInsurance', 'name'=>'Choosing the Right Travel Insurance'),
     array('link'=>'understandingInsurance', 'name'=>'Understanding Your Travel Insurance Policy'),
     array('link'=>'faq', 'name'=>'Frequently Asked Questions'),
     array('link'=>'claims', 'name'=>'Claims Information'))),
    array('link'=>'about', 'name'=>'About Us'),
    array('link'=>'contact', 'name'=>'Contact Us')
  ),

  'travelability' => array(
    array('link'=>'travel', 'name'=>'Travel Insurance', 'subNav'=>array(
     array('link'=>'canadianResidents', 'name'=>'Canadian Residents', 'subNav'=>array(
      array('link'=>'travel_allInclusiveApp', 'name'=>'All-Inclusive Travel Plan'),
      array('link'=>'canadianResidentsQE', 'name'=>'Medical Only Plan'),
      array('link'=>'travel_nonMedicalApp', 'name'=>'Non-Medical Plan'))),
     array('link'=>'visitorsToCanada', 'name'=>'Visitors to Canada', 'subNav'=>array(
      array('link'=>'visitorsToCanadaQE', 'name'=>'Visitors to Canada'),
      array('link'=>'travel_visitorsApp', 'name'=>'Visitors to Canada'))),
     array('link'=>'internationalStudents', 'name'=>'International Students', 'subNav'=>array(
      array('link'=>'internationalStudentsQE', 'name'=>'International Students'))),
     array('link'=>'expatriate', 'name'=>'Expatriate', 'subNav'=>array(
      array('link'=>'citizenSecure', 'name'=>'Citizen Secure'))),
     array('link'=>'internationalTravel', 'name'=>'International Travel', 'subNav'=>array(
      array('link'=>'atlas', 'name'=>'Atlas Travel'))),
     array('link'=>'snowbirds', 'name'=>'Snowbirds', 'subNav'=>array(
      array('link'=>'snowbirdsQE', 'name'=>'Snowbirds'))),
     array('link'=>'specialRisk', 'name'=>'Special Risk'),
     array('link'=>'customGroupRequest', 'name'=>'Custom / Group Quote'))),
    array('link'=>'info', 'name'=>'Information Centre', 'subNav'=>array(
     array('link'=>'travelInfo', 'name'=>'Travel Information'),
     array('link'=>'healthInfo', 'name'=>'Health Information'),
     array('link'=>'whyInsurance', 'name'=>'Why Do I Need Insurance?'),
     array('link'=>'choosingInsurance', 'name'=>'Choosing the Right Travel Insurance'),
     array('link'=>'understandingInsurance', 'name'=>'Understanding Your Travel Insurance Policy'),
     array('link'=>'faq', 'name'=>'Frequently Asked Questions'),
     array('link'=>'claims', 'name'=>'Claims Information'))),
    array('link'=>'travelResources', 'name'=>'Travel Resources'),
    array('link'=>'testimonials', 'name'=>'Testimonials'),
    array('link'=>'about', 'name'=>'About Us'),
    array('link'=>'contact', 'name'=>'Contact Us')
  ),

  'sportsure' => array(
    array('link'=>'sportInjuryPlan', 'name'=>'Sport Injury Plan', 'subNav'=>array(
     array('link'=>'sportInjuryPlanPurchase', 'name'=>'Purchase'),
     array('link'=>'physicianList', 'name'=>'Hospital & Physician Network'),
     array('link'=>'claims', 'name'=>'Claims'))),
    array('link'=>'travel', 'name'=>'Other Products', 'subNav'=>array(
     array('link'=>'canadianResidents', 'name'=>'Canadian Residents', 'subNav'=>array(
      array('link'=>'travel_allInclusiveApp', 'name'=>'All-Inclusive Travel Plan'),
      array('link'=>'canadianResidentsQE', 'name'=>'Medical Only Plan'),
      array('link'=>'travel_nonMedicalApp', 'name'=>'Non-Medical Plan'))),
     array('link'=>'visitorsToCanada', 'name'=>'Visitors to Canada', 'subNav'=>array(
      array('link'=>'visitorsToCanadaQE', 'name'=>'Visitors to Canada'),
      array('link'=>'travel_visitorsApp', 'name'=>'Visitors to Canada'))),
     array('link'=>'internationalStudents', 'name'=>'International Students', 'subNav'=>array(
      array('link'=>'internationalStudentsQE', 'name'=>'International Students'))),
     array('link'=>'expatriate', 'name'=>'Expatriate', 'subNav'=>array(
      array('link'=>'citizenSecure', 'name'=>'Citizen Secure'))),
     array('link'=>'internationalTravel', 'name'=>'International Travel', 'subNav'=>array(
      array('link'=>'atlas', 'name'=>'Atlas Travel'))),
     array('link'=>'snowbirds', 'name'=>'Snowbirds', 'subNav'=>array(
      array('link'=>'snowbirdsQE', 'name'=>'Snowbirds'))),
     array('link'=>'specialRisk', 'name'=>'Special Risk'),
     array('link'=>'customGroupRequest', 'name'=>'Custom / Group Quote'))),
    array('link'=>'contact', 'name'=>'Contact Us')
  ),

  'suelee' => array(
    array('link'=>'travel', 'name'=>'Travel Insurance', 'subNav'=>array(
     array('link'=>'canadianResidents', 'name'=>'Canadian Residents', 'subNav'=>array(
      array('link'=>'travel_allInclusiveApp', 'name'=>'All-Inclusive Travel Plan'),
      array('link'=>'canadianResidentsQE', 'name'=>'Medical Only Plan'),
      array('link'=>'travel_nonMedicalApp', 'name'=>'Non-Medical Plan'))),
     array('link'=>'visitorsToCanada', 'name'=>'Visitors to Canada', 'subNav'=>array(
      array('link'=>'visitorsToCanadaQE', 'name'=>'Visitors to Canada'),
      array('link'=>'travel_visitorsApp', 'name'=>'Visitors to Canada'))),
     array('link'=>'internationalStudents', 'name'=>'International Students', 'subNav'=>array(
      array('link'=>'internationalStudentsQE', 'name'=>'International Students'))),
     array('link'=>'expatriate', 'name'=>'Expatriate', 'subNav'=>array(
      array('link'=>'citizenSecure', 'name'=>'Citizen Secure'))),
     array('link'=>'internationalTravel', 'name'=>'International Travel', 'subNav'=>array(
      array('link'=>'atlas', 'name'=>'Atlas Travel'))),
     array('link'=>'snowbirds', 'name'=>'Snowbirds', 'subNav'=>array(
      array('link'=>'snowbirdsQE', 'name'=>'Snowbirds'))),
     array('link'=>'specialRisk', 'name'=>'Special Risk'),
     array('link'=>'customGroupRequest', 'name'=>'Custom / Group Quote'))),
    array('link'=>'info', 'name'=>'Information Centre', 'subNav'=>array(
     array('link'=>'travelInfo', 'name'=>'Travel Information'),
     array('link'=>'healthInfo', 'name'=>'Health Information'),
     array('link'=>'whyInsurance', 'name'=>'Why Do I Need Insurance?'),
     array('link'=>'choosingInsurance', 'name'=>'Choosing the Right Travel Insurance'),
     array('link'=>'understandingInsurance', 'name'=>'Understanding Your Travel Insurance Policy'),
     array('link'=>'faq', 'name'=>'Frequently Asked Questions'),
     array('link'=>'claims', 'name'=>'Claims Information'))),
    array('link'=>'about', 'name'=>'About Us'),
    array('link'=>'contact', 'name'=>'Contact Us')
  ),

  'absolute' => array(
    array('link'=>'travel', 'name'=>'Travel Insurance', 'subNav'=>array(
     array('link'=>'canadianResidents', 'name'=>'Canadian Residents', 'subNav'=>array(
      array('link'=>'travel_allInclusiveApp', 'name'=>'All-Inclusive Travel Plan'),
      array('link'=>'canadianResidentsQE', 'name'=>'Medical Only Plan'),
      array('link'=>'travel_nonMedicalApp', 'name'=>'Non-Medical Plan'))),
     array('link'=>'visitorsToCanada', 'name'=>'Visitors to Canada', 'subNav'=>array(
      array('link'=>'visitorsToCanadaQE', 'name'=>'Visitors to Canada'),
      array('link'=>'travel_visitorsApp', 'name'=>'Visitors to Canada'))),
     array('link'=>'internationalStudents', 'name'=>'International Students', 'subNav'=>array(
      array('link'=>'internationalStudentsQE', 'name'=>'International Students'))),
     array('link'=>'expatriate', 'name'=>'Expatriate', 'subNav'=>array(
      array('link'=>'citizenSecure', 'name'=>'Citizen Secure'))),
     array('link'=>'internationalTravel', 'name'=>'International Travel', 'subNav'=>array(
      array('link'=>'atlas', 'name'=>'Atlas Travel'))),
     array('link'=>'snowbirds', 'name'=>'Snowbirds', 'subNav'=>array(
      array('link'=>'snowbirdsQE', 'name'=>'Snowbirds'))),
     array('link'=>'specialRisk', 'name'=>'Special Risk'),
     array('link'=>'customGroupRequest', 'name'=>'Custom / Group Quote'))),
    array('link'=>'info', 'name'=>'Information Centre', 'subNav'=>array(
     array('link'=>'travelInfo', 'name'=>'Travel Information'),
     array('link'=>'healthInfo', 'name'=>'Health Information'),
     array('link'=>'whyInsurance', 'name'=>'Why Do I Need Insurance?'),
     array('link'=>'choosingInsurance', 'name'=>'Choosing the Right Travel Insurance'),
     array('link'=>'understandingInsurance', 'name'=>'Understanding Your Travel Insurance Policy'),
     array('link'=>'faq', 'name'=>'Frequently Asked Questions'),
     array('link'=>'claims', 'name'=>'Claims Information'))),
    array('link'=>'about', 'name'=>'About Us'),
    array('link'=>'contact', 'name'=>'Contact Us')
  ),

  'staynomad' => array(
    array('link'=>'travel', 'name'=>'Travel Insurance', 'subNav'=>array(
     array('link'=>'canadianResidents', 'name'=>'Canadian Residents', 'subNav'=>array(
      array('link'=>'travel_allInclusiveApp', 'name'=>'All-Inclusive Travel Plan'),
      array('link'=>'canadianResidentsQE', 'name'=>'Medical Only Plan'),
      array('link'=>'travel_nonMedicalApp', 'name'=>'Non-Medical Plan'))),
     array('link'=>'visitorsToCanada', 'name'=>'Visitors to Canada', 'subNav'=>array(
      array('link'=>'visitorsToCanadaQE', 'name'=>'Visitors to Canada'),
      array('link'=>'travel_visitorsApp', 'name'=>'Visitors to Canada'))),
     array('link'=>'internationalStudents', 'name'=>'International Students', 'subNav'=>array(
      array('link'=>'internationalStudentsQE', 'name'=>'International Students'))),
     array('link'=>'expatriate', 'name'=>'Expatriate', 'subNav'=>array(
      array('link'=>'citizenSecure', 'name'=>'Citizen Secure'))),
     array('link'=>'internationalTravel', 'name'=>'International Travel', 'subNav'=>array(
      array('link'=>'atlas', 'name'=>'Atlas Travel'))),
     array('link'=>'snowbirds', 'name'=>'Snowbirds', 'subNav'=>array(
      array('link'=>'snowbirdsQE', 'name'=>'Snowbirds'))),
     array('link'=>'specialRisk', 'name'=>'Special Risk'),
     array('link'=>'customGroupRequest', 'name'=>'Custom / Group Quote'))),
    array('link'=>'info', 'name'=>'Information Centre', 'subNav'=>array(
     array('link'=>'travelInfo', 'name'=>'Travel Information'),
     array('link'=>'healthInfo', 'name'=>'Health Information'),
     array('link'=>'whyInsurance', 'name'=>'Why Do I Need Insurance?'),
     array('link'=>'choosingInsurance', 'name'=>'Choosing the Right Travel Insurance'),
     array('link'=>'understandingInsurance', 'name'=>'Understanding Your Travel Insurance Policy'),
     array('link'=>'faq', 'name'=>'Frequently Asked Questions'),
     array('link'=>'claims', 'name'=>'Claims Information'))),
    array('link'=>'about', 'name'=>'About Us'),
    array('link'=>'contact', 'name'=>'Contact Us')
  ),

  'cystic' => array(
    array('link'=>'travel', 'name'=>__('Travel Insurance', true), 'subNav'=>array(
     array('link'=>'canadianResidents', 'name'=>__('Canadian Residents', true), 'subNav'=>array(
      array('link'=>'travel_allInclusiveApp', 'name'=>__('All-Inclusive Travel Plan', true)),
      array('link'=>'canadianResidentsQE', 'name'=>__('Medical Only Plan', true)),
      array('link'=>'travel_nonMedicalApp', 'name'=>__('Non-Medical Plan', true)))),
     array('link'=>'visitorsToCanada', 'name'=>__('Visitors to Canada', true), 'subNav'=>array(
      array('link'=>'visitorsToCanadaQE', 'name'=>__('Visitors to Canada', true)),
      array('link'=>'travel_visitorsApp', 'name'=>__('Visitors to Canada', true)))),
     array('link'=>'internationalStudents', 'name'=>__('International Students', true), 'subNav'=>array(
      array('link'=>'internationalStudentsQE', 'name'=>__('International Students', true)))),
     array('link'=>'expatriate', 'name'=>__('Expatriate', true), 'subNav'=>array(
      array('link'=>'citizenSecure', 'name'=>__('Citizen Secure', true)))),
     array('link'=>'internationalTravel', 'name'=>__('International Travel', true), 'subNav'=>array(
      array('link'=>'atlas', 'name'=>__('Atlas Travel', true)))),
     array('link'=>'snowbirds', 'name'=>__('Snowbirds', true), 'subNav'=>array(
      array('link'=>'snowbirdsQE', 'name'=>__('Snowbirds', true)))),
     array('link'=>'specialRisk', 'name'=>__('Special Risk', true)),
     array('link'=>'customGroupRequest', 'name'=>__('Custom / Group Quote', true)))),
    array('link'=>'student', 'name'=>__('Student Insurance', true)),
    array('link'=>'health', 'name'=>__('Health Insurance', true), 'subNav'=>array(
     array('link'=>'extendedHealth', 'name'=>__('Extended Health', true), 'subNav'=>array(
      array('link'=>'association', 'name'=>''),
      array('link'=>'prism', 'name'=>''),
      array('link'=>'followMe', 'name'=>''),
      array('link'=>'prism', 'name'=>''),
      array('link'=>'healthRequest', 'name'=>__('Request Form', true)))),
     array('link'=>'employerGroupHealth', 'name'=>__('Employee Group', true)))),
    array('link'=>'life', 'name'=>__('Life & Living Benefits', true), 'subNav'=>array(
     array('link'=>'lifeInsurance', 'name'=>__('Life Insurance', true), 'subNav'=>array(
      array('link'=>'lifeRequest', 'name'=>__('Request Form', true)))),
     array('link'=>'livingBenefits', 'name'=>__('Living Benefits', true), 'subNav'=>array(
      array('link'=>'livingRequest', 'name'=>__('Request Form', true)))))),
    array('link'=>'homeInsurance', 'name'=>__('Home Insurance', true)),
    array('link'=>'auto', 'name'=>__('Auto Insurance', true)),
    array('link'=>'allProducts', 'name'=>__('All Products', true)),
    array('link'=>'info', 'name'=>__('Important Information', true), 'subNav'=>array(
     array('link'=>'travelInfo', 'name'=>__('Travel Information', true)),
     array('link'=>'healthInfo', 'name'=>__('Health Information', true)),
     array('link'=>'claims', 'name'=>__('Claims Information', true)))),
    array('link'=>'about', 'name'=>__('About Us', true)),
    array('link'=>'contact', 'name'=>__('Contact Us', true))
  ),

  'journeyman' => array(
    array('link'=>'travel', 'name'=>'Travel Insurance', 'subNav'=>array(
     array('link'=>'primelink', 'name'=>'Canadian Residents'),
     array('link'=>'visitorsToCanada', 'name'=>'Visitors to Canada', 'subNav'=>array(
      array('link'=>'visitorsToCanadaQE', 'name'=>'Visitors to Canada'),
      array('link'=>'travel_visitorsApp', 'name'=>'Visitors to Canada'))),
     array('link'=>'internationalStudents', 'name'=>'International Students', 'subNav'=>array(
      array('link'=>'internationalStudentsQE', 'name'=>'International Students'))),
     array('link'=>'expatriate', 'name'=>'Expatriate', 'subNav'=>array(
      array('link'=>'citizenSecure', 'name'=>'Citizen Secure'))),
     array('link'=>'internationalTravel', 'name'=>'International Travel', 'subNav'=>array(
      array('link'=>'atlas', 'name'=>'Atlas Travel'))),
     array('link'=>'primelink', 'name'=>'Snowbirds'),
     array('link'=>'specialRisk', 'name'=>'Special Risk'),
     array('link'=>'productSelector', 'name'=>'Product Selector'),
     array('link'=>'customGroupRequest', 'name'=>'Custom / Group Quote'))),
    array('link'=>'info', 'name'=>'Information Centre', 'subNav'=>array(
     array('link'=>'travelInfo', 'name'=>'Travel Information'),
     array('link'=>'healthInfo', 'name'=>'Health Information'),
     array('link'=>'whyInsurance', 'name'=>'Why Do I Need Insurance?'),
     array('link'=>'choosingInsurance', 'name'=>'Choosing the Right Travel Insurance'),
     array('link'=>'understandingInsurance', 'name'=>'Understanding Your Travel Insurance Policy'),
     array('link'=>'faq', 'name'=>'Frequently Asked Questions'),
     array('link'=>'claims', 'name'=>'Claims Information'))),
    array('link'=>'about', 'name'=>'About Us'),
    array('link'=>'contact', 'name'=>'Contact Us')
  )
 );


  $site_name = $this->siteName();
  if (array_key_exists($site_name, $site_navs))
   return $site_navs[$site_name];
  else
   return $site_navs['generic'];
 }


}
?>
