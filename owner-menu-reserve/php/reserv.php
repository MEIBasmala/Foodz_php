<?php
// start the session


// check if the form has been submitted
if (isset($_POST['submit'])) {
    // get the form data

    $r_name = $_POST['r_name'];
    $c_email = $_POST['c_email'];
    $nb_guests = $_POST['nb_guests'];
    $r_time = $_POST['r_time'];
    $r_date = $_POST['r_date'];



    // validate the form data
    if (empty($r_name) || empty($c_email) || empty($nb_guests) || empty($r_time) || empty($r_date)) {
        echo "All fields are required.";
    } else {
        // connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "foods";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO reservation (r_name, c_email, nb_guests, r_time, r_date) VALUES ('$r_name', '$c_email', '$nb_guests', '$r_time', '$r_date')";

        if (mysqli_query($conn, $sql)) {
            echo "booked successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // close the database connection
        mysqli_close($conn);
    }
}
?>