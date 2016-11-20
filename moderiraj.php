<?php
  include("connect.php");
  include ("header.php"); 
	if (session_id() == "")
  {
  	session_start();
  }
	
  echo "<table>";
  if(isset($_SESSION['tip_id'])){
    //ako je admin, omoguci izmjenu prava
    if($_SESSION['tip_id']==0){
      
      $sql ="select * from kategorija order by naziv ASC";
      $res= mysql_query($sql) or die(mysql_error());
      
      while($row = mysql_fetch_assoc($res)){
        $naziv = $row['naziv'];
        $kategorija = $row['kategorija_id'];
        echo "<tr><td> $naziv</td><td><a href='dodaj_prava.php?r=".$kategorija."'><span>Popis dokumenata</span></a></td>";
      }
    }
  }

  $sql ="select * from kategorija where korisnik_id='".$_SESSION['korisnik_id']."' order by naziv desc";
  $res= mysql_query($sql) or die(mysql_error());

  while($row = mysql_fetch_assoc($res)){
    
    $kategorija = $row['kategorija_id'];
    $naziv = $row['naziv'];
    $korisnik_id = $row['korisnik_id'];
    
    if($kategorija){
    
      echo "<tr><td> $naziv</td><td><a href='dodaj_prava.php?r=".$kategorija."'><span>Popis dokumenata</span></a></td></tr>";
      
    }
    
  }
  
  
  echo "</table>";
?>
 </form>
</div>

