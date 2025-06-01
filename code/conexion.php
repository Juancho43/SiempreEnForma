<?php
	$servidor = 'localhost';
	$root = 'c2320290_grupo1';
	$clave = 'tuveKIdu55';
	$bd = 'c2320290_grupo1'; 
	$link = mysqli_connect($servidor,$root,$clave,$bd);

	session_start();

	define("BASE_DIR", "/grupo1");
?>