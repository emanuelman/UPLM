<?php
    session_start();
    unset($_SESSION['id_usuario']);
    header("location: index.php");


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TITULO-->
    <title>UPLM - Universal Programming Language Manager</title>
    <!-- ICONE UPLM-->
    <link rel="shortcut icon" href="img/logoUPLM.png" type="image/x-con">
    <!-- Linkar o html com Css -->
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

         <!-- RODAPÉ --> 
        <footer style="font-size: large;">
            <div class="float-container">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <a href="https://www.instagram.com/startup_uplm/" class="fa fa-instagram" style="margin-right: 500px;"></a>
                <h1-fifth style="margin-left: 10px;">UPLM - Todos os direitos Reservados - 2022</h1-fifth> 
            </div>
        </footer>