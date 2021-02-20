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
    <title>HOME</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/TCC/css/style_pg_inicial.css" type="text/css" />
</head>

<body id="page-top">
        
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
    <div class = "conteudo">
        <div class="container-fluid p-0 c1">
                <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="1">
                    <div class="w-100">
                    </div>
                </section>
                <hr class="m-0">
            </div>

            <div class="container-fluid p-0 c2">
                <section class="resume-section p-1 p-lg-5 d-flex align-items-center" id="1">
                    <div class="w-100 ">
                        <h1 class="mb-0 tl">Afim de se divertir na natureza? </h1>
                        <h2 class="mb-0 sbtl">Conheça um pouco mais sobre nosso projeto</h2>
                        <button type="button" class="btn bt t_busca " data-toggle="modal" data-target="#txt1">
                            <img src="/TCC/imagem/pg1" width="25" height="25" class = "border linksimg lk1">		
                        </button>
                        <button type="button" class="btn bt t_busca " data-toggle="modal" data-target="#txt2">
                            <img src="/TCC/imagem/pg2" width="25" height="25" class = "border linksimg lk2">		
                        </button>
                    </div>
                </section>
                <hr class="m-0">
            </div>

            <div class="container-fluid p-0 c3">
                <section class="resume-section p-1 p-lg-5 d-flex align-items-center" id="1">
                    <div class="w-100">
                    <h1 class="mb-0 tl">Conheça alguns de nossos eventos</h1>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100 slides" src="/TCC/imagem/slide1" alt="Primeiro Slide">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100 slides" src="/TCC/imagem/slide2" alt="Segundo Slide">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100 slides" src="/TCC/imagem/slide3" alt="Terceiro Slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev preto" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon preto" aria-hidden="true"></span>
                            <span class="sr-only preto">Anterior</span>
                        </a>
                        <a class="carousel-control-next preto" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon preto" aria-hidden="true"></span>
                            <span class="sr-only preto">Próximo</span>
                        </a>
                    </div>

                    </div>
                </section>
                <hr class="m-0">
            </div>

            <div class="container-fluid p-0 c4">
                <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="1">
                    <div class="w-100 rodape">
                        <div class="container">
                            <div class="row">
                                <div class="col-6 col-md-4 tlrodape">
                                    
                                </div>
                                <div class="col-6 col-md-4 subtlrodape">
                                    Contatos
                                </div>
                                <div class="col-6 col-md-4 subtlrodape">
                                    Redes Sociais
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-4 conteudorodape">
                                
                                </div>
                                <div class="col-6 col-md-4 conteudorodape">
                                    parquevivoararaquara@gmail.com
                                </div>
                                <div class="col-6 col-md-4 conteudorodape">
                                    <a href="https://www.facebook.com/parquevivoararaquara"><img src="/TCC/imagem/facebook" class = "icon"></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-4 conteudorodape">
                                
                                </div>
                                <div class="col-6 col-md-4 conteudorodape">
                
                                </div>
                                <div class="col-6 col-md-4 conteudorodape">
                                    <a href="https://www.instagram.com/parquevivoararaquara/"><img src="/TCC/imagem/instagram" class = "icon"></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-4 conteudorodape">
                                
                                </div>
                                <div class="col-6 col-md-4 conteudorodape">
                
                                </div>
                                <div class="col-6 col-md-4 conteudorodape">
                                    <a href="https://www.arq.ifsp.edu.br/"><img src="/TCC/imagem/ifsp" class = "icon"></a>
                                </div>
                            </div>
                            <br/><br/>
                            <div class="row">
                                <div class="col-6 col-md-4 tlrodape">
                                    Parque Vivo
                                </div>
                                <div class="col-6 col-md-4 subtlrodape">
                                    Membros do TCC
                                </div>
                                <div class="col-6 col-md-4 conteudorodape">
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-4 conteudorodape">
                                
                                </div>
                                <div class="col-6 col-md-4 conteudorodape">
                                    miguel.andrade@aluno.ifsp.edu.br
                                </div>
                                <div class="col-6 col-md-4 conteudorodape">
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-4 conteudorodape">
                                
                                </div>
                                <div class="col-6 col-md-4 conteudorodape">
                                    matheuschiodi20@gmail.com
                                </div>
                                <div class="col-6 col-md-4 conteudorodape">
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-4 conteudorodape">
                
                                </div>
                                <div class="col-6 col-md-4 conteudorodape">
                                    yasmin.lima@aluno.ifsp.edu.br
                                </div>
                                <div class="col-6 col-md-4 conteudorodape">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <hr class="m-0">
            </div>

            <!-- TEXTO DE CADA IMAGEM -------------------->

            <div class="modal fade ctlink" id="txt1" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content backgroudlink">
                        <div class="modal-header">
                            <h5 class="modal-title titulolink" id="TituloModalCentralizado">Sobre o Parque Vivo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>

                        <div class="modal-body">

                        <p class = "conteudolink text-justify">
                            É um projeto criado por meio da iniciativa popular
                            , no qual busca a revitalização de parques públicos
                            a fim de torná-los ambientes mais convidativos, 
                            dinâmicos e familiares através de atividades 
                            semanais no Parque Botânico
                        </p>
                            
                        </div>

                    </div>
                </div>
            </div>


            <div class="modal fade ctlink" id="txt2" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content backgroudlink">
                        <div class="modal-header">
                            <h5 class="modal-title titulolink" id="TituloModalCentralizado">Sobre TCC</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>

                        <div class="modal-body">

                        <p class = "conteudolink text-justify">
                            O propósito desse trabalho é colaborar com a organização,
                            divulgação e expansão das ações do projeto “Parque Vivo”,
                            a partir do desenvolvimento de um sistema web que visa 
                            auxiliar na parte técnica promovendo melhorias no planejamento
                            de eventos e cadastro de voluntarios. Nosso intuito é que essa
                            ferramenta possa favorecer e (quiçá) ampliar as ações no 
                            “Parque Botânico” para que que mais pessoas desfrutem,
                            sensibilizem-se, apoiem, concebam e priorizem estratégias
                            e ações que visem promover a conexão ou reconexão da 
                            população de Araraquara (e região) com suas áreas verdes
                            e ampliem sua qualidade de vida.
                        </p>
                            
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</body>

</html>