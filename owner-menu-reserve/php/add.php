<?php
if (isset($_POST['submit'])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "foods";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $d_name = $conn->real_escape_string($_POST['d_name']);
    $d_price = $conn->real_escape_string($_POST['d_price']);
    $d_category = $conn->real_escape_string($_POST['d_category']);
    $d_components = $conn->real_escape_string($_POST['d_components']);
    if (isset($_FILES['d_photo']) && !empty($_FILES['d_photo']['name'])) {
        $d_photo = $_FILES['d_photo']['name'];
        $targetDir = "../imgs/dish/";
        $targetFile = $targetDir . basename($d_photo);
        move_uploaded_file($_FILES['d_photo']['tmp_name'], $targetFile);
    } else {
        $d_photo = "";
    }
    $sql = "INSERT INTO dish (d_name, d_price, d_photo, d_category, d_components) VALUES ('$d_name', '$d_price', '$d_photo', '$d_category',  '$d_components')";
    if ($conn->query($sql) === TRUE) {
        echo "New dish added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
} ?>