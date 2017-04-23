<?php include("../include/session.php"); ?>
<?php include("../include/layout/header.php"); ?>
<body>
   <div class="container-fluid box">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 ">

    <fieldset>
        <legend>logo</legend>
        <form method="post" action="signup_page.php">
            <label><div class="input-group margin-bottom-sm"> <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span><input class="form-control log" type="text" name = "user_name" placeholder="Full Name"></div> </label>
            <label><div class="input-group margin-bottom-sm"> <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span><input class="form-control log" type="email" name = "user_email" placeholder="Email Id"></div></label>
            <label><div class="input-group margin-bottom-sm"> <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span><input class="form-control log" type="tel" pattern="^(\+[0-9]{1,5})?([1-9][0-9]{9})$" name = "contact" placeholder="Contact Number"></div></label>
            <label><div class="input-group margin-bottom-sm"> <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span><input class="form-control log" type="password" name = "user_pass" placeholder="Password"></div> </label>
            <label><div class="input-group margin-bottom-sm"> <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span><input class="form-control log" type="password" name = "confirm_pass" placeholder="Confirm Password"></div></label>
              <label>have an account? <a href="login.php"> login here </a></label>
               <?php if (isset($_SESSION['errors'])): ?>
                 <div class="form-errors">
                  <?php foreach($_SESSION['errors'] as $errors): ?>
                    <p><?php echo $errors; ?></p>
                   <?php endforeach; ?>
                   </div>
                 <?php endif; ?>

            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-5 col-sm-4 col-sm-offset-5 col-xs-4 col-xs-offset-4"><input class="log1" type="submit" name = "submit" value="Sign Up"></div>
        </form>
    </fieldset>
    </div>
        </div>
    </div>
</body>
<?php include("../include/layout/footer.php"); ?>

</html>
