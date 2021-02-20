<?php

session_start();
include "../js/func.inc";
verifica_login2();

$adm = "adm@adm.com";

$_SESSION['adm'] = $adm;
unset($_SESSION['teste_email_cd']);
unset($_SESSION['teste_nome_cd']);

include('conect.php');

    $SQL = "select * from tentativa_login;";

    $resultado = mysqli_query($conect, $SQL);

    do {
        $registro = mysqli_fetch_assoc($resultado);

        $ip_logado = $_SERVER['REMOTE_ADDR'];

        if (($ip_logado == $registro["ip_tentativa"]) && ($registro["bloqueado"] == 'on')) {

            header("Location: pg_block.php");
        }
    } while ($registro != null);

    mysqli_close($conect);

?>


<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>LOGIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.ripples/0.5.3/jquery.ripples.min.js"></script>
    <link rel="stylesheet" href="/TCC/css/style_logar.css" type="text/css" />
		
</head>

<body class = "hero">

    <div class="login-form">
        <!-- <div class="logo"><img src="imagem/logo.png" alt="">LOGO</div>-->
        <h6>Logar em :</h6>

        <form action="verifica_login.php" id="login-form" method="POST">

            <div class="texto">
                <input type="text" placeholder="Email do usuário" name="email" id="email" required="required" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}" title = "Por favor seguir o exemplo: usuario@gmail.com"max="50" min="10">
                <span class="check-message hidden">NECESSÁRIO</span>
            </div>

            <div class="texto">
                <input type="password" name="senha" id="senha" title ="A senha deve possuir no minimo 4 digitos" placeholder="Senha" min="4">
                <span class="check-message hidden">NECESSÁRIO</span>
            </div>
            <?php
            if ((isset($_SESSION['teste_senha']))||(isset($_SESSION['teste_email']))) {

                $teste_senha = $_SESSION['teste_senha'];

                if (($teste_senha == 1)||($teste_email == 1)){

                    echo
                        '<div>
                            <p class="red">Dados incorretos por favor tente novamente</p>
                        </div>';
                }
            }
            ?>

            <input type="submit" value="Conecte-se agora" class="login-btn botao" name="btn-login" id="btn-login" disabled>

            <div class="privacy-link">
                <a href="#">Política de Privacidade</a>
            </div>
        </form>

        <div class="dont-have-account">
            Não tem uma conta na Nome do Site?
            <a href="cadastro_usuario.php">Criar Conta</a>
        </div>

        <div class="dont-have-account">
            Deseja logar como visitante para conhecer o site? 
            <a href="verifica_visitante.php">Visitar</a>
        </div>
    </div>

</body>

    <script type="text/javascript">
        $(".texto input").focusout(function() {
            if ($(this).val() == "") {
                $(this).siblings().removeClass("hidden");
                $(this).css("background", "#554343");
            } else {
                $(this).siblings().addClass("hidden");
                $(this).css("background", "rgba(29, 184, 11, 0.4)");
            }
        });

        $(".texto input").keyup(function() {
            var inputs = $(".texto input");
            if (inputs[0].value != "" && inputs[1].value) {
                $(".login-btn").attr("disabled", false);
                $(".login-btn").addClass("active");
            } else {
                $(".login-btn").attr("disabled", true);
                $(".login-btn").removeClass("active");
            }
        });
    </script>

</html>