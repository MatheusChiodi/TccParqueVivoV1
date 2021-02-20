<?php

session_start();

    include('conect.php');

    $mensagem = $_POST['mensagem'];
    
    $email_usuario = $_COOKIE["email_usuario"];
    $ins =  "
            insert into mensagem_adm_usuario(email_usuario_mensagem_de,email_usuario_mensagem_para,conteudo_mensagem)
            value('" .$email_usuario. "','adm@adm.com','". $mensagem ."');

    
        ";
    $resultado = mysqli_query($conect, $ins);
    print $ins;

    mysqli_close($conect);
?>