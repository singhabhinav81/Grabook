<?php

// connect to mysql
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "abhinav21";
$dbname = "db_grabook";

$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  if(mysqli_connect_errno()){

    die('could not connect: ' . mysqli_connect_error() .
    	     "(" . mysqli_connect_errno() . ")"
           );

  }
?>
