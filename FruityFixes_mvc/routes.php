<?php

  function call($controller, $action) {
    require_once('Controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
      case 'student':
        	$controller = new StudentController();
		require_once('Models/student.php');
                
     	break;
	case 'login':
	     	$controller = new LoginController();
		require_once('Models/user.php');
      	break;
	case 'technician':
	     	$controller = new TechnicianController();
		require_once('Models/technician.php');
      break;
	case 'management':
	     	$controller = new ManagementController();
		require_once('Models/management.php');
      	break;
    }

    $controller->{ $action }();
  }

  $controllers = array('pages' => array('home', 'error'), 'student' => array('reportFault','registerStudent'),'login' => array('login','logout'), 'management' => array('menuManagement','pcStatusReport','fixedFaultsReport','registerTechnician','viewSummaryReport','technicianPerfomanceReport'), 'technician'=>array('menuTechnician','modifyPCSpecs','viewSummaryReport','techFixes','updateTechnicianProfile'));

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>
