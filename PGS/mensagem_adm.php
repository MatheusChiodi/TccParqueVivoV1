<?php

session_start();

?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
    <title>CHAT ADM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/TCC/css/style_mensagem_adm.css" type="text/css" />

</head>

<script>
    //setTimeout(function() {
       // window.location.reload(1);
    //}, 5000); // 5 segundos
  // ligar antes de acabar tudo ---------------------------------------------------
    

    function enviar() {
        var mensagem = document.getElementById("mensagem").value;
        
        $(document).ready(function(){

            if (mensagem == "") {

            } 
            else {
                
                $.ajax({ //iniciando o ajax
                    method: 'POST', // método
                    url: 'enviar.php', //destino
                    data: {
                        'mensagem': mensagem
                    }, //você só pode enviar numeros interiros
                    success: function(resposta) {
                        
                        console.log(resposta)
                        window.location.reload;

                    }
                });
                
            }
           

        });
            
    }

</script>

<body>

    <?php

        if(!isset($_SESSION['visitante'])){

            $usuario = $_COOKIE["email_usuario"];
            include "../js/func.inc";
            verifica_login1();
            teste_data_hora_nome_evento();

            $adm = $_SESSION['adm'];

            if($usuario != $adm){
                include('nav_usu.inc');
            }else{
                include('nav_adm.inc');
            }

        }else{

            include('nav_visitante.inc');

        }

    ?>

    <div class="table table-responsive overflow-x:auto;">
    
        <table>
            <thead>
                <tr>
                    <th class = "table_titulo">Usuario que mandaram mensagens: </th>
                </tr>
            </thead>

            <tbody> 

                <?php

                    $logado = $_COOKIE["email_usuario"];

                    include('conect.php');

                    $SQL1 = "
                    select usuario.nome_usuario,mensagem_adm_usuario.email_usuario_mensagem_de
                    from usuario,mensagem_adm_usuario
                    where usuario.email_usuario like mensagem_adm_usuario.email_usuario_mensagem_de
                    and mensagem_adm_usuario.email_usuario_mensagem_de <> '".$logado."'
                    GROUP BY mensagem_adm_usuario.email_usuario_mensagem_de;";


                    $resultado1 = mysqli_query($conect,$SQL1);

                    do{
                        $registro1 = mysqli_fetch_assoc($resultado1);
                        if($registro1['email_usuario_mensagem_de'] != null){	
                            echo'
                                <tr>
                                    <td class = "table_item"><a href="mensagem_adm_chat.php?usu_select='.$registro1["email_usuario_mensagem_de"].'">'.$registro1["email_usuario_mensagem_de"].'</a></td>
                                </tr>
                            ';
                        }
                        
                    }while($registro1 != null);
                
                ?>

            </tbody> 
        </table>

    </div>

</body>

</html>