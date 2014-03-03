<?php
class AirportsController extends AppController {

	var $name = 'Airports';
	var $helpers = array('Html', 'Form');

	function beforeFilter(){
  $this->Auth->allow('*');
	  $this->layout = 'ajax';
	}
	
	function index($country = null, $index_by = 'city') {
	  if ($index_by != 'city') $index_by = 'airport';
	  // get all the airports
	  if (is_string($country)){
	    $airports = $this->Airport->find('all', array(
		  'conditions' => array('Airport.country' => $country),
		  'order' => $index_by
		));
	  }
	  else {
	    $airports = $this->Airport->find('all');
	  }
	  $this->set('airports', $airports);
	  $this->set('index_by', $index_by);
	}
	
	// a select with all the country names
	function countries(){
	  $this->set('countries', $this->Airport->find('all', array('fields' => 'DISTINCT country', 'order' => 'country')));
	}

}
?>