<?php

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "simpletask";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
//  if($conn){
//      echo"done";
//  }
//  else{
//      echo"not done";
//  }
 
 return $conn;

 ?>