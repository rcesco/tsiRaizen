<?php

  session_start();

	require_once 'system/config.php';
	require_once 'system/controller.php';
	require_once 'system/model.php';
	require_once 'system/system.php';

	$ctrl = new Controller();
	$header = $_SERVER;

	$post = file_get_contents("php://input");
	$post = json_decode($post, true);
	if($ctrl->VerifyLogin() || REDIRECT_URL == '/user/login' || REDIRECT_URL == '/user/setAccess'){
		$start = new System(REDIRECT_URL);
		$start->run();
	}else{
		$ctrl->view('user/login');
	}


?>
