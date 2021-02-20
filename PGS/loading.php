
<?php

session_start();
include "../js/func.inc";
verifica_login2();

?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Entrando...</title>
    <script src="arquivos/jquery.min.js"></script>
    <link rel="stylesheet" href="/TCC/css/style_loading.css" type="text/css" />
</head>

<body>
    <div class = "fundo">

        <div class="container">
            <span class="text1 neon1" data-text = "Parque">Parque</span>
            <span class="text2 neon2" data-text = "Vivo">Vivo</span>
        </div>

        </div class="loading2">
            <div class="loading">
                <span id="login" class = "neon2">Entrando...</span>
            </div>
        </div>
    </div>
</body>

</html>

<script language="JavaScript">
    setTimeout("document.location = 'logar.php'", 4000);
</script>