<?php

function verifica_login1() {
    /*verifica para ver o usuario esta logado caso ele não esteja a pg volta para
                               parte de logar*/

    if(!isset($_SESSION['logado'])) {

        header("Location: logar.php");

    }

}

function verifica_login2() {
    /*verifica para ver o usuario esta logado caso esteja as pgs acessas de realizar o login
                               não podem ser acessadas novamente (para acessalas o usuario teria q deslogar)*/

    if (isset($_SESSION['logado'])) {

        header("Location:pg_inicial.php");

    }

}

function teste_data_hora_nome_evento(){

     if (isset($_SESSION['teste_data_hora_evento'])&&($_SESSION['teste_data_hora_evento'] == false)) {

        $_SESSION['teste_data_hora_evento'] = true;

    }

    if (isset($_SESSION['teste_nome_evento'])&&($_SESSION['teste_nome_evento'] == false)) {

        $_SESSION['teste_nome_evento'] = true;

    }

}

/*
function carregar_chat(){

    echo'
        <div class="modal fade" id="chat" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content chat">
                    <div class="modal-header">
                        <h5 class="modal-title contato centro" id="TituloModalCentralizado">(usuario que foi clicado)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					  <span aria-hidden="true">&times;</span>
					</button>
                    </div>

                    <div class="modal-body">';

                        $email_usuario_clicado = usuario_que_foi_clicado;
                        $teste = true;

                        include('conect.php');

                        $SQL = "select * from mensagem_adm_usuario";

                        $resultado = mysqli_query($conect, $SQL);

                            do {
                                $registro = mysqli_fetch_assoc($resultado);

                                if(($registro["email_usuario_mensagem_de"] == $email_usuario)||($registro["email_usuario_mensagem_para"] == $email_usuario)) {
                                    echo '

                                        <tr>
                                        
                                            <td>'. $registro["conteudo_mensagem"].'</td>
                                        
                                        </tr>

                                    ';
                                    
                                    
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

                    echo'
                        </div>
                        <tr>
                            <th>
                                <input type="text" name="mensagem" id="mensagem" required="required" value = "" />
                                <button onclick="enviar();">Enviar</button>
                                <!--<input type="hidden" name="env" value="env" id="env" />-->
                            </th>
                        </tr>

                    </div>

                </div>
            </div>
        </div>';

}
 */
?>