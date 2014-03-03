<?php

class LifeInsuranceRequest extends AppModel {
 var $name = 'LifeInsuranceRequest';
 var $hasMany = 'Companion';
 var $validate = array(
  'first_name' => array('rule' => 'notEmpty'),
  'last_name' => array('rule' => 'notEmpty'),
  'email' => array( 
	'valid_email' => array('rule' => 'email', 'required' => true)
  ),
  'address' => array('rule' => 'notEmpty'),
  'city' => array('rule' => 'notEmpty'),
  'canadian_province' => array('rule' => 'notEmpty'),
  'postal_code' => array(
	'valid_postal' => array('rule' => array('postal', '/(^[a-zA-Z]\d[a-zA-Z]\s?\d[a-zA-Z]\d\s*)|\d{5}$/', 'ca'), 'required' => true)
  ),
  'phone' => array('rule' => 'notEmpty'),
  'gender' => array('rule' => 'notEmpty'),
  'dob' => array('rule' => 'notEmpty'),
  'smoker' => array('rule' => 'notEmpty'),
  'medical_conditions' => array('rule' => 'notEmpty'),
 );
}
