<?php

//include_once 'controller/CloudinaryController.php';
include_once 'controller/UserController.php';
include_once 'controller/ProductController.php';
include_once 'controller/EventController.php';

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
}elseif(isset($_GET['createEvent'])){
	$controller = new EventController();

	if(isset($_POST["date"]) && isset($_POST["desc"])){
		$date = $_POST['date'];
		$desc = $_POST['desc'];
		$type = 'user';

		$isCreated = $controller->createEvent($date, $desc, $type);

		echo $isCreated;
	}

}elseif(isset($_GET['getProducts'])){
	$controller = new ProductController();
	if(isset($_POST["sexo"]) && isset($_POST['etapa']) && isset($_POST['pasatiempo']) && isset($_POST['color'])){
		$sexo = $_POST["sexo"];
		$id_etapa = $_POST["etapa"];
		$categoria = $_POST["pasatiempo"];
		$color = $_POST["color"];


	//$sexo = "mujer";
	//$id_etapa = 22;
	//$categoria = 22;
	//$color = 42;


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

	
	
	//print_r($cat);
	echo $cat;




	}else{
		echo false;
	}
	
}elseif(isset($_GET['getEvents'])){
	$controller = new EventController();

	$cat = '[';

	for ($i=0; $i < sizeof($controller->getEvents()); $i++) { 
		$cat .= '{';

		$cat .= '"id":';
		$cat .= $controller->getEvents()[$i] -> id;
		$cat .= ',';

		$cat .= '"date":';
		$cat .= '"'.$controller->getEvents()[$i] -> date.'"';
		$cat .= ',';

		$cat .= '"event":';
		$cat .= '"'.$controller->getEvents()[$i] -> event.'"';
		$cat .= ',';

		$cat .= '"type":';
		$cat .= '"'.$controller->getEvents()[$i] -> type.'"';

		$cat .= '}';

		if ($i < sizeof($controller->getEvents()) - 1) {
			$cat .= ',';
		}
	}
	$cat .= ']';

	
	
	//print_r($cat);
	echo $cat;
}
