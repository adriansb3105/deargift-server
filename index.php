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

}elseif(isset($_GET['buy'])){
	$controller = new ProductController();

	if(isset($_POST["correo"]) && isset($_POST["id"]) && isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["precio"]) && isset($_POST["sexo"]) && isset($_POST["categoria"]) && isset($_POST["etapa"]) && isset($_POST["color"]) && isset($_POST["url"])){
		
		$correo = $_POST['correo'];
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$precio = $_POST['precio'];
		$sexo = $_POST['sexo'];
		$categoria = $_POST['categoria'];
		$etapa = $_POST['etapa'];
		$color = $_POST['color'];
		$url = $_POST['url'];

		$isInserted = $controller->buyProduct($correo, $id, $nombre, $descripcion, $precio, $sexo, $categoria, $etapa, $color, $url);

		echo $isInserted;
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
}elseif(isset($_GET['getCesta'])){
	$controller = new ProductController();

	$cat = '[';

	//if(isset($_POST["email"])){
	//	$email = $_POST["email"];
		$email = 'nela@gmail.com';

		$tmp = $controller->getCesta($email);


		for ($i=0; $i < sizeof($tmp); $i++) { 
			$cat .= '{';

			$cat .= '"id_producto":';
			$cat .= $tmp[$i] -> id_producto;
			$cat .= ',';

			$cat .= '"nombre":';
			$cat .= '"'.$tmp[$i] -> nombre.'"';
			$cat .= ',';

			$cat .= '"descripcion":';
			$cat .= '"'.$tmp[$i] -> descripcion.'"';
			$cat .= ',';

			$cat .= '"precio":';
			$cat .= $tmp[$i] -> precio;
			$cat .= ',';

			$cat .= '"sexo":';
			$cat .= '"'.$tmp[$i] -> sexo.'"';
			$cat .= ',';

			$cat .= '"etapa":';
			$cat .= '"'.$tmp[$i] -> etapa.'"';
			$cat .= ',';

			$cat .= '"color":';
			$cat .= '"'.$tmp[$i] -> color.'"';
			$cat .= ',';

			$cat .= '"categoria":';
			$cat .= '"'.$tmp[$i] -> categoria.'"';
			$cat .= ',';

			$cat .= '"url":';
			$cat .= '"'.$tmp[$i] -> url.'"';

			$cat .= '}';

			if ($i < sizeof($tmp) - 1) {
				$cat .= ',';
			}
		}
	//}



	$cat .= ']';

	
	
	//print_r($cat);
	echo $cat;
}
