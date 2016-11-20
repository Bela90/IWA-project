<?php
  include ("header.php"); 
  include("connect.php");
	if (session_id() == "")
  {
  	session_start();
  }
  $vrijesnost2 = $_POST['submit'];
  echo "<h1>TEO". $vrijesnost2."</h1>";
      
  if (isset($_POST['submit'])){
   
    $r=$_GET['r'];
    $kategorija = $_POST['kategorija'];
    $sql =" Update dokument set kategorija_id ='". $kategorija."' where dokument_id='".$r."'";
      
    $kveri =mysql_query($sql);
    if ($kveri){
      echo "<br>Uspjesno ste promijenili kategoriju";
      echo "<meta http-equiv='refresh' content='2; url=popis.php' />";
    }
  }
?>

  <form  method='POST'>
  <table align='center' id='table1'>
  <td><select name='kategorija' id='kategorija' />
  		<?php
  			$sql= "SELECT * FROM kategorija ";
  			$res= mysql_query($sql) or die(mysql_error());
  			echo "<option value='0'>Odaberite kategoriju</option>";
  			while($row = mysql_fetch_assoc($res)){
  			$kategorija_id = $row['kategorija_id'];
  			$naziv = $row['naziv'];
  			$ime= "<option value='$kategorija_id'>$naziv</option>";
                  echo $ime;
  			}
  			?>
	</select></td>
  <tr align="center"><td colspan="2" align="center"><input type='submit' align='center' name ='submit' value='Promjeni kategoriju'/></td></tr>
  </table>
  </form>

