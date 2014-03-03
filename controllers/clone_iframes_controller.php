<?php

class CloneIframesController extends AppController {

 var $uses = array();

 function index($cloneFilename){
  $tracking = '';
  if ($this->user_name != '')
   $tracking = '?tracking='. $this->user_name;
  elseif ($this->site_name != '')
   $tracking = '?tracking='. $this->site_name;
  
  // language settings:
  if ($this->language == 'french'){
  $this->set('cloneUrl', 'https://inglememberbenefits.merchantsecure.com/iframe_fr/'. $cloneFilename. '.asp'. $tracking);

  // url for policy wording
  if (preg_match('/^travel/', $cloneFilename))
   $this->set('policyLink', '/pdf/manulife/tvl_policy_fr.pdf');
  elseif (preg_match('/^student_intnlPlatinum/', $cloneFilename))
   $this->set('policyLink', '/pdf/etfs/IS-Policy_PlatinumF.pdf');
  elseif (preg_match('/^student_intnlGoldApp/', $cloneFilename))
   $this->set('policyLink', '/pdf/tu/goldPolicy.pdf');
  elseif (preg_match('/^student_travel/', $cloneFilename))
   $this->set('policyLink', '/pdf/tic/TIC-All-Plans.pdf');
  }
  
  else { // language == 'english'
  $this->set('cloneUrl', 'https://inglememberbenefits.merchantsecure.com/iframe2/'. $cloneFilename. '.asp'. $tracking);

  // url for policy wording
  if (preg_match('/^travel/', $cloneFilename))
   $this->set('policyLink', '/pdf/manulife/tvl_policy.pdf');
  elseif (preg_match('/^student_intnlPlatinum/', $cloneFilename))
   $this->set('policyLink', '/pdf/etfs/IS-Policy_Platinum.pdf');
  elseif (preg_match('/^student_intnlGoldApp/', $cloneFilename))
   $this->set('policyLink', '/pdf/tu/goldPolicy.pdf');
  elseif (preg_match('/^student_travel/', $cloneFilename))
   $this->set('policyLink', '/pdf/tic/TIC-All-Plans.pdf');
  }
  
 }
}

?>
