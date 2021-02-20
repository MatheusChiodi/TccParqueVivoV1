<?php

    session_start();

    $evento_pesquisado = $_POST["evento_pesquisado"];
    $usuario = $_COOKIE["email_usuario"];
    $_SESSION['evento_pesquisado'] = false;

    $SQL1 = "select * from evento";
    $resultado1 = mysqli_query($conect,$SQL1);

    do{
        $registro1 = mysqli_fetch_assoc($resultado1);
        if(($registro1['email_evento'] != null)&&($registro1['email_evento'] == $usuario)){
            if($registro1['nome_evento'] == $evento_pesquisado){

                $_SESSION['evento_pesquisado'] = true;
                $_SESSION['evento_pesquisado_nome'] = $evento_pesquisado;
                header("Location: evento_cadastrados_usu.php");
                break;
                
            }
        }
    }while($registro1 != null);

    if($_SESSION['evento_pesquisado'] == false){

        header("Location: evento_cadastrados_usu.php");

    }


?>