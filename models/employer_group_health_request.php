<?php

class EmployerGroupHealthRequest extends AppModel {

 var $name = 'EmployerGroupHealthRequest';
 
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
  'company_name' => array('rule' => 'notEmpty'),
  'years_in_business' => array('rule' => 'notEmpty'),
  'nature_of_business' => array('rule' => 'notEmpty'),
  'all_employees_min_20_hours' => array('rule' => 'notEmpty'),
  'any_employees_on_commissions' => array('rule' => 'notEmpty'),
  'covered_by_workers_comp' => array('rule' => 'notEmpty'),
  'hazardous_activites' => array('rule' => 'notEmpty'),
  'staff_turnover' => array('rule' => 'notEmpty'),
  'canadian_residents' => array('rule' => 'notEmpty'),
  'present_group_plan' => array('rule' => 'notEmpty'),
  'employees_presently_off' => array('rule' => 'notEmpty'),
 );
 
}
