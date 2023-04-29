
<div class="frame">

    <h1>Welcome back.</h1>
    <img src="icons/v23_7.png" alt="logo" class="logo">
    <a href="/index.html"><img src="icons/v23_6.png" alt="cross icon" class="crossIcon"></a>

    <a href="login_restaurant.php" class="ownerButton">Restaurant Owner</a>
    <a href="login_customer.php" class="custButton">Customer</a>

    <form action="index.php?action=do_login_customer" method="post">
        <?php if (isset($vars['error_message'])){ ?><b style="color:red;"><?php echo $vars['error_message'] ?></b> <?php } ?>

        <label for="cust_email" class="label1">Email Address</label><br>
        <input type="text" id="cust_email" name="cust_email" placeholder="<?php echo LANG_ENTER_EMAIL;?>" class="input1"><br>

        <label for="cust_pass" class="label2">Password</label><br>
        <input type="text" id="cust_pass" name="cust_pass" placeholder="<?php echo LANG_ENTER_PASSWORD;?> class="input2"><br><br>

        <button type="submit" class="signinButton"><?php echo LANG_LOGIN;?></button>

    </form>

<a href="signup_customer.php" class="joinLink">Not a member? Join us</a>

</div>

