<?php
    session_start();
    include("php/connect_db.php");
    $query = "SELECT * FROM RESTAURANT WHERE r_email = '" . $_SESSION['email'] . "'";
    $result= mysqli_query( $conn , $query );
        if(mysqli_num_rows($result) == 1)
        {
            $row = $result->fetch_assoc();
            $restname = $row['r_name'];
            $restdesc = $row['description'];
            $restphone = $row['phone'];
            $restfb = $row['fb'];
            $restinsta = $row['insta'];
            $imageData = $row['restau_img'];
            $restcuisine = $row['cuisine'];
            $restdelivery = $row['delivery'];
        }
        else{
            echo "error <br>"."error <br>"."error <br>"."error <br>" ;
        }
?>