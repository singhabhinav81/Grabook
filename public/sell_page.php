<?php include("../include/session.php"); ?>
<?php include("../include/db_connection.php"); ?>
<?php require_once("../include/functions.php"); ?>
<?php
$err = array();

if(isset($_POST['submit'])){

  $title = isset($_POST['ad_title'])?
     trim($_POST['ad_title']): '';
     if(empty($title)){
     $_SESSION[err] = array('please enter the title');
     redirect_to('sell.php');
   }

   $auth = isset($_POST['ad_auth'])?
      trim($_POST['ad_auth']): '';
      if(empty($auth)){
      $_SESSION[err] = array('please enter the book author');
      redirect_to('sell.php');
    }

    $desc = isset($_POST['ad_desc'])?
      trim($_POST['ad_desc']): '';
     if(empty($desc)){
       $_SESSION[err] = array('please enter the description');
       redirect_to('sell.php');
     }

     $price = isset($_POST['ad_price'])?
       trim($_POST['ad_price']): '';
      if(empty($price)){
        $_SESSION[err] = array('please add the price');
        redirect_to('sell.php');
      }
      $useremail = isset($_POST['user_email']) ?
       trim($_POST['user_email']): '';
      if(empty($useremail)){
        $_SESSION['error'] = array('please enter email address');
        redirect_to('sell.php');
      }

      $name = isset($_POST['seller_name'])?
        trim($_POST['seller_name']): '';
       if(empty($name)){
         $_SESSION[err] = array('please enter your name');
         redirect_to('sell.php');
       }

       $city = isset($_POST['seller_city'])?
         trim($_POST['seller_city']): '';
        if(empty($city)){
          $_SESSION[err] = array('please enter your city');
          redirect_to('sell.php');
        }

        $phone = isset($_POST['seller_phone'])?
          trim($_POST['seller_phone']): '';
         if(empty($phone)){
           $_SESSION[err] = array('please enter your phone no.');
           redirect_to('sell.php');
         }

        $img = isset($_FILES["file"]["name"])?
          trim($_FILES["file"]["name"]): '';
         if(empty($img)){
           $_SESSION[err] = array('please upload your image file');
           redirect_to('sell.php');
         }

    sell_details();
}
  function sell_details(){

      $title = $_POST['ad_title'];
      $auth = $_POST['ad_auths'];
      $desc = $_POST['ad_desc'];
      $price = $_POST['ad_price'];
      $email = $_POST['user_email'];
      $name = $_POST['seller_name'];
      $city = $_POST['seller_city'];
      $phone = $_POST['seller_phone'];

      $temp = explode(".", $_FILES["file"]["name"]);
       $extension = end($temp);
       if ((($extension == "jpg") || ($extension == "jpeg") || ($extension == "png") || ($extension == "bmp")) && $_FILES["file"]["size"] < 20000000) {
            $r1 = rand();
            $r2 = rand();
            $r3 = rand();

             move_uploaded_file($_FILES["file"]["tmp_name"],
                    "uploaded_images/".$email.'$'.$r1.$_FILES["file"]["name"]);
             move_uploaded_file($_FILES["front"]["tmp_name"],
                    "uploaded_images/".$email.'$'.$r2.$_FILES["front"]["name"]);
              move_uploaded_file($_FILES["back"]["tmp_name"],
                    "uploaded_images/".$email.'$'.$r2.$_FILES["back"]["name"]);

             $img_path1 = "uploaded_images/".$email.'$'.$r1.$_FILES["file"]["name"];
             $img_path2 = "uploaded_images/".$email.'$'.$r2.$_FILES["front"]["name"];
             if (empty($img_path2)) {
               $img_path2 = 'N/A';
             }
             $img_path3 = "uploaded_images/".$email.'$'.$r2.$_FILES["back"]["name"];
             if (empty($img_path3)) {
               $img_path3 = 'N/A';
             }

       }


          global $db;
          $query = "INSERT INTO sell_details( ";
          $query .= "adv_title, adv_book_author, adv_desc, adv_price, seller_email, seller_name, seller_city, seller_phone, img_path1, img_path2, img_path3 ";
          $query .= ") VALUES ( ";
          $query .= "'{$title}', '{$auth}', '{$desc}', '{$price}', '{$email}', '{$name}', '{$city}', '{$phone}', '{$img_path1}', '{$img_path2}', '{$img_path3}' ";
          $query .=  ") ";

          $result = mysqli_query($db, $query);
          $userid = mysqli_fetch_assoc($result);
          $last_id = $userid['user_id'];
          if($result){
               header( "Location: profile.php?user_id = " . rawurldecode($last_id));
          }else{
            redirect_to('sell.php');
          }
       }
?>
<?php
if ($_POST['upload'] && !empty($_FILES)) {
  $formOk = true;

  //Assign Variables
  $path = $_FILES['image']['tmp_name'];
  $name = $_FILES['image']['name'];
  $size = $_FILES['image']['size'];
  $type = $_FILES['image']['type'];
  $email = $_POST['seller_email'];

  if ($_FILES['image']['error'] || !is_uploaded_file($path)) {
    $formOk = false;
    echo "Error: Error in uploading file. Please try again.";
  }

  //check file extension
  if ($formOk && !in_array($type, array('image/png', 'image/x-png', 'image/jpeg', 'image/jpg', 'image/gif'))) {
    $formOk = false;
    echo "Error: Unsupported file extension. Supported extensions are JPG / PNG.";
  }
  // check for file size.
  if ($formOk && filesize($path) > 500000) {
    $formOk = false;
    echo "Error: File size must be less than 500 KB.";
  }

  if ($formOk) {
    // read file contents
    $content = file_get_contents($path);

    //connect to mysql database
    if ($db = mysqli_connect('localhost', 'root', 'abhinav21', 'db_grabook')) {
     $content = mysqli_real_escape_string($db, $content);
      $sql = "insert into images (name, size, type, email, content) values ('{$name}', '{$size}', '{$type}', '{$email}', '{$content}' )";
      echo $sql;
      if (mysqli_query($db, $sql)) {
        $uploadOk = true;
        $imageId = mysqli_insert_id($db);
        $_SESSION['err'] = array('image uploaded');
        redirect_to('sell.php');
      } else {
        $_SESSION['err'] = array('Please try again');
        redirect_to('sell.php');
      }

      mysqli_close($db);
    } else {
      echo "Error: Could not connect to mysql database. Please try again.";
    }
  }
}
?>
