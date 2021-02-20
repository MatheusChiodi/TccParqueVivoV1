<?php

session_start();

?>


<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
    <title>ATUALIZAR EVENTO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/TCC/css/style_atualizar_eventos.css" type="text/css" />
</head>

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

<br /><br /><br /><br /><br />

<body>

<div class="container-fluid p-0">
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="1">
        <div class="w-100">
            <?php

                $id_evento = $_GET["id_evento"];
                $tabela = $_GET["tabela"];

                $_SESSION["id_evento"] = $id_evento;
                $_SESSION["tabela"] = $tabela;

                include('conect.php');
                $SQL1 = '
                    select *
                    from '.$tabela.'
                    where id_evento like '.$id_evento.';
                ';
                $resultado1 = mysqli_query($conect,$SQL1);
                
                echo'<div class="cadastro-form">

                    <h6>Atualizar evento:</h6>

                    <form action="verifica_atualizacao_evento.php" id="cadastro-form" method="POST">';


                    do{
                        $registro1 = mysqli_fetch_assoc($resultado1);
                        if($registro1['id_evento'] != null){
                            echo'

                                <div class="texto">
                                    <input type="text" placeholder="Qual é o seu evento?" name="nome_evento" id="nome_evento" required="required" minlength="4" maxlength="15" pattern="[a-zA-Z]{4,15}" title="Usando letras como A(a) ate z(z)" value ="'.$registro1['nome_evento'].'">
                                    <span class=" check-message hidden"></span>
                                </div>

                                <div class="texto">
                                    <input type="text" placeholder="Qual é o nome do parceiro do evento?" name="nome_parceiro_evento" id="nome_parceiro_evento" required="required" minlength="4" maxlength="15" pattern="[a-zA-Z]{4,15}" title="Usando letras como A(a) ate z(z)" value ="'.$registro1['nome_parceiro_evento'].'">
                                    <span class=" check-message hidden"></span>
                                </div>

                                <div class="texto">
                                    <input type="tel" placeholder="Qual é seu telefone?" name="telefone_evento" id="telefone_evento" required="required" minlength="4" maxlength="20" value ="'.$registro1['telefone_evento'].'">
                                    <span class=" check-message hidden"></span>
                                </div>

                                <div class="texto">
                                    <input type="text" placeholder="Qual é o nome da pagina do facebook do evento?" name="face_evento" id="face_evento" required="required" minlength="4" maxlength="15" pattern="[a-zA-Z]{4,15}" title="Usando letras como A(a) ate z(z)" value ="'.$registro1['face_evento'].'">
                                    <span class=" check-message hidden"></span>
                                </div>

                                <div class="texto">
                                    <input type="text" placeholder="Qual é o nome do instragram do evento?" name="insta_evento" id="insta_evento" required="required" minlength="4" maxlength="15" pattern="[a-zA-Z]{4,15}" title="Usando letras como A(a) ate z(z)" value ="'.$registro1['insta_evento'].'">
                                    <span class=" check-message hidden"></span>
                                </div>

                                <div class="texto">
                                    <input type="date" placeholder="Qual é data do evento?" name="data_evento" id="data_evento" required="required" minlength="4" maxlength="15" pattern="[a-zA-Z]{4,15}" title="Usando letras como A(a) ate z(z)">
                                    <span class=" check-message hidden"></span>
                                </div>

                                <div class="texto">
                                    <input type="time" placeholder="Qual é horario de inicio do evento?" name="horario_inicio_evento" id="horario_inicio_evento" required="required" minlength="4" maxlength="15" pattern="[a-zA-Z]{4,15}" title="Usando letras como A(a) ate z(z)" >
                                    <span class=" check-message hidden"></span>
                                </div>

                                <div class="texto">
                                    <input type="time" placeholder="Qual é horario de finalização do evento?" name="duracao_evento" id="duracao_evento" required="required" minlength="4" maxlength="15" pattern="[a-zA-Z]{4,15}" title="Usando letras como A(a) ate z(z)">
                                    <span class=" check-message hidden"></span>
                                </div>

                                <div class="texto">
                                    <input type="text" placeholder="Onde será realizado o evento?" name="local_evento" id="local_evento" required="required" minlength="4" maxlength="15" pattern="[a-zA-Z]{4,15}" title="Usando letras como A(a) ate z(z)" value ="'.$registro1['local_evento'].'">
                                    <span class=" check-message hidden"></span>
                                </div>

                                <div class="texto">
                                    <input type="text" placeholder="Descreva o evento" name="descricao_evento" id="descricao_evento" required="required" minlength="10" maxlength="30" title="Usando letras como A(a) ate z(z)" value ="'.$registro1['descricao_evento'].'">
                                    <span class=" check-message hidden"></span>
                                </div>

                                <div class="texto">
                                    <input type="text" placeholder="Qual é o publico alvo do evento?" name="publico_alvo_evento" id="publico_alvo_evento" required="required" minlength="4" maxlength="15" pattern="[a-zA-Z]{4,15}" title="Usando letras como A(a) ate z(z)" value ="'.$registro1['publico_alvo_evento'].'">
                                    <span class=" check-message hidden"></span>
                                </div>

                                <div class="texto">
                                <select class="form-control" id="solic_levar_algo_evento" name="solic_levar_algo_evento">
                                    <option value="pergunta">Precisa de algo para o evento?</option>
                                    <option value="sim">Sim</option>
                                    <option value="nao">Não</option>
                                </select>
                                <span class=" check-message hidden"></span>
                            </div>
    
                            <div class="texto">
                                <select class="form-control" id="solic_suporte_evento" name="solic_suporte_evento">
                                    <option value="pergunta">Precisa de algum suporte para o evento?</option>
                                    <option value="sim">Sim</option>
                                    <option value="nao">Não</option>
                                </select>
                                <span class=" check-message hidden"></span>
                            </div>
    
                            <div class="texto">
                                <select class="form-control" id="evento_voluntario_periodico_evento" name="evento_voluntario_periodico_evento">
                                    <option value="pergunta">Precisa de algum voluntario para o evento?</option>
                                    <option value="sim">Sim</option>
                                    <option value="nao">Não</option>
                                </select>
                                <span class=" check-message hidden"></span>
                            </div>

                                <div class="texto">
                                    <input type="text" placeholder="Possui algum comentario para o evento?" name="comentarios_adicionais_evento" id="comentarios_adicionais_evento" required="required" minlength="4" maxlength="15" title="Usando letras como A(a) ate z(z)" value ="'.$registro1['comentarios_adicionais_evento'].'">
                                    <span class=" check-message hidden"></span>
                                </div>

                                <div class="texto">
                                    <input type="text" placeholder="Nome do voluntario do evento?" name="nome_voluntario_evento" id="nome_voluntario_evento" required="required" minlength="4" maxlength="15" pattern="[a-zA-Z]{4,15}" title="Usando letras como A(a) ate z(z)" value ="'.$registro1['nome_voluntario_evento'].'">
                                    <span class=" check-message hidden"></span>
                                </div>
                            ';
                        }
                                    
                    }while($registro1 != null);

                    echo'<input type="submit" value="Atualizar agora" class="cadastro-btn" name="btn-cadastro" id="btn-cadastro" disabled/>';
            ?>
        </div>
    </<section>
</div>     
</body>         

<script type="text/javascript">
        $(".texto input").focusout(function() {
            if ($(this).val() == "") {
                $(this).siblings().removeClass("hidden");
                $(this).css("background", "#554343");

            } else {
                $(this).siblings().addClass("hidden");
                $(this).css("background", "#44d93f");
            }

        });

        $(".texto input").keyup(function() {
            var inputs = $(".texto input");
            if (inputs[0].value != "" && inputs[1].value && inputs[2].value && inputs[3].value && 
            inputs[4].value && inputs[5].value && inputs[6].value && inputs[7].value && 
            inputs[8].value && inputs[9].value && inputs[10].value && inputs[11].value 
            && inputs[12].value) {
                $(".cadastro-btn").attr("disabled", false);
                $(".cadastro-btn").addClass("active");
            } else {
                $(".cadastro-btn").attr("disabled", true);
                $(".cadastro-btn").removeClass("active");
            }

        });

</script>
</html>