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
		$sexo = $_POST["sexo"];
		$id_etapa = $_POST["etapa"];
		$categoria = $_POST["pasatiempo"];
		$color = $_POST["color"];

		//echo json_encode($controller->getProducts($sexo, $id_etapa, $categoria, $color));	

	


	//$sexo = "hombre";
	//$id_etapa = 2;
	//$categoria = array(32);
	//$color = 2;


	$cat = '[';

	for ($i=0; $i < sizeof($controller->getProducts($sexo, $id_etapa, $categoria, $color)); $i++) { 
		$cat .= '{';

		$cat .= '"id":';
		$cat .= $controller->getProducts($sexo, $id_etapa, $categoria, $color)[$i] -> id;
		$cat .= ',';

		$cat .= '"nombre":';
		$cat .= '"'.$controller->getProducts($sexo, $id_etapa, $categoria, $color)[$i] -> nombre.'"';
		$cat .= ',';

		$cat .= '"descripcion":';
		$cat .= '"'.$controller->getProducts($sexo, $id_etapa, $categoria, $color)[$i] -> descripcion.'"';
		$cat .= ',';

		$cat .= '"precio":';
		$cat .= $controller->getProducts($sexo, $id_etapa, $categoria, $color)[$i] -> precio;
		$cat .= ',';

		$cat .= '"sexo":';
		$cat .= '"'.$controller->getProducts($sexo, $id_etapa, $categoria, $color)[$i] -> sexo.'"';
		$cat .= ',';

		$cat .= '"categoria":';
		$cat .= '"'.$controller->getProducts($sexo, $id_etapa, $categoria, $color)[$i] -> categoria.'"';
		$cat .= ',';

		$cat .= '"etapa":';
		$cat .= '"'.$controller->getProducts($sexo, $id_etapa, $categoria, $color)[$i] -> etapa.'"';
		$cat .= ',';

		$cat .= '"color":';
		$cat .= '"'.$controller->getProducts($sexo, $id_etapa, $categoria, $color)[$i] -> color.'"';
		$cat .= ',';

		$cat .= '"url":';
		$cat .= '"'.$controller->getProducts($sexo, $id_etapa, $categoria, $color)[$i] -> url.'"';

		$cat .= '}';

		if ($i < sizeof($controller->getProducts($sexo, $id_etapa, $categoria, $color)) - 1) {
			$cat .= ',';
		}
	}
	$cat .= ']';

	
	
	echo $cat;

	//$controller->getProducts($sexo, $id_etapa, $categoria, $color)


	//{ "name":"John", "age":30, "city":"New York"}



	//print_r($controller->getProducts($sexo, $id_etapa, $categoria, $color));
	//echo sizeof($controller->getProducts($sexo, $id_etapa, $categoria, $color));
	//echo json_encode($controller->getProducts($sexo, $id_etapa, $categoria, $color));
	//echo json_encode('{tipo: 1, nombre: yo}');


	//$array = array(1,2,3,4,5,6);
	//$change = array('key1' => '1', 'key2' => '2', 'key3' => '3');
	//echo json_encode($change);

	}else{
		echo false;
	}
	
}
