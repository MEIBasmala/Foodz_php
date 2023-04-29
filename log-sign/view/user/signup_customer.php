<div class="frame">
  
    <h1>Create an Account</h1>
    <img src="../icons/foodz-icon.png" alt="logo" class="logo" />
    <a href="./home.html"><img src="../icons/v23_6.png" alt="cross icon" class="crossIcon" /></a>
    <a href="../Foodz-website-master/customerSignIn.html" class="joinLink">Already a member?</a>
    <a href="ownerSignUp.html" class="ownerButton1">Restaurant Owner</a>
    <a href="customerSignUp.html" class="custButton1">Customer</a>
	
        <form action="index.php?action=do_signup_customer" method="post">
		<?php if (isset($vars['error_message'])){ ?><b style="color:red;"><?php echo $vars['error_message'] ?></b> <?php } ?>
          <div class="inputs">
            <input type="text" id="cust_username" name="cust_username" placeholder="Username" class="inputf" /><br />
            <input type="email" id="cust_email" name="cust_email" placeholder="Enter Email" class="inputl" /><br />
            <input type="password" id="cust_pass" name="cust_pass" placeholder="Enter Password" class="inputp2" /><br />
          </div>
		  <button type="submit" class="signinButton"><?php echo LANG_SIGNUP;?></button>
        </form>

  </div>