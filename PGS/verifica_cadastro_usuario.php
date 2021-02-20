<?php

	session_start();
		
	$email_usuario = $_POST['email'];
	$nome_usuario = $_POST['nome'];
    $senha_usuario1 = $_POST['senha1'];
    $senha_usuario2 = $_POST['senha2'];
    $teste_email = true;
    $teste_nome = true;
	$teste_senha = true;
	$um = 1;
	
	include('conect.php');
		
	$SQL = "select * from usuario";
	$resultado = mysqli_query($conect,$SQL);

	do{
		if(($email_usuario != " ")&&($nome_usuario != " ")){
			$registro = mysqli_fetch_assoc($resultado);
            if($email_usuario == $registro["email_usuario"]){
				$teste_email = false;
            }
            
            if($nome_usuario == $registro["nome_usuario"]){
                $teste_nome = false;
            }
		}
    }while($registro != null);
		
	if(($teste_email == true)&&($teste_nome == true)&&($senha_ok == true)){
		$ins ="
		
			insert into usuario(email_usuario,nome_usuario,senha_usuario,stasts_usuario)
			value ('".$email_usuario."','".$nome_usuario."','".$senha_usuario1."','0')

		
		";
		$resultado = mysqli_query($conect,$ins);

		unset($_SESSION['verifica_cadastro']);
			
		header("Location: logar.php");
			
	}

	if (($teste_email == false) || ($teste_nome == false)) {

		$_SESSION['verifica_cadastro_cd'] = $um;

	}

	if ($teste_email == false){
		
		$_SESSION['teste_email_cd'] = $um;

	}

	if($teste_nome == false){

		$_SESSION['teste_nome_cd'] = $um;
	}

	if (($teste_email == false) || ($teste_nome == false)) {

		echo "entrou no erro final";

		header("Location: cadastro_usuario.php");

	}

	mysqli_close($conect);
?>