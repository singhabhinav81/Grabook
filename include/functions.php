<?php
  function redirect_to($new_location){
     header("Location:" . $new_location);
     exit;

}

function sign_in(){

  $useremail = $_POST['user_email'];
   $userpass = $_POST['user_pass'];
  global $db;
  $query = "SELECT * ";
  $query .= "FROM people_user ";
  $query .= "WHERE user_email = ";
  $query .= "'$useremail' AND ";
  $query .= "user_pass = '$userpass'";

      $result = mysqli_query($db, $query);
      $userid = mysqli_fetch_assoc($result);
      $last_id = $userid['user_id'];
      $rows = mysqli_num_rows($result);
        if($rows == true){
          $_SESSION['user_login'] = $useremail;
          header( "Location: profile.php?user_id = " . rawurldecode($last_id));
          exit;

       } else{
          $_SESSION['error'] = array("please check email and password or signup first");
          redirect_to("login.php");
    }
}

  function sign_up(){

    if(!empty($useremail = $_POST['user_email'])){

    global $db;
    $query = "SELECT * ";
    $query .= "FROM people_user ";
    $query .= "WHERE user_email = ";
    $query .= "'{$_POST[user_email]}'";

     $result = mysqli_query($db, $query);
     $row = mysqli_fetch_array($result);
     if(!$row){
        new_user();
    } else{
      $_SESSION['errors'] = array('your email is exist already');
      redirect_to("signup.php");
    }
  }
 }


    function new_user(){

     $username = $_POST['user_name'];
     $useremail = $_POST['user_email'];
     $usercontact = $_POST['contact'];
     $userpass = $_POST['user_pass'];

    global $db;
    $query = "INSERT INTO people_user( ";
    $query .= "user_name, user_email, user_contact, user_pass ";
    $query .= ") VALUES ( ";
    $query .= "'{$username}', '{$useremail}', '{$usercontact}', '{$userpass}' ";
    $query .=  ") ";

    $result = mysqli_query($db, $query);
    if($result){
       redirect_to('login.php');
    }else{
      redirect_to('login.php');
    }
 }

 ?>
