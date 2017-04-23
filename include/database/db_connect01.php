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

 $query = 'CREATE TABLE sell_details(
           adv_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
           adv_title VARCHAR(20) NOT NULL,
           adv_book_author VARCHAR(20) NOT NULL,
           adv_desc  VARCHAR(50) NOT NULL,
           adv_price VARCHAR(10) NOT NULL,
           seller_email VARCHAR(50) NOT NULL,
           seller_name VARCHAR(20) NOT NULL,
           seller_city VARCHAR(20) NOT NULL,
           seller_phone VARCHAR(10) NOT NULL,
           img_path1 VARCHAR(200) NOT NULL,
           img_path2 VARCHAR(200) NOT NULL,
           img_path3 VARCHAR(200) NOT NULL,


           PRIMARY KEY(adv_id),
           FOREIGN KEY(seller_phone) REFERENCES people_user(user_contact)
           ON DELETE SET NULL
           ON UPDATE CASCADE,
           FOREIGN KEY(seller_email) REFERENCES people_user(user_email)
           ON DELETE SET NULL
           ON UPDATE CASCADE

  )
  ENGINE = MYISAM ';

  mysqli_query($db, $query);
if(! $db){

	die('could not connect:' . mysqli_error($db));
}else{

 echo "database is created";
 }

?>
