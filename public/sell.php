<?php include("../include/session.php"); ?>
<?php include("../include/db_connection.php"); ?>

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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell</title>
    <script src="jquery-3.2.0.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="bootstrap.min.js"></script>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-xlarge.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <link rel="stylesheet" type="text/css" href="main1.css">
</head>
<body>

      <img src="img/logo2.png" class="img-responsive img-circle">
    <div class="menu">
        <form method="POST" action="sell_page.php" enctype="multipart/form-data">
            <h3>About Book</h3>
            <p><label for="ad">Ad Title:</label>
                <input type="text" name="ad_title" placeholder="Give suitable ad title" size="23"></p>
            <p><label for="auth">Author's name:</label>
                <input type="text" name="ad_auth" placeholder="Give book's author name" size="23"></p>
            <p><label for="desc">Description:</label>
                <textarea  cols="50" rows="7" id="ab2" name="ad_desc"></textarea></p>
            <p><label for="price">Price:</label>
                <input type="text" id="price" name="ad_price"></p>
                <!-- Image upload button goes here-->
                <p><label for="image">Select Image File</label>
                    <input name="file" type="file">
                    <br>
                    <input name="front" type="file">
                    <br>
                    <input name="back" type="file">
                </p>  
            <h3>Seller's Information </h3>
            <p><label for="name">Email:</label>
               <input type="email" name= "user_email" value = "<?php echo $useremail; ?>" size="23"></p>
            <p><label for="name">Name:</label>
                <input type="text" name="seller_name" value = "<?php echo $username; ?>" size="23"></p>
            <p><label for="city">City:</label>
             <input type="text" name="seller_city" placeholder="Enter your city" size="23"></p>
            <p><label for="ph">Phone Number:</label>
                <input type="text" name="seller_phone" value = "<?php echo $usercontact; ?>" pattern="^(\+[0-9]{1,5})?([1-9][0-9]{9})$" size="23"></p>
                <?php if (isset($_SESSION['err'])): ?>
                  <div class="form-errors">
                   <?php foreach($_SESSION['err'] as $errors): ?>
                     <p><?php echo $errors; ?></p>
                    <?php endforeach; ?>
                    </div>
                  <?php endif; ?>
            <input id="bts" type="submit" value="Submit" name="submit">
        </form>
    </div>
</body>
<?php include("../include/layout/footer.php"); ?>
