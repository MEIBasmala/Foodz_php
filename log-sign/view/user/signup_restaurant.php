<div class="frame">
  
    <h1>Create an Account</h1>
    <img src="../icons/foodz-icon.png" alt="logo" class="logo" />
    <a href="./home.html"><img src="../icons/v23_6.png" alt="cross icon" class="crossIcon" /></a>
    <a href="login_restaurant.php" class="joinLink">Already a member?</a>
    <a href="ownerSignUp.html" class="ownerButton2">Restaurant Owner</a>
    <a href="customerSignUp.html" class="custButton2">Customer</a>
	
        <form action="index.php?action=do_signup_restaurant" method="post">
		<?php if (isset($vars['error_message'])){ ?><b style="color:red;"><?php echo $vars['error_message'] ?></b> <?php } ?>
          <div class="inputs">
            <input type="text" id="owner_username" name="owner_username" placeholder="Username" class="inputf" /><br />
            <input type="email" id="rest_email" name="rest_email" placeholder="Enter Email" class="inputl" /><br />
            <input type="password" id="owner_pass" name="owner_pass" placeholder="Enter Password" class="inputp2" /><br />
          </div>
		  <button type="submit" class="signinButton"><?php echo LANG_SIGNUP;?></button>
        </form>

  </div>