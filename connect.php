<?php
  $host="localhost";
  $username= "iwa_2013";
  $password="foi2013";
  $db= "iwa_2013_zb_projekt";
  
  mysql_connect($host,$username,$password) or die(mysql_error());
  mysql_select_db($db);
  mysql_query("set names utf8");
?>