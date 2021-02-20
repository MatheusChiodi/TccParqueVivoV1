<?php

session_start();
include "../js/func.inc";
verifica_login2();

$adm = "adm@adm.com";

$_SESSION['adm'] = $adm;
$_SESSION['teste_nome'] = 2;
$_SESSION['teste_email'] = 2;

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
<html lang="pt-Br" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>LOGIN</title>
		<link rel="stylesheet" href="teste_login.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.ripples/0.5.3/jquery.ripples.min.js"></script>
		
		<link href="/TCC/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

		<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
				
	</head>
	
	<body>
		
		<!-------------------------------------Pagina de entrada---------------------->
		<div class="full-landing-image">
		
			<div class="show-login-btn"><i class="fas fa-sign-in-alt"></i><font color="white">Fazer login</font></div>
			<div class="show-login-btn2"><i class="fas fa-sign-in-alt"><a href = "pg_cadastro.php" style="color: white">  Ainda não possui uma conta ?</a></div>
            <div class="show-login-btn3"><i class="fas fa-sign-in-alt"></i><font color="white"><a href="verifica_visitante.php">Visitar</a></div>
			
			
			<!----------------------------------------------------------------------------->
			
			<!-------------------------------formulario------------------------------------>
			<div class="login-box">
				<div class="hide-login-btn"><i class="fas fa-times"></i></div>
				<form class="login-form" action="verifica_login.php" method="post">
					<p><h1>Pronto ?</h1></p>
					
					 <div class="input-group mb-2 texto">
						<div class="input-group-prepend">
							<div class="input-group-text">@</div>
						</div>
						<?php
							if (isset($_SESSION['teste_usuario'])) {

								$teste_usuario = $_SESSION['teste_usuario'];

								if ($teste_usuario == 1) {

									echo'
										<input type="text" placeholder="Email do usuário não existente" name="email" id="email" required="required" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}" max="50" min="10">
										<span class="check-message hidden">Required</span>
									';

								}
							}else{

								echo'
									<input type="text" placeholder="Email do usuário" name="email" id="email" required="required" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}" max="50" min="10">
									<span class="check-message hidden">Required</span>
								';

							}
							
						?>
					</div>
					<div class="input-group mb-2 texto">
						<div class="input-group-prepend">
							<div class="input-group-text">SENHA</div>
						</div>
						<?php
							if (isset($_SESSION['teste_senha'])) {

								$teste_senha = $_SESSION['teste_senha'];

								if ($teste_senha == 1) {

									echo'
									<input type="password" name="senha" id="senha" placeholder="Senha incorreta" min="3">
									<span class="check-message hidden">Required</span>
									';

								}
							}else{

								echo'
									<input type="password" name="senha" id="senha" placeholder="Senha" min="3">
									<span class="check-message hidden">Required</span>
								';

							}
							
						?>
					</div>
					
					<p>
						<input type="submit" value="Conecte-se agora" class="login-btn" name="btn-login" id="btn-login" disabled>
					</p>
					
				</form>
			</div>
		</div>

    <script type="text/javascript">
	
		$(".show-login-btn").on("click",function(){
		  $(".login-box").toggleClass("showed");
		});
		$(".hide-login-btn").on("click",function(){
		  $(".login-box").toggleClass("showed");
		});
		
		$(".full-landing-image").ripples({
			resolution: 256,
			perturbance: 0.04,
		});

		$(".texto input").focusout(function() {
            if ($(this).val() == "") {
                $(this).siblings().removeClass("hidden");
                $(this).css("background", "#554343");
            } else {
                $(this).siblings().addClass("hidden");
                $(this).css("background", "#484848");
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

  </body>
</html>
