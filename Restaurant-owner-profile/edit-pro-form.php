<?php include("get-pro-info.php") ?>
<!DOCTYPE html>
<head>
    <title>Edit profile</title>
    <link rel="stylesheet" href="css/edit-pro-form.css">
</head>
<body>
    <div class="form-title">
        <img src="iconOwner/logo.png" style="width:40px; height: 40px;">
        <h2>Edit the restaurant profile</h2>
        <img src="iconOwner/logo.png" style="width:40px; height: 40px;">
    </div>
    <form class="edit-pro-form" action="edit-pro-form2.php" method="post" enctype="multipart/form-data">
        <label for="rname">Restaurant name</label><br>
        <input type="text" name="rname" value="<?php echo $restname?>"><br>
        <label for="description">Description:</label><br>
        <textarea name="description" rows="5" clos="80" ><?php echo $restdesc?></textarea><br>
        <label for="restaurant-image">Restaurant Image:</label><br>
        <input type="file" id="restaurant-image" name="restaurant-image" accept="image/*" style="background-color: beige;"><br>
        <label for="cuisine">Cuisine</label><br>
        <input type="text" name="cuisine" value="<?php echo $restcuisine?>"><br>
        <label for="delivery">Delivery</label><br>
        <input type="checkbox" name="delivery" value="<?php echo $restdelivery?>"><br>
        <fieldset>
            <legend>Contact information</legend>
            <label for="phonenum">Phone number:</label><br>
            <input class="contact-inp" type="text" name="phonenum" value="<?php echo $restphone?>"><br>
            <label for="fb">Facebook page:</label><br>
            <input type="text" name="fb" value="<?php echo $restfb?>"><br>
            <label for="insta">Instagram page:</label><br>
            <input type="text" name="insta" value="<?php echo $restinsta?>">
        </fieldset>
        <input type="submit" value="Modify">
    </form>
</body>   