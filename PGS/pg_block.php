<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Entrando...</title>
    <script src="arquivos/jquery.min.js"></script>
    <link rel="stylesheet" href="/TCC/css/style_block.css" type="text/css" />
</head>


<body>
    </div class="loading2">
    <div class="loading">
        <span id="login">
        
            <?php

                $ip_usuario_logado = $ip_tentativa = $_SERVER['REMOTE_ADDR'];

                include('conect.php');

                $SQL = "select * from tentativa_login";

                $resultado = mysqli_query($conect, $SQL);

                do {
                    $registro = mysqli_fetch_assoc($resultado);

                    if ($registro["ip_tentativa"] == $ip_usuario_logado) {

                    date_default_timezone_set('America/Sao_Paulo');
                    $date = date(' Y-m-d H:i:s');
                    echo $date;
                    $ultimo_erro = $registro["data_hora_tentativa"];
                    echo $ultimo_erro;
                    $tempo_restante = $date - $ultimo_erro;
                    echo $tempo_restante;
                    break;
                    }
                } while ($registro != null);
                  
            ?>
    
        </span>
    </div>
    </div>
</body>

</html>

<script language="JavaScript">
    
</script>