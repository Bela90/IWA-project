<?php
include("connect.php");
	if (session_id() == "")
		session_start();
include ("header.php"); 

if (isset($_POST['submit'])){
   

$odabir = $_POST['odabir'];

$tekst = $_POST['tekst'];
$naziv = $_POST['naziv'];
$sql = "";

    if($odabir== 'Informatika'){
       
        $sql = "insert into dokument (dokument_id,kategorija_id,naziv_dokumenta,tekst_dokumenta)values('','1','$naziv', '$tekst')";
    }
      if($odabir== 'Biologija'){
       
        $sql = "insert into dokument (dokument_id,kategorija_id,naziv_dokumenta,tekst_dokumenta)values('','2','$naziv', '$tekst')";
    }
      if($odabir== 'Hrvatski'){
       
        $sql = "insert into dokument (dokument_id,kategorija_id,naziv_dokumenta,tekst_dokumenta)values('','3','$naziv', '$tekst')";
    }
      if($odabir== 'Matematika'){
       
        $sql = "insert into dokument (dokument_id,kategorija_id,naziv_dokumenta,tekst_dokumenta)values('','4','$naziv', '$tekst')";
    }
      if($odabir== 'Ekonomija'){
       
        $sql = "insert into dokument (dokument_id,kategorija_id,naziv_dokumenta,tekst_dokumenta)values('','5','$naziv', '$tekst')";

    }
    
     $kveri =mysql_query($sql);

     if ($kveri){
        $last_inserted_id = mysql_insert_id();
        
        $korisnik_temp = $_SESSION['korisnik_id'];
        
        //vlasnicko pravo
        $pravo = 1;
        
        $sql= "insert into prava (korisnik_id,dokument_id,vrsta_prava) values('$korisnik_temp','$last_inserted_id','$pravo')";
      
        $kveri =mysql_query($sql);
        
        if ($kveri){
        echo "<br>Uspjesno ste kreirali dokument";
        }
     }
    }
?>
<form method='POST' enctype="multipart/form-data" >
   <table>
    <tr><td>Kategorija</td><td><select name="odabir">
  <option name ='Infromatika' value='Informatika'>Informatika</option>
  <option name ='Biologija' value='Biologija'>Biologija</option>
  <option name ='Hrvatski' value='Hrvatski'>Hrvatski</option>
  <option name ='Matematika' value='Matematika'>Matematika</option>
  <option name ='Ekonomija' value='Ekonomija'>Ekonomija</option>
</select></td></tr><tr><td>Naziv dokumenta: </td><td><input type='text' name='naziv'></td></tr><tr><td>Tekst dokumenta: </td><td><textarea name='tekst'></textarea></td></tr>
<tr><td><input type='submit' name ='submit' value='Submit'></td></tr>
    
    </table>
</form>
 </form>
</div>

