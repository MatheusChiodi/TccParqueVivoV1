<?php

session_start();
include('conect.php');
include "../js/func.inc";
verifica_login2();

unset($_SESSION['teste_email']);
unset($_SESSION['teste_senha']);

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
    <title>CADASTRAR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="/TCC/css/style_cd_usu.css" type="text/css" />
</head>

<script>

</script>

<body class = "hero">
    <div class="cadastro-form">
        <!--<div class="logo"><img src="imagem/logo.png" alt="">LOGO</div>-->

        <h6>Cadastre-se :</h6>

        <form action="verifica_cadastro_usuario.php" id="cadastro-form" method="POST">
            <?php

                if (isset($_SESSION['teste_nome_cd'])) {

                    $teste_nome_cd = $_SESSION['teste_nome_cd'];

                    if ($teste_nome_cd == 1) {

                        echo'
                        <div class="texto red">
                            <input type="text" placeholder="Nome do usuário ja existente" name="nome" id="nome" required="required" minlength="4" maxlength="15" pattern="[a-zA-Z]{4,15}" title="Usando letras como A(a) ate z(z)">
                            <span class=" check-message hidden">Required</span>
                        </div>
                    ';

                    }else{
                        echo'
                            <div class="texto">
                                <input type="text" placeholder="Nome do usuário" name="nome" id="nome" required="required" minlength="4" maxlength="15" pattern="[a-zA-Z]{4,15}" title="Usando letras como A(a) ate z(z)">
                                <span class=" check-message hidden">Required</span>
                            </div>
                        ';
                        
                    }
                }else{

                    echo'
                        <div class="texto">
                            <input type="text" placeholder="Nome do usuário" name="nome" id="nome" required="required" minlength="4" maxlength="15" pattern="[a-zA-Z]{4,15}" title="Usando letras como A(a) ate z(z)">
                            <span class=" check-message hidden">Required</span>
                        </div>
                    ';

                }

            ?>
            <?php

                if (isset($_SESSION['teste_email_cd'])) {

                    $teste_email_cd = $_SESSION['teste_email_cd'];

                    if ($teste_email_cd == 1) {

                        echo'
                            <div class="texto red">
                                <input type="text" placeholder="Email ja existente" name="email" id="email" required="required" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}" minlength="10" maxlength="50" title="Por favor seguir o exemplo: usuario@gmail.com">
                                <span class="check-message hidden">Required</span>
                            </div>
                        ';
                            
                    }else{
                        echo'
                            <div class="texto">
                                <input type="text" placeholder="Email do usuário" name="email" id="email" required="required" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}" minlength="10" maxlength="50" title="Por favor seguir o exemplo: usuario@gmail.com">
                                <span class="check-message hidden">Required</span>
                            </div>
                        ';
                        
                    }
                }else{

                    echo'
                        <div class="texto">
                            <input type="text" placeholder="Email do usuário" name="email" id="email" required="required" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}" minlength="10" maxlength="50" title="Por favor seguir o exemplo: usuario@gmail.com">
                            <span class="check-message hidden">Required</span>
                        </div>
                    ';

                }

            ?>

            <div class="texto">
                <input type="password" name="senha1" id="senha1" placeholder="Senha" minlength="4" title = "A senha deve possuir no minimo 4 digitos">
                <span class="check-message hidden">Required</span>
                <!--<i class="fa fa-eye ver_senha" aria-hidden="true" id="eye1"></i>-->
            </div>

            <div class="texto">
                <input type="password" name="senha2" id="senha2" placeholder="Repita a senha" minlength="4" title = "Caso a senha não seja a mesma não sera possuivel cadastrar">
                <span class="check-message hidden">Required</span>
                <!--<i class="fa fa-eye ver_senha" aria-hidden="true" id="eye2"></i>-->
            </div>

            <input type="submit" value="Cadastrar agora" class="cadastro-btn" name="btn-cadastro" id="btn-cadastro" disabled>

        </form>

        <div class="dont-have-account">
            Quer voltar para a pagina de login?
            <a href="logar.php">Ir para o login</a>
        </div>
    </div>

    <script type="text/javascript">
        $(".texto input").focusout(function() {
            if ($(this).val() == "") {
                $(this).siblings().removeClass("hidden");
                $(this).css("background", "#554343");

            } else {
                $(this).siblings().addClass("hidden");
                $(this).css("background", "rgba(96, 67, 51, 0.9)");
            }

        });

        $(".texto input").keyup(function() {
            var inputs = $(".texto input");
            if (inputs[0].value != "" && inputs[1].value && inputs[2].value && inputs[3].value && inputs[2].value == inputs[3].value) {
                $(".cadastro-btn").attr("disabled", false);
                $(".cadastro-btn").addClass("active");
            } else {
                $(".cadastro-btn").attr("disabled", true);
                $(".cadastro-btn").removeClass("active");
            }

        });

        var pwd1 = document.getElementById('senha1');
        var pwd2 = document.getElementById('senha2');

        var eye1 = document.getElementById('eye1');
        var eye2 = document.getElementById('eye2');

        eye1.addEventListener('click', trocar_senha1);
        eye2.addEventListener('click', trocar_senha2);

        function trocar_senha1() {

            eye1.classList.toggle('active');

            (pwd1.type == 'password') ? pwd1.type = "text":
                pwd1.type = 'password';
        }

        function trocar_senha2() {

            eye2.classList.toggle('active');

            (pwd2.type == 'password') ? pwd2.type = "text":
                pwd2.type = 'password';
        }
    </script>

</body>

</html>