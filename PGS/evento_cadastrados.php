<?php

session_start();

?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
    <title>TODOS OS EVENTOS CADASTRADOS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/TCC/css/style_ev_cadastrados.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

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

    <input class="form-control pesquisa" id="myInput" type="text" placeholder="Pesquise seu evento">

    <div class="table table-responsive dados">

        <table>
            <thead>
                <tr>
                    <th colspan = "18" class =" titulo_table">Lista de eventos</th>
                </tr>

                <tr class="centro">
                    <th>id_evento</th>
                    <th>Email evento</th>
                    <th>Nome parceiro do evento</th>
                    <th>Telefone evento</th>
                    <th>Facebook do evento</th>
                    <th>Instagram do evento</th>
                    <th>Nome do evento</th>
                    <th>Data do evento</th>
                    <th>Horario de inicio do evento</th>
                    <th>Horario de termino do evento</th>
                    <th>Local do evento</th>
                    <th>Descricao do evento</th>
                    <th>Publico alvo do evento</th>
                    <th>Solicitação de levar algo para o evento</th>
                    <th>solicitação de suporte para o evento</th>
                    <th>Evento voluntario periodico do evento</th>
                    <th>Comentarios adicionais do evento</th>
                    <th>Nome do voluntario do evento</th>
                </tr>

                </thead>

                <tbody id="myTable"> 

                <?php
                    include('conect.php');

                    $SQL1 = "select * from evento";
                    $resultado1 = mysqli_query($conect,$SQL1);

                    do{
                        $registro1 = mysqli_fetch_assoc($resultado1);
                        if($registro1['email_evento'] != null){	
                            echo'
                                <tr>
                                    <td>'.$registro1["id_evento"].'</td>
                                    <td>'.$registro1["email_evento"].'</td>
                                    <td>'.$registro1["nome_parceiro_evento"].'</td>
                                    <td>'.$registro1["telefone_evento"].'</td>
                                    <td>'.$registro1["face_evento"].'</td>
                                    <td>'.$registro1["insta_evento"].'</td>
                                    <td>'.$registro1["nome_evento"].'</td>
                                    <td>'.$registro1["data_evento"].'</td>
                                    <td>'.$registro1["horario_inicio_evento"].'</td>
                                    <td>'.$registro1["duracao_evento"].'</td>
                                    <td>'.$registro1["local_evento"].'</td>
                                    <td>'.$registro1["descricao_evento"].'</td>
                                    <td>'.$registro1["publico_alvo_evento"].'</td>
                                    <td>'.$registro1["solic_levar_algo_evento"].'</td>
                                    <td>'.$registro1["solic_suporte_evento"].'</td>
                                    <td>'.$registro1["evento_voluntario_periodico_evento"].'</td>
                                    <td>'.$registro1["comentarios_adicionais_evento"].'</td>
                                    <td>'.$registro1["nome_voluntario_evento"].'</td>
                                </tr>
                            ';
                        }
                        
                    }while($registro1 != null);
                
                ?>
            </tbody> 
        </table>

    </div>

</body>

<script>

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

</script>

</html>