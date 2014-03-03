<?php

class CustomGroupRequest extends AppModel {
 var $name = 'CustomGroupRequest';
 var $validate = array(
  'first_name' => array('rule' => 'notEmpty'),
  'last_name' => array('rule' => 'notEmpty'),
  'email' => array( 
	'valid_email' => array('rule' => 'email', 'required' => true)
  ),
  'address' => array('rule' => 'notEmpty'),
  'city' => array('rule' => 'notEmpty'),
  'province' => array('rule' =>'notEmpty'),
  'postal_code' => array(
	'valid_postal' => array('rule' => array('postal', '/(^[a-zA-Z]\d[a-zA-Z]\s?\d[a-zA-Z]\d\s*)|\d{5}$/', 'ca'), 'required' => true)
  ),
  'country' => array('rule' =>'notEmpty'),
  'phone' => array('rule' => 'notEmpty'),
  'gender' => array('rule' =>'notEmpty'),
  'date_of_birth' => array('rule' =>'notEmpty'),
 );
}
