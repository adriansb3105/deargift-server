<?php

	//include_once 'controller/DefaultController.php';
	//include_once 'controller/UserController.php';

	if(isset($_GET['login'])){
	  //$controller = new UserController();

	  if(isset($_POST["username"]) && isset($_POST['password'])){
	  	$username = $_POST['username'];
	  	$password = $_POST['password'];

	  	//$user = $controller->login($username, $password);

	  	echo $username;
	  }else{
	  	echo 'mal';
	  }
	}
	//else{
	//	$controller = new DefaultController();
	//	$controller->invoke();
	//}