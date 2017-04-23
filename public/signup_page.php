<?php include("../include/session.php"); ?>
<?php include("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>

<?php

 $err = array();

if(isset($_POST['submit'])){

   $username = isset($_POST['user_name']) ?
    trim($_POST['user_name']): '';
    if(empty($username)){
      $_SESSION['errors'] = array('please enter your name');
       redirect_to('signup.php');
    }

   $useremail = isset($_POST['user_email']) ?
    trim($_POST['user_email']): '';
    if(empty($useremail)){
      $_SESSION['errors'] = array('please enter your email address');
      redirect_to('signup.php');
    }

    $usercontact = isset($_POST['contact']) ?
      trim($_POST['contact']): '';
       if(empty($usercontact)){
         $_SESSION['errors'] = array('please enter your mobile number');
       }

   $userpass = isset($_POST['user_pass']) ?
    trim($_POST['user_pass']): '';
     if(empty($userpass)){
       $_SESSION['errors'] = array('please enter your password');
       redirect_to('signup.php');
     }
     $userpass = isset($_POST['user_pass']) ?
      trim($_POST['user_pass']): '';
        if(strlen($userpass) < 7 ){
          $_SESSION['errors'] = array('please enter more than seven character password');
          redirect_to('signup.php');

     }

     $confirmpass = isset($_POST['confirm_pass']) ?
       trim($_POST['confirm_pass']): '';
        if(strlen($confirmpass) < 7 ){
          $_SESSION['errors'] = array('please enter more than seven character password');
          redirect_to('signup.php');

     }

   $confirmpass = isset($_POST['confirm_pass']) ?
     trim($_POST['confirm_pass']): '';
     if(!empty($confirmpass)){
     if($_POST['user_pass'] == $_POST['confirm_pass']){
        $_SESSION['errors'] = array('');
     }else{
         $_SESSION['errors'] = array('password did not match');
          redirect_to('signup.php');
     }
  }
  sign_up();

 }

 ?>
 <?php

 if (isset($db)){
  mysqli_close($db);
 }

 ?>
