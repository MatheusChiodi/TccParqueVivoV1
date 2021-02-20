<?php

session_start();
unset($_SESSION['teste_email']);
unset($_SESSION['teste_senha']);
unset($_SESSION['teste_nome_evento']);
unset($_SESSION['teste_data_evento']);
unset($_SESSION['teste_hora_evento']);
unset($_SESSION['teste_verificacao_evento']);

?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
    <title>MENSAGEM PARA ADM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.ripples/0.5.3/jquery.ripples.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/TCC/css/style_ev_mensagem_usu.css" type="text/css" />

</head>

<style>



</style>

<script>

</script>

<script>
    setTimeout(function() {
        window.location.reload(1);
    }, 5000); // 5 segundos
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

    <div class="mensagem ">
        <form action="" method="POST">
            <table class = "chat">
                <tr>
                    <th class = "titulo_mensagem">Mande mensagem para o adm :</th>
                </tr>
                <div id = "chat_reload" class="chat_reload">
                    <?php

                    $email_usuario = $_COOKIE["email_usuario"];
                    $teste = true;

                    include('conect.php');

                    $SQL = "select * from mensagem_adm_usuario";

                    $resultado = mysqli_query($conect, $SQL);

                    do {
                        $registro = mysqli_fetch_assoc($resultado);

                        if(($registro["email_usuario_mensagem_de"] == $email_usuario)||($registro["email_usuario_mensagem_para"] == $email_usuario)) {
                             
                            if($registro["email_usuario_mensagem_de"] == $usuario){
                                echo '<tr class = "direita">';
                                    echo'<td>'.$registro["conteudo_mensagem"].'</td>';
                                echo'</tr>';
                            }else{
                                echo '<tr class = "esquerda">';
                                    echo'<td>'.$registro["conteudo_mensagem"].'</td>';
                                echo'</tr>';
                            }
                            $teste = false;
                        }
                    } while($registro != null);

                    if ($teste == true) {

                        echo '

                            <tr>
                                    
                                <td>Possuiu alguma duvida?</td>
                                    
                            </tr>

                        ';
                    }

                    ?>
                </div>
                <tr>
                    <th>
                        <input type="text" name="mensagem" id="mensagem" required="required" value = "" />
                        <button class ="enviar" onclick="enviar();">Enviar</button>
                        <!--<input type="hidden" name="env" value="env" id="env" />-->
                    </th>
                </tr>
            </table>
        </form>
    </div>

</body>

</html>