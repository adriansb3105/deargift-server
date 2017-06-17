<?php

	//include_once 'controller/DefaultController.php';
	include_once 'controller/UserController.php';

	if(isset($_GET['login'])){
	  $controller = new UserController();

	  if(isset($_POST["email"]) && isset($_POST['password'])){
	  	$email = $_POST['email'];
	  	$password = $_POST['password'];

	  	$user = $controller->login($email, $password);

	  	echo json_encode($user);

	  }else{
	  	echo 'mal';
	  }
	}
	//else{
	//	$controller = new DefaultController();
	//	$controller->invoke();
	//}