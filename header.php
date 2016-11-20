<?php

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Online dokumenti</title>
  <body>

    <div class="container">
      <div class="header">
      
       
      </div>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
        <form class="form-signin" role="form" method="post" >
    <div class="kontenjer">
    <a  href="index.php" role="button"><span title='Home'  class="glyphicon glyphicon-home"></span></a>
    <a  href="popis.php" role="button" ><span title='Popis dokumenata' class="glyphicon glyphicon-list-alt" ></span></a>
        <?php
      if(isset($_SESSION['korisnicko_ime'])) {
    echo "<tr><td><a  href='odjava.php' role='button'><span title='Odjava' class='glyphicon glyphicon-remove-circle' ></span></a></td></tr>";
    echo "<br><h4>Ulogirani ste kao :".$_SESSION['korisnicko_ime']."<h4></br>";
    }
    ?>
    
        