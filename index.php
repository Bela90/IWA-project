<?php
  include("connect.php");
	ob_start();
	if (session_id() == "")
		session_start();

  if(isset($_POST['korisnicko_ime'])) {
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $lozinka = $_POST['lozinka'];
    $upit = "SELECT * FROM korisnik WHERE korisnicko_ime='".$korisnicko_ime."' AND lozinka='".$lozinka."' LIMIT 1"; 
    $res = mysql_query($upit) or die(mysql_error());
    
    if (mysql_num_rows($res) == 1) {
      $row = mysql_fetch_assoc($res);
      $_SESSION['korisnicko_ime'] = $row['korisnicko_ime'];
      $_SESSION['korisnik_id'] = $row['korisnik_id'];
      $_SESSION['tip_id'] = $row['tip_id'];
      echo "uspjesan login";
      header( "Location: popis.php" );
      exit();
    } else {
      echo "<p class='obavijesti'>Pogrešno korisničko ime ili lozinka</p>";
      exit();
    }
  }


?>
<!DOCTYPE html>
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
     <a  href="index.php" role="button"><span title='Home' class="glyphicon glyphicon-home"></span></a>
        <a  href="popis.php" role="button" ><span title='Popis dokumenata' class="glyphicon glyphicon-list-alt" ></span></a>
        <h2 class="form-signin-heading">Login</h2>
        <input type="text" class="form-control" name="korisnicko_ime" id="korisnicko_ime" placeholder="Korisničko ime"  >
        <input type="password" class="form-control" name="lozinka" id="lozinka" placeholder="Šifra" >
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
      </form>
</div></div>
  </body>