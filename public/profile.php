<?php include("../include/session.php"); ?>
<?php include("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>
<?php
   $current_user = $_SESSION['user_login'];
   $query = "SELECT * FROM people_user WHERE user_email = '{$current_user}' ";
    $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result)){
    $row = mysqli_fetch_array($result);
    $useremail = $row['user_email'];
    $username = $row['user_name'];
    $usercontact = $row['user_contact'];
  }
 ?>
 <?php
    $current_user = $_SESSION['user_login'];
    $query = "SELECT * FROM sell_details WHERE seller_email = '{$current_user}' ";
     $result = mysqli_query($db, $query);

     if(mysqli_num_rows($result)){
     $row = mysqli_fetch_array($result);
     $selleremail = $row['seller_email'];
     $image = $row['img_path1'];

   }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="profile_css.css">
   <script src="jquery-3.2.0.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-xlarge.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>

</head>
<body id="profile">
    <div id="header">
        <img src="img/logo2.png" class="img-responsive img-circle">
        <nav id="nav">
          <div class="btn-group">
                       <button type="button" class="btn btn-danger"><?php echo $username; ?></button>
                       <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                           <span class="caret"></span>
                           <span class="sr-only">Toggle Dropdown</span>
                       </button>
                        <ul class="dropdown-menu" role="menu">
                           <li class="dropdown-plus-title">
                               <?php echo $selleremail; ?>
                               <b class="pull-right glyphicon glyphicon-chevron-up"></b>
                           </li>
                           <li><a href="#">Action</a></li>
                           <li><a href="#">Another action</a></li>
                           <li><a href="#">Something else here</a></li>
                           <li class="divider"></li>
                           <li><a href="#">Separated link</a></li>
                       </ul>
                   </div>

      </div>
		</nav>
    </div>
    <div id="container1">
        <aside>
            <ul id="nav1">
                <li><a href="home.php">Home</a></li>
                <li><a href="sell.php">Sell</a></li>
                <li><a href="home.html">Friends</a></li>
                <li><a href="buy.php">Books</a></li>
                <li><a href="home.html">FAQs</a></li>
            </ul>
        </aside>
        <div class="container custom_container">
            <div class="row col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-2 col-sm-4 col-sm-offset-3 col-xs-4 col-xs-offset-1 ">

                </div>
            </div>
        </div>

</body>

</html>
<?php include("../include/layout/footer.php"); ?>
