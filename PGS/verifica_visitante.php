<?php

session_start();

$_SESSION['visitante'] = true;

header("Location:pg_inicial.php");

?>