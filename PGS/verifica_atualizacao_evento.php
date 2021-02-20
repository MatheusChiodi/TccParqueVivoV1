<?php

    session_start();
    
    include('conect.php');

	$id_evento = $_SESSION["id_evento"];
	$tabela = $_SESSION["tabela"];
	$nome_parceiro_evento = $_POST['nome_parceiro_evento'];
    $telefone_evento = $_POST['telefone_evento'];
    $face_evento = $_POST['face_evento'];
    $insta_evento = $_POST['insta_evento'];
    $nome_evento = $_POST['nome_evento'];
    $data_evento = $_POST['data_evento'];
    $horario_inicio_evento = $_POST['horario_inicio_evento'];
    $duracao_evento = $_POST['duracao_evento'];
    $local_evento = $_POST['local_evento'];
    $descricao_evento = $_POST['descricao_evento'];
    $publico_alvo_evento = $_POST['publico_alvo_evento'];
    $solic_levar_algo_evento = $_POST['solic_levar_algo_evento'];
    $solic_suporte_evento = $_POST['solic_suporte_evento'];
    $evento_voluntario_periodico_evento = $_POST['evento_voluntario_periodico_evento'];
    $comentarios_adicionais_evento = $_POST['comentarios_adicionais_evento'];
    $nome_voluntario_evento = $_POST['nome_voluntario_evento'];
    $teste_nome_evento = true;
    $teste_data_evento = true;
    $teste_hora_evento = true;

    $SQL1 = "select * from evento";
    $resultado1 = mysqli_query($conect,$SQL1);
    
    $SQL2 = "select * from usuario";
    $resultado2 = mysqli_query($conect,$SQL2);
    
    do{
        $registro1 = mysqli_fetch_assoc($resultado1);
        $registro2 = mysqli_fetch_assoc($resultado2);
		if(($nome_evento == $registro1["nome_evento"])&&($registro1["id_evento"] != $id_evento)){

            echo"nome_erro";
            $teste_nome_evento = false;

        }
        if($data_evento == $registro1["data_evento"]){

            echo"mesma data";
            $teste_data_evento = false;

            if(($horario_inicio_evento >= $registro1["horario_inicio_evento"])&&($horario_inicio_evento <= $registro1["duracao_evento"])&&($registro1["id_evento"] != $id_evento)){
                if(($duracao_evento >= $registro1["horario_inicio_evento"])&&($registro1["id_evento"] != $id_evento)){

                    $teste_hora_evento = false;
                    echo"<br />não foi cadastrado o evento, ja existe algum evento nesse horario";

                }

            }

            
        }
    }while($registro1 != null);
		
	if(($teste_nome_evento == true)&&($teste_data_evento == true)&&($teste_hora_evento == true)){
	
        $update = '
            update '.$tabela.' 
            set nome_parceiro_evento = "'.$nome_parceiro_evento.'" 
            ,telefone_evento = "'.$telefone_evento.'"
            ,face_evento = "'.$face_evento.'"
            ,insta_evento = "'.$insta_evento.'"
            ,nome_evento = "'.$nome_evento.'"
            ,data_evento = "'.$data_evento.'"
            ,horario_inicio_evento = "'.$horario_inicio_evento.'"
            ,duracao_evento = "'.$duracao_evento.'"
            ,local_evento = "'.$local_evento.'"
            ,descricao_evento = "'.$descricao_evento.'"
            ,publico_alvo_evento = "'.$publico_alvo_evento.'"
            ,solic_levar_algo_evento = "'.$solic_levar_algo_evento.'"
            ,solic_suporte_evento = "'.$solic_suporte_evento.'"
            ,evento_voluntario_periodico_evento = "'.$evento_voluntario_periodico_evento.'"
            ,comentarios_adicionais_evento = "'.$comentarios_adicionais_evento.'"
            ,nome_voluntario_evento = "'.$nome_voluntario_evento.'"
            WHERE id_evento = "'.$id_evento.'";';

            $resultado = mysqli_query($conect,$update);

            $_SESSION['teste_verificacao_evento'] = 0;
            $_SESSION['teste_nome_evento'] = 0;
            $_SESSION['teste_data_evento'] = 0;
            $_SESSION['teste_hora_evento'] = 0;

            echo "<br />todos os dados estavam corretos";

		header("Location: evento_cadastrados_usu");
			
    }
	
	if(($teste_nome_evento == false)||($teste_data_evento == false)||($teste_hora_evento == false)){

        $_SESSION['teste_nome_evento'] = 1;
        $_SESSION['teste_data_evento'] =  1;
        $_SESSION['teste_hora_evento'] = 1;
        $_SESSION['teste_verificacao_evento'] = 1;

        echo "<br />entrou na verificação false";

        header("Location: cadastro_evento.php");

    }
	
	mysqli_close($conect);
?>