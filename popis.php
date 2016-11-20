
<?php
  include("connect.php");
	if (session_id() == ""){
  	session_start();
  }
	include ("header.php");     


   
  echo "<table>";

  //svim ulogiranim korisnicima omoguci kreiranje dokumenta
  if(isset($_SESSION['korisnicko_ime'])) {
    echo "<tr><td><a href='kreiraj_dokument.php'><span>Kreiraj dokument</span></a></td></tr>";
  }
  
  //ako je moderator, omoguci mjenjanje moderiranje
  if(isset($_SESSION['tip_id'])){
    if($_SESSION['tip_id']==1){
      echo "<tr><td><h5><a href='moderiraj.php'><span>Moderiraj</span></a></td></tr>";
    }
  }
  
  //ako je admin, moderiranje i admin
  if(isset($_SESSION['tip_id'])){
    if($_SESSION['tip_id']==0){
       echo "<tr><td><a href='admin.php'><span>Admin sučelje</span></a></td></tr>";
       echo "<tr><td><a href='moderiraj.php'><span>Moderiraj</span></a></td></tr>";
    }
  }
  
  echo "</table>" ;
  echo "<br><h4>Popis dokumenata:<h4></br>";
  echo "<table>" ;
  
	echo "<tr><tr><td><b>Kategorija</b></td><td><b>Naziv dokumenta</b></td></tr></tr>";
	$sql = "SELECT dokument_id,kategorija.naziv,dokument.naziv_dokumenta  FROM kategorija join dokument on kategorija.kategorija_id = dokument.kategorija_id order by naziv_dokumenta asc";
	$res= mysql_query($sql) or die(mysql_error());

  //prikazi sve dokumente
	while($row = mysql_fetch_assoc($res)){
	  
    $naziv_kategorije = $row['naziv'];
    $naziv_dokumenta = $row['naziv_dokumenta'];
    $dokument_id = $row['dokument_id'];
    echo "<tr><td> $naziv_kategorije</td><td> $naziv_dokumenta</td>";
    
    //ako je admin omoguci izmjenu kategorije dokumenta
    if(isset($_SESSION['tip_id'])){
      if($_SESSION['tip_id']==0){
        echo "<td><a href='admin_uredi.php?r=".$dokument_id."''><span>Promjeni kategoriju</span></a></td>";
      }
    }
    if(isset($_SESSION['korisnicko_ime'])) {
      $sql2 = "SELECT vrsta_prava FROM prava where korisnik_id='".$_SESSION['korisnik_id']."' AND dokument_id ='".$dokument_id."' ";
      $res2= mysql_query($sql2) or die(mysql_error());
      if (mysql_num_rows($res2) >0) {
        while($row = mysql_fetch_assoc($res2)){
          $prava = $row['vrsta_prava'];
          if ($prava ==1){
            echo "<td><a href='dokumenti.php?r=".$dokument_id."'><span>Uredi ili pročitaj</span></a></td><td><a href='brisanje.php?r=".$dokument_id."'><span>Obriši</span></a></td>";
          }
          if ($prava ==2){
            echo "<td><a href='uredi.php?r=".$dokument_id."'><span>Uredi tuđi dokument</span></a></td>";
          }
          if($prava ==3){
            echo "<td><a href='procitaj.php?r=".$dokument_id."'><span>Pročitaj</span></a></td>";
          }
        }
      }   
	  }
  }
  echo "</table>";
  


?>



  
<?php
  if(isset($_SESSION['korisnicko_ime'])) {
  
    //forma za upit
    echo "<br>";
    echo "<h3>Pronadi svoj dokument po imenu:</h3>";
    echo "<form method=\"POST\" >";
    echo "<input type=\"text\"  name=\"kveri_doc\" />";
    echo "<input type=\"submit\" value=\"Trazi\" name=\"izvrseno_pretrazivanje\" />";
    echo "</form>";
 
    
    //pretrazi bazu po naslovu u slucaju da je postavljen upit
    if (isset($_POST['kveri_doc'] )){
    
    $vrijednost = $_POST['kveri_doc'];
    
    if(strlen($vrijednost)>0)
    {
      $sql_search = "SELECT d.naziv_dokumenta FROM dokument d INNER JOIN prava p ON p.dokument_id = d.dokument_id  WHERE p.korisnik_id = ".$_SESSION['korisnik_id']." AND d.naziv_dokumenta LIKE '%{$vrijednost}%' AND p.vrsta_prava=1";
      
      $res2= mysql_query($sql_search) or die(mysql_error());
      
        if (mysql_num_rows($res2) >0) {
        
        echo "<h4>Pronadeni dokumenti od korisnika ".$_SESSION['korisnicko_ime']." da sadrzi '".$vrijednost."':</h4>";
        echo "<br>";
        echo "<h4><b>Naziv dokumenta</b></h4>";
          while($red = mysql_fetch_array($res2))
          {
            echo "<h5><b>$red[0]</b></h5>";
          }
        
        }
        else
        {
           echo "<h4>Nije pronaden dokument od korisnika ".$_SESSION['korisnicko_ime']." da sadrzi '".$vrijednost."'</h4>";
        
        }
    }
  }
}
?>

