<?php
  include ("header.php"); 
  include("connect.php");
  if (session_id() == ""){
    session_start();
  }
  
  if (isset($_POST['submit'])){
    $r=$_GET['r'];
    $moderator = $_POST['moderator'];
    $sql =" Update kategorija set korisnik_id ='". $moderator."' where kategorija_id='".$r."'";
    $kveri =mysql_query($sql);
    if ($kveri){
      echo "<br>Uspješno ste promjenili moderatora";
    }
  }
?>

<form  method='POST'>
<table align='center' id='table1'>
<td><select name='moderator' id='moderator' />
  <?php
  	$sql= "SELECT * FROM korisnik  where tip_id ='1'";
  	$res= mysql_query($sql) or die(mysql_error());
  	echo "<option value='0'>Odaberite moderatora</option>";
  	while($row = mysql_fetch_assoc($res)){
    	$korisnik_id = $row['korisnik_id'];
    	$korisnicko_ime = $row['korisnicko_ime'];
    	echo "<option value='$korisnik_id'>$korisnicko_ime</option>";
    }
  	?>
</select></td>
<tr align="center"><td colspan="2" align="center"><input type='submit' align='center' name ='submit' value='Dodaj'/></td></tr>
</table></form>
 </form>
</div>