<?php
include("connect.php");
include ("header.php"); 
	if (session_id() == "")
  {
    session_start();
  }
	  
  $r=$_GET['r'];
  
  $sql = "SELECT * FROM dokument where  dokument_id ='". $r."'";
	$res= mysql_query($sql) or die(mysql_error());
	
  while($row = mysql_fetch_assoc($res)){
       $naziv_dokumenta = $row['naziv_dokumenta'];
       $tekst = $row['tekst_dokumenta'];
       echo"<form method='POST' enctype='multipart/form-data' >";
       echo "<table>";
       echo "<tr><td> $naziv_dokumenta</td></tr>";
       echo "<tr><td><textarea name='tekst'>$tekst</textarea></td></tr><tr><td><input type='submit' name ='submit' value='Promjeni'></td></tr>";
       echo "</table";
       echo "</form>";
  }
  
  if (isset($_POST['submit'])){
        
  $tekst = $_POST['tekst'];
  $sql =" Update dokument set tekst_dokumenta ='". $tekst."' where dokument_id='".$r."'";
  $kveri =mysql_query($sql);
         
  }
?>
