<?php
	
	session_start();

	include "../js/func.inc";
	verifica_login2();
	$_SESSION['teste_usuario'] = 2;
	$_SESSION['teste_senha'] = 2;
	$email_usuario = $_POST['email'];
	$senha_usuario = $_POST['senha'];
	$teste = true;
	$tentativas = 0;
	$teste_email = false;
	$teste_senha = false; 
	$um = 1;
	echo $_SERVER['REMOTE_ADDR'];

	$ip_tentativa = $_SERVER['REMOTE_ADDR'];

	echo "<hr/>";
	
	echo gethostbyname("localhost");
	
	$origem_tentativa = gethostbyname("localhost");
    echo "<hr/>";
	
	include('conect.php');
		
	$SQL = "select * from usuario";

	$SQL2= "
	
		select * from tentativa_login;
	
	";
		
	$resultado = mysqli_query($conect,$SQL);
	$resultado2 = mysqli_query($conect, $SQL2);
	
	var_dump($SQL);
	var_dump($SQL2);
    
    
    echo $email_usuario;
    echo "<hr/>";
    echo $senha_usuario;
	echo "<hr/>";
	
	do{
		$registro = mysqli_fetch_assoc($resultado);
        echo "<hr/>";
        echo $registro["email_usuario"];
        echo $registro["senha_usuario"];
        echo "<hr/>";

		if($email_usuario == $registro["email_usuario"]){
            if($senha_usuario == $registro["senha_usuario"]){
				
			$teste = false;
			
			setcookie("email_usuario", "$email_usuario",(time() + 40000));
			setcookie("senha_usuario", "$senha_usuario",(time() + 40000));
			$_SESSION['logado'] = true;
			$logar = "
				update usuario
				set stasts_usuario = 1
				where email_usuario = '" .$registro["email_usuario"]. "';
			";
			$logar = mysqli_query($conect,$logar);

			$logado = 1;
			
			var_dump($logar);

			unset($_SESSION['teste_email']);
			unset($_SESSION['teste_senha']);

			header("Location: pg_inicial.php");

			}
		}

		if($email_usuario != $registro["email_usuario"]){
			$_SESSION['teste_email'] = $um;
		}
        if($senha_usuario != $registro["senha_usuario"]){
			$_SESSION['teste_senha'] = $um;
		}
			
	}while($registro != null);

	do{
		$registro3 = mysqli_fetch_assoc($resultado2);
			
		if($registro3["email_tentativa"] == $email_usuario){

			$tentativas = $tentativas + 1;
			
			echo " tentativas = $tentativas";

		}


	}while ($registro3 != null);
		
	if($teste == true){

		$_SESSION['verifica_login'] = 1;
		$ins = "
			insert into tentativa_login(ip_tentativa, email_tentativa, origem_tentativa)
			value ('".$ip_tentativa."', '".$email_usuario."', '".$origem_tentativa."')
		";

		$resultado = mysqli_query($conect, $ins);
		$resultado = mysqli_query($conect, $ins2);

		echo $ip_tentativa;
		echo $email_usuario;
		echo $origem_tentativa;

		if($tentativas >= 5){
		
			echo "entrou nas tentativas";
		
			$ins = "
				insert into tentativa_login(ip_tentativa, email_tentativa, origem_tentativa,bloqueado)
				value ('" . $ip_tentativa . "', '" . $email_usuario . "', '" . $origem_tentativa . "', 'on');
			";

			$resultado = mysqli_query($conect, $ins);

		}

		header("Location: logar.php");
			
	}
	mysqli_close($conect);

?>