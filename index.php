<?php

//include_once 'controller/CloudinaryController.php';
include_once 'controller/UserController.php';
include_once 'controller/ProductController.php';

if(isset($_GET['login'])){
	$controller = new UserController();

	if(isset($_POST["email"]) && isset($_POST['password'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$user = $controller->login($email, $password)[0];
		//print_r($controller->login('nela@gmail.com', 'nela')[0]);


		
		$cat = '[';

		//for ($i=0; $i < sizeof($user); $i++) { 
		if(sizeof($user) > 0){
			$cat .= '{';

			$cat .= '"id":';
			$cat .= $user[0];
			$cat .= ',';

			$cat .= '"email":';
			$cat .= '"'.$user[1].'"';
			$cat .= ',';

			$cat .= '"tipo":';
			$cat .= '"'.$user[2].'"';
			$cat .= ',';

			$cat .= '"nombre":';
			$cat .= '"'.$user[3].'"';

			$cat .= '}';
		}
		$cat .= ']';
		

		echo $cat;
	}
}else if(isset($_GET['registerUser'])){
	$controller = new UserController();

	if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST['password']) && isset($_POST["tipo"])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$tipo = $_POST['tipo'];

		$isRegistered = $controller->register($name, $email, $password, $tipo);

		echo $isRegistered;
	}
}elseif(isset($_GET['getProducts'])){
	$controller = new ProductController();
	if(isset($_POST["sexo"]) && isset($_POST['etapa']) && isset($_POST['pasatiempo']) && isset($_POST['color'])){
		$sexo = $_POST["sexo"];
		$id_etapa = $_POST["etapa"];
		$categoria = $_POST["pasatiempo"];
		$color = $_POST["color"];

		//echo json_encode($controller->getProducts($sexo, $id_etapa, $categoria, $color));	

	


	//$sexo = "mujer";
	//$id_etapa = 32;
	//$categoria = 42;
	//$color = 22;


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

	
	
	print_r($cat);
	//echo $cat;




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
