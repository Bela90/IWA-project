<?php
  include("connect.php");
  include ("header.php"); 
	if (session_id() == "")
  {
  	session_start();
  }
  
	echo "<table>";
  
  $r=$_GET['r'];
  $sql = "SELECT naziv_dokumenta,dokument_id from dokument where kategorija_id = '".$r."' order by naziv_dokumenta asc";
	$res= mysql_query($sql) or die(mysql_error());
  while($row = mysql_fetch_assoc($res)){
    $dokument_id = $row['dokument_id'];
    $naziv_dokumenta = $row['naziv_dokumenta'];
    echo "<tr><td> $naziv_dokumenta</td><td><a href='dodaj_prava2.php?r=".$dokument_id."'><span>Dodaj prava</span></a></td>";
  }
  echo "</table>";
?>

