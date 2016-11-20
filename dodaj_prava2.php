<?php
  include ("header.php"); 
  include("connect.php");
	if (session_id() == "")
  {
    session_start();
  }
	if (isset($_POST['submit'])){
    $r=$_GET['r'];
    $korisnik = $_POST['korisnik'];
    $pravo = $_POST['pravo'];
    $sql = "insert into prava (korisnik_id,dokument_id,vrsta_prava) values('$korisnik','$r','$pravo')";
  
    $kveri =mysql_query($sql);
    if ($kveri){
      echo "<br>Uspjesno ste dodali prava";
    }      
  }
   
?>
<form  method='POST'>
<table align='center' id='table1'>
<td><select name='korisnik' id='korisnik' />
    <?php
    	$sql= "SELECT * FROM korisnik order by korisnicko_ime asc";
    	$res= mysql_query($sql) or die(mysql_error());
    	echo "<option value='0'>Odaberite korisnika</option>";
    	while($row = mysql_fetch_assoc($res)){
    		$korisnik_id = $row['korisnik_id'];
    		$korisnicko_ime = $row['korisnicko_ime'];
    		$ime= "<option value='$korisnik_id'>$korisnicko_ime</option>";
        echo $ime;
    	}
    	?>
	
</select></td>
<tr><td><select name='pravo' id='pravo' ><option name ='0' value='0'>Odaberite pravo</option><option name ='2' value='2'>Uređivanje</option><option name ='3' value='3'>Čitanje</option></select></td></tr>
<tr align="center"><td colspan="2" align="center"><input type='submit' align='center' name ='submit' value='Kreiraj'/></td></tr>
</table></form>
 </form>
</div>