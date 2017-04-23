<?php

// connect to mysql
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
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

     $query = 'CREATE TABLE  `images` (
               id int(11) NOT NULL auto_increment,
               name varchar(100) default NULL,
               size int(11) default NULL,
               type varchar(20) default NULL,
               email VARCHAR(50) NOT NULL,
                content mediumblob,

                PRIMARY KEY  (id),
                FOREIGN KEY(email) REFERENCES people_user(seller_email)
                ON DELETE SET NULL
                ON UPDATE CASCADE
                ) ENGINE=MyISAM;';

    mysqli_query($db, $query) or die(mysqli_error($db));

    echo 'Image table created successfully';
?>
