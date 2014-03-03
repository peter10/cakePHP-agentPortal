<?php

class FormattingComponent extends Object {

 function emailData($data) { // formats Cake data for email response
  $return = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> <html> <body>';
  foreach($data as $value) {
   foreach($value as $key => $val) {
    if (is_array($val)){ // for dates and other nested arrays 
     $return .= "<strong>". Inflector::humanize($key). "</strong>: ";
      $return .= date("M-d-Y", mktime(0, 0, 0, $val['month'], $val['day'], $val['year'])). '<br>';
    }
    else // everything not a birthdate
    $return .= "<strong>". Inflector::humanize($key). '</strong>: '. $val. "<br>\n";
    //$return .= "<strong>". $key. '</strong>: '. $val. "<br>\n";
   }
  }
  $return .= '</body></html>';
  return $return;
 }

}