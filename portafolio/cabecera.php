<?php 
session_start();
if( isset($_SESSION['usuario'])!="juan pablo"){

    header("location:login.php");

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>portafolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div
    class="container">
    <a href="index.php"> inicio </a> |
    <a href="portafolio.php"> portafolio </a> |
    <a href="cerrar.php"> cerrar </a>
    <br>
   


    