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
<?php
 // create databse if not exist

   $query = 'CREATE DATABASE IF NOT EXISTS db_grabook';
     if(mysqli_query($db, $query)){
     	echo "database created successfully.. \n";
     }else {
     	die('could not connect: ' . mysqli_error($db));
     }

 // make sure that recently database is active one

  mysqli_select_db( $db, 'db_grabook');
  if(! $db){
  	die('could not connect: ' . mysqli_error($db));
  }

 // create table

 $query = 'CREATE TABLE people_user(
           user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
           user_name VARCHAR(30) NOT NULL,
           user_email VARCHAR(50) NOT NULL,
           user_contact VARCHAR(10) NOT NULL,
           user_pass VARCHAR(50) NOT NULL,
           PRIMARY KEY(user_id)

  )
  ENGINE = MYISAM ';

  mysqli_query($db, $query);
if(! $db){

	die('could not connect:' . mysqli_error($db));
}else{

 echo "database is created";
 }

?>
