<?php

session_start();

    include('conect.php');

    $mensagem = $_POST['mensagem'];
    
    $usu_select = $_SESSION["usu_select"];
    $ins =  "
            insert into mensagem_adm_usuario(email_usuario_mensagem_de,email_usuario_mensagem_para,conteudo_mensagem)
            value('adm@adm.com','" .$usu_select. "','". $mensagem ."');
        ";
    $resultado = mysqli_query($conect, $ins);
    print $ins;

    mysqli_close($conect);
?>