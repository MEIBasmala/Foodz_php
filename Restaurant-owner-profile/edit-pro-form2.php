<?php
    session_start();
    include("php/connect_db.php");
    $newname = $_POST["rname"];
    $newdesc = $_POST["description"];
    $newphone = $_POST["phonenum"];
    $newfb = $_POST["fb"];
    $newinsta = $_POST["insta"];
    $newcuisine= $_POST["cuisine"];
    if(isset($_POST['delivery'])){
        $newdelivery = true;
    } else {
        $newdelivery = false;
    }
    /*the image*/
    $target_dir = "uploads/"; // The directory where the uploaded images will be stored
    $target_file = $target_dir . basename($_FILES["restaurant-image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["restaurant-image"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        } else {
    if (move_uploaded_file($_FILES["restaurant-image"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["restaurant-image"]["name"])). " has been uploaded.";
        $image_path = $target_file;
        $image_data = addslashes(file_get_contents($image_path));
        }
    }
    $conn = mysqli_connect($hoster, $user, $password,$dbname);
    /**/
    if ($image_data == null){
        $query = "UPDATE RESTAURANT
          SET R_name = '$newname', description = '$newdesc', phone = '$newphone', fb = '$newfb', 
          insta = '$newinsta' , cuisine = '$newcuisine' , delivery = '$newdelivery'
          WHERE R_email = '{$_SESSION['email']}'";
    }
    else{
        $query = "UPDATE RESTAURANT 
          SET R_name = '$newname', description = '$newdesc', phone = '$newphone', fb = '$newfb', 
          insta = '$newinsta', restau_img = '$image_data' , cuisine = '$newcuisine' , delivery = '$newdelivery'
          WHERE R_email = '{$_SESSION['email']}'";
    }
    mysqli_query($conn , $query);
    header("location: restaurant-owner-profile.php");
?>