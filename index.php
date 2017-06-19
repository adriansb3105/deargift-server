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
	/*if(isset($_POST["sexo"]) && isset($_POST['etapa']) && isset($_POST['pasatiempo']) && isset($_POST['color'])){
		$sexo = $_POST["sexo"];
		$etapa = $_POST["etapa"];
		$pasatiempo = $_POST["pasatiempo"];
		$color = $_POST["color"];

		$products = $controller->getProducts($sexo, $etapa, $pasatiempo, $color);

		echo json_encode($products);
	}else{
		echo false;
	}*/

	$id_sexo = 1;
	$id_etapa = 1;
	$id_categoria = 4;
	$id_color = 1;
	//$pasatiempo = array('accesorios', 'juguetes');
	//$color = array('tierra');

	$products = $controller->getProducts($id_sexo, $id_etapa, $id_categoria, $id_color);
	echo json_encode($products);

}