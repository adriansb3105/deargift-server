<?php

//include_once 'controller/CloudinaryController.php';
include_once 'controller/UserController.php';
include_once 'controller/ProductController.php';

if(isset($_GET['login'])){
	$controller = new UserController();

	if(isset($_POST["email"]) && isset($_POST['password'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$user = $controller->login($email, $password);

		echo json_encode($user);
	}
}elseif(isset($_GET['getProducts'])){
	$controller = new ProductController();
	if(isset($_POST["sexo"]) && isset($_POST['etapa']) && isset($_POST['pasatiempo']) && isset($_POST['color'])){
		$id_sexo = $_POST["sexo"];
		$id_etapa = $_POST["etapa"];
		$categoria = $_POST["pasatiempo"];
		$color = $_POST["color"];

		echo json_encode($controller->getProducts($id_sexo, $id_etapa, $categoria, $color));	

	}else{
		echo false;
	}

/*
	$id_sexo = 12;
	$id_etapa = 22;
	$categoria = array(32);
	$color = array(22, 72);

	//print_r($controller->getProducts($id_sexo, $id_etapa, $categoria, $color));
	echo json_encode($controller->getProducts($id_sexo, $id_etapa, $categoria, $color));
	//echo json_encode('{tipo: 1, nombre: yo}');
	*/
}