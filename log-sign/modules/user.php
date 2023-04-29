<?php

switch($vars['action']){

    case "do_signup_customer":{
         $ret=customer_process_signup($vars);
         
         if ($ret['status']==1){
            header("location: index.php?action=list"); 
         }else{
            header("location: index.php?action=signup&error_message=".urlencode($ret['error']));
         }
         exit;
    }break;  

    case "do_signup_restaurant":{
         $ret=restaurant_process_signup($vars);
      
         if ($ret['status']==1){
         header("location: index.php?action=list"); 
         }else{
            header("location: index.php?action=signup&error_message=".urlencode($ret['error']));
         }
      exit;
    }break;   

    case "do_login_customer":{
        print_r($vars);
         $ret=customer_process_login($vars);
        print_r($ret); 
         if ($ret['status']==1){
            header("location: index.php?action=list"); 
         }else{
            header("location: index.php?action=login&error_message=".urlencode($ret['error']));
         }
         exit;        
    }break;    

    case "do_login_restaurant":{
      print_r($vars);
       $ret=restaurant_process_login($vars);
      print_r($ret); 
       if ($ret['status']==1){
          $_SESSION["email"]=$rest_email;
          header("location: ../../Restaurant-owner-profile/restaurant-owner-profile.php"); 
       }else{
          header("location: index.php?action=login&error_message=".urlencode($ret['error']));
       }
       exit;        
  }break;    
    
    case "logout":{
	    setcookie("app_email", "" , -1,"/");
	    setcookie("app_pass", "", -1,"/");        
	    header("location: index.php?action=login"); 
	    exit;
    }break;    
    
}
?>