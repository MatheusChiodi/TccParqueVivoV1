<?php
	
	session_start();
	
	include('conect.php');
	$usuario = $_COOKIE["email_usuario"];
	$logar ="
		update usuario
		set stasts_usuario = 0
		where email_usuario = '" .$usuario. "';
	";
	$logar = mysqli_query($conect,$logar);
	
	$resultado = mysqli_query($conect,$logar);
	
	setcookie('senha_login');

	setcookie('email_login', null, -1);
	setcookie('senha_login', null, -1);
	
	session_destroy();
	
	header("Location: logar.php");
?>