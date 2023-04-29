<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reservation.css">

    <title>Reservation</title>
</head>

<body>
    <nav>
        <div class="foodz-icon"></div>

        <div class="nav-writings">
            <div class="home">Home</div>
            <div class="about">About</div>
            <div class="language">
                <div class="earth-icon"></div>
                <div class="language-name">English</div>
            </div>
            <div class="contact-us">Contact Us</div>
        </div>

        <div class="nav-buttons">
            <form action="">
                <button class="login-button">Login</button>
                <button class="join-button">Join</button>
            </form>
        </div>
    </nav>

    <div class="reservation-container">
        <a href="../php/lhome.html"><img src="\icons\v23_6.png" alt="cross icon" class="crossIcon" /></a>
        <h1>Make Your Reservation</h1>
        <div>
            <img src="../imgs/hostess-reserving-tables.webp" class="book-a-table-pic" />
            <form class="inputs" action="reserv.php" method="post">
            <input type="email" id="c_email" class="c_email" name="c_email" placeholder="your email"/><br />

                <div class="selct-restaurant">
                    <select id="restaurant-naem" name="r_name">
                        <option value="" disabled selected>Select an option</option>
                        <option value="option1">option1</option>
                        <option value="option2">option2</option>
                        <option value="option3">option3</option>
                        <option value="option4">option4</option>
                    </select>
                </div>

                <input type="number" name="nb_guests" class="nSeats" min="1" max="12" placeholder="Number of Seats"><br />
                <input type="time" id="r-time" name="r_time" class="r-time" placeholder="Time"> <br />
                <input type="date" name="r_date" class="r-date" placeholder="Date"><br />
                <input type="submit" class="submit-container" name="submit" placeholder="Type your E-mail">
            </form>
        </div>

</body>

</html>