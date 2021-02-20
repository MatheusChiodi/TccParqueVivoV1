<?php
	$conect = mysqli_connect("localhost", "root", "");
	
	if(!$conect){
		
	
		echo mysqli_connect_error($conect)."<br />";
		exit();
		
		echo"deu merda";
		
	}
	
	// Seleciona a base de dados
	
	$db = mysqli_select_db($conect,"TCC");
	
	if(!$db){
		
		echo"deu merda";
		echo mysqli_connect_error($conect)."<br />";
		exit();
		
	}
