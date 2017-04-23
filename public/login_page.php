<?php include("../include/session.php"); ?>
<?php include("../include/db_connection.php"); ?>
<?php include("../include/functions.php");  ?>

<?php

$err = array();

if(isset($_POST['submit'])){

 $useremail = isset($_POST['user_email']) ?
  trim($_POST['user_email']): '';
 if(empty($useremail)){
   $_SESSION['error'] = array('please enter email address');
   redirect_to('login.php');
 }

  $userpass = isset($_POST['user_pass']) ?
   trim($_POST['user_pass']): '';
  if(empty($userpass)){
    $_SESSION['error'] = array('please enter your password');
    redirect_to('login.php');
  }
  sign_in();
}

?>
<?php

if (isset($db)){
 mysqli_close($db);
}
?>
