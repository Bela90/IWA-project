<?php
include("connect.php");
  
  if (session_id() == "")
  {
    session_start();
  }
	$r=$_GET['r'];

  $sql = "DELETE FROM prava where  dokument_id ='". $r."' ";
	$kveri =mysql_query($sql);
  if ($kveri){
    $sql2 ="DELETE FROM dokument WHERE dokument_id ='". $r."' ";
    $kveri2 =mysql_query($sql2);
    if ($kveri2){
      echo "Uspjesno ste obrisali prava i dokument";
      echo "<meta http-equiv='refresh' content='1; url=popis.php' />";
    }
  }
?>