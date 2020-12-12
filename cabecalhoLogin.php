<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>    
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="js/jquery.min.js">
  <link rel="stylesheet" href="css/estilo.css">
  <script>
    $("#btnLogin").click(function(event) {

    //Fetch form to apply custom Bootstrap validation
    var form = $("#formLogin")

    if (form[0].checkValidity() === false) {
      event.preventDefault()
      event.stopPropagation()
    }

    form.addClass('was-validated');
    });

  </script>
</head>
<body class="bg-fretecargas">

<div class="container">