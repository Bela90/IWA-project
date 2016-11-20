<?php
  include ("header.php"); 
  include("connect.php");
	if (session_id() == "")
  {
  	session_start();
  }

    if (isset($_POST['submit'])){
      $kor_ime = $_POST['kor_ime'];
      $ime = $_POST['ime'];
      $prezime = $_POST['prezime'];
      $email = $_POST['mail'];
      $lozinka = $_POST['pass'];
      $tip_kor = $_POST['tip'];
      $sql_insertion = "INSERT INTO korisnik (tip_id, korisnicko_ime, lozinka, ime, prezime, email) VALUES ('$tip_kor','$kor_ime','$lozinka','$ime', '$prezime','$email')";
    				
	  if (mysql_query($sql_insertion)) {
      echo "<p class='obavijesti'>Upisali ste korisnika.</p>";
    } else {
      echo "Pogreška kod unosa podataka u bazu podataka:" . mysql_error();
		}
  }
?>


<form  method='POST'>
<h4 align='center'>Dodavanje novoga korisnika</h4>
<table>
<tr><td>Korisničko ime:</td><td><input type='text' name='kor_ime' id='kor_ime' size='28'/></td></tr>
<tr><td>Ime:</td><td><input type='text' name="ime" id="ime" size='28' maxlength='28'/></td></tr>
<tr><td>Prezime:</td><td><input type='text' name='prezime' id='prezime' size='28' maxlength='28'/></td></tr>
<tr><td>E-mail:</td><td><input type='text' name='mail' id='mail' size='28' maxlength='28'/></td></tr>
<tr><td>Lozinka:</td><td><input type='password' name='pass' id='pass' size='28' maxlength='28'/></td></tr>
<tr><td>Tip korisnika</td><td><select name='tip' id='tip' />";
    <?php
    	$sql= "SELECT * FROM tip_korisnika";
    	$res= mysql_query($sql) or die(mysql_error());
    	echo "<option value='0'>Odaberite tip korisnika </option>";
    	while($row = mysql_fetch_assoc($res)){
    	$idtip_korisnika = $row['tip_id'];
    	$tip_korisnika = $row['naziv'];
    	echo "<option value='$idtip_korisnika'>$tip_korisnika</option>";
    	}
    	?>
</select></td></tr>
<tr align="center"><td colspan="2" align="center"><input type='submit' name ='submit' align='center' value='Dodaj novog korisnika'/></td></tr>
</form>

<?php
    $sql ="select * from kategorija";
    $res= mysql_query($sql) or die(mysql_error());
    while($row = mysql_fetch_assoc($res)){
      $naziv = $row['naziv'];
      $kategorija = $row['kategorija_id'];
      
      //dohvati korisnicko ime moderatora
      $korisnik_id_broj = $row['korisnik_id'];
      $sql_ime_moderatora = "SELECT korisnicko_ime  FROM korisnik WHERE korisnik_id = '" .$korisnik_id_broj."'";
      
      $res1 = mysql_query($sql_ime_moderatora) or die(mysql_error());
      $kor_ime_moderatora = mysql_fetch_array($res1);
      
      echo "<tr><td>$naziv</td><td>Trenutni moderator: ".$kor_ime_moderatora['korisnicko_ime']."</td><td><a href='dodaj_moderatora.php?r=" .$kategorija."'><span>Izmjeni moderatora</span></a></td></tr>";
        
    }
?>
</table>
 </form>
</div>