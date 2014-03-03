<?php

Router::connect('/healthRequest', array('controller' => 'individual_health_insurance_requests', 'action' => 'add'));
Router::connect('/lifeRequest', array('controller' => 'life_insurance_requests', 'action' => 'add'));
Router::connect('/livingRequest', array('controller' => 'living_benefits_requests', 'action' => 'add'));
Router::connect('/employerGroupHealth', array('controller' => 'employer_group_health_requests', 'action' => 'add'));
Router::connect('/customGroupRequest', array('controller' => 'custom_group_requests', 'action' => 'add'));
Router::connect('/lifeRequest', array('controller' => 'lifeRequests', 'action' => 'add'));
Router::connect('/homeRequest', array('controller' => 'homeRequests', 'action' => 'add'));
Router::connect('/freedomRequest', array('controller' => 'tu_freedom_requests', 'action' => 'add'));

// Clone site ifames
Router::connect('/student_intnlGoldApp', array('controller'=>'clone_iframes', 'action'=>'index', 'student_intnlGoldApp'));
Router::connect('/student_intnlPlatinumApp', array('controller'=>'clone_iframes', 'action'=>'index', 'student_intnlPlatinumApp'));
Router::connect('/student_intnlSilverApp', array('controller'=>'clone_iframes', 'action'=>'index', 'student_intnlSilverApp'));
Router::connect('/student_travel', array('controller'=>'clone_iframes', 'action'=>'index', 'student_travel'));
Router::connect('/travel_allInclusiveApp', array('controller'=>'clone_iframes', 'action'=>'index', 'travel_allInclusiveApp'));
Router::connect('/travel_annualMedicalApp', array('controller'=>'clone_iframes', 'action'=>'index', 'travel_annualMedicalApp'));
Router::connect('/travel_canadaApp', array('controller'=>'clone_iframes', 'action'=>'index', 'travel_canadaApp'));
Router::connect('/travel_combinationApp', array('controller'=>'clone_iframes', 'action'=>'index', 'travel_combinationApp'));
Router::connect('/travel_globalMedicalApp', array('controller'=>'clone_iframes', 'action'=>'index', 'travel_globalMedicalApp'));
Router::connect('/travel_globalMedicalApp_over54', array('controller'=>'clone_iframes', 'action'=>'index', 'travel_globalMedicalApp_over54'));
Router::connect('/travel_nonMedicalApp', array('controller'=>'clone_iframes', 'action'=>'index', 'travel_nonMedicalApp'));
Router::connect('/travel_rentalCarApp', array('controller'=>'clone_iframes', 'action'=>'index', 'travel_rentalCarApp'));
Router::connect('/travel_TripCancellationApp', array('controller'=>'clone_iframes', 'action'=>'index', 'travel_TripCancellationApp'));
Router::connect('/travel_visitorsApp', array('controller'=>'clone_iframes', 'action'=>'index', 'travel_visitorsApp'));

// Wen/Gouliang ETFS iframes
Router::connect('/visitorsToCanadaQE', array('controller'=>'etfs_iframes', 'action'=>'index', 'VisitorsToCanada'));
Router::connect('/canadianResidentsQE', array('controller'=>'etfs_iframes', 'action'=>'index', 'CanadianResidents'));
Router::connect('/internationalStudentsQE', array('controller'=>'etfs_iframes', 'action'=>'index', 'InterStudent'));
Router::connect('/snowbirdsQE', array('controller'=>'etfs_iframes', 'action'=>'index', 'SnowBirds'));

// IMG iframes
Router::connect('/patriotGroup', array('controller'=>'img_iframes', 'action'=>'index', 'pgt', 'index.cfm'));
Router::connect('/patriotExtreme', array('controller'=>'img_iframes', 'action'=>'index', 'patx', 'index.cfm'));
Router::connect('/patriotGroupExchange', array('controller'=>'img_iframes', 'action'=>'index', 'epgt', 'index.cfm'));

// MNUI iframes
Router::connect('/atlas', array('controller'=>'mnui_iframes', 'action'=>'index', 'www.worldtrips.com', 'quotes', 'atlas', 'quote.asp'));
Router::connect('/citizenSecure', array('controller'=>'mnui_iframes', 'action'=>'index', 'www.worldtrips.com', 'quotes', 'ic', 'default.asp'));
Router::connect('/citizensecure', array('controller'=>'mnui_iframes', 'action'=>'index', 'www.worldtrips.com', 'quotes', 'ic', 'default.asp'));
Router::connect('/studentSecure', array('controller'=>'mnui_iframes', 'action'=>'index', 'www.quote-and-apply.com', 'studentsecure', '', 'getquote.php'));
Router::connect('/studentsecure', array('controller'=>'mnui_iframes', 'action'=>'index', 'www.quote-and-apply.com', 'studentsecure', '', 'getquote.php'));
Router::connect('/amigo', array('controller'=>'mnui_iframes', 'action'=>'index', 'www.quote-and-apply.com', 'amigo', '', ''));

// Manulife API 

Router::connect('/manulife', array('controller' => 'manulife_plans', 'action' => 'add'));
Router::connect('/manulife1/*', array('controller' => 'manulife_plans', 'action' => 'add1'));
Router::connect('/manulife2/*', array('controller' => 'manulife_plans', 'action' => 'add2'));


// login/out
Router::connect('/login/*', array('controller' => 'users', 'action' => 'login'));
Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
Router::connect('/forgot_password', array('controller' => 'users', 'action' => 'email_login'));
Router::connect('/change_password', array('controller' => 'users', 'action' => 'change_password'));
// agent commissions
Router::connect('/agentCommissions/:action/*', array('controller' => 'agentCommissions', 'action' => 'index'));
// booking and admin systems
Router::connect('/bookingSystems', array('controller' => 'bookingSystems', 'action' => 'index'));

// airport ajax
Router::connect('/airport_ajax/:action/*', array('controller' => 'airports'));

Router::connect('/*', array('controller' => 'pages', 'action' => 'view'));