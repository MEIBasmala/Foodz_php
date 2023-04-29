<?php

function user_get_logged_user(){
    global $db,$appuser;
    
    $appuser=0;
    if (isset($_COOKIE['app_email']) and strlen($_COOKIE['app_email'])>0){		
		$items = $db->query("SELECT * FROM users WHERE LOWER(email) = ? and pass= ?",$_COOKIE['app_email'], $_COOKIE['app_pass'])->fetchAll();
		if (count($items)>0){
			$appuser=$items[0];	
		}
	}
    return $appuser;
    
}
    
function customer_process_login($vars){
    global $db;

	$ret['status']=0;
	$ret['error']='';
	
	$vars['cust_email']=trim(strtolower($vars['cust_email']));
	
    if (strlen($ret['error'])==0 and strlen($vars['cust_email'])==0) {
        $ret['error']="You need to provide an email.";
        return $ret;
    }

    if (strlen($ret['error'])==0 and strlen($vars['cust_pass'])==0) {
        $ret['error']="The password should be filled.";
        return $ret;
    }

    if (strlen($ret['error'])>0)return  $ret;
    
    //search for it in the database ?
	$items = $db->query("SELECT * FROM customer WHERE LOWER(c_email) = ? and c_pwd= ?",$vars['cust_email'], md5($vars['cust_pass']))->fetchAll();
	if (count($items)==0){
	        $ret['error']=LANG_INCORRECT_EMAIL_PASSWORD;
	        return $ret;
	}
	//For the sake of simplicity, log the customers directly by setting their cookies..
	setcookie("app_email", $vars['cust_email'], time()+(3600*24),"/");
	setcookie("app_pass", md5($vars['cust_pass']), time()+(3600*24),"/");
	
	$ret['status']=1;
	$ret['error']='';
	return $ret;
}

function restaurant_process_login($vars){
    global $db;

	$ret['status']=0;
	$ret['error']='';
	
	$vars['rest_email']=trim(strtolower($vars['rest_email']));
	
    if (strlen($ret['error'])==0 and strlen($vars['rest_email'])==0) {
        $ret['error']="You need to provide an email.";
        return $ret;
    }

    if (strlen($ret['error'])==0 and strlen($vars['rest_pass'])==0) {
        $ret['error']="The password should be filled.";
        return $ret;
    }

    if (strlen($ret['error'])>0)return  $ret;
    
    //search for it in the database ?
	$items = $db->query("SELECT * FROM owner WHERE LOWER(r_email) = ? and o_pwd= ?",$vars['rest_email'], md5($vars['rest_pass']))->fetchAll();
	if (count($items)==0){
	        $ret['error']=LANG_INCORRECT_EMAIL_PASSWORD;
	        return $ret;
	}
	//For the sake of simplicity, log the restaurants directly by setting their cookies..
	setcookie("app_email", $vars['rest_email'], time()+(3600*24),"/");
	setcookie("app_pass", md5($vars['rest_pass']), time()+(3600*24),"/");
	
	$ret['status']=1;
	$ret['error']='';
	return $ret;
}


function customer_process_signup($vars){
	global $db;
	
	$ret['status']=0;
	$ret['error']='';
	
	$vars['cust_email']=trim(strtolower($vars['cust_email']));
	
    if (strlen($ret['error'])==0 and strlen($vars['cust_email'])==0) {
        $ret['error']=LANG_YOU_NEED_TO_PROVIDE_EMAIL;
        return $ret;
    }
    if (strlen($ret['error'])==0 and strlen($vars['cust_name'])==0) {
        $ret['error']="You need to type in your name.";
        return $ret;
    }

    if (strlen($ret['error'])==0 and strlen($vars['cust_pass'])==0) {
        $ret['error']="The password should be filled.";
        return $ret;
    }

    if (strlen($ret['error'])>0)return  $ret;
    //search for it in the database ?
	$items = $db->query("SELECT * FROM customer WHERE LOWER(c_email) = ?",$vars['cust_email'])->fetchAll();
	if (count($items)>0){
	        $ret['error']="There is already an account with this email address";
	        return $ret;
	}
	//Else, there is no users in the db with the same email
    $db->query("INSERT INTO customer (c_username, c_email, c_pwd) VALUES ( ?, ?, ? )", $vars['cust_name'], $vars['cust_email'], md5($vars['cust_pass']));
				
	//log the user directly by setting their cookies..
	setcookie("app_email", $vars['cust_email'], time()+(3600*24),"/");
	setcookie("app_pass", md5($vars['cust_pass']), time()+(3600*24),"/");
	
	$ret['status']=1;
	$ret['error']='';
	return $ret;
}

function restaurant_process_signup($vars){
	global $db;
	
	$ret['status']=0;
	$ret['error']='';
	
	$vars['rest_email']=trim(strtolower($vars['rest_email']));
	
    if (strlen($ret['error'])==0 and strlen($vars['rest_email'])==0) {
        $ret['error']=LANG_YOU_NEED_TO_PROVIDE_EMAIL;
        return $ret;
    }
    if (strlen($ret['error'])==0 and strlen($vars['rest_name'])==0) {
        $ret['error']="You need to type in your restaurant name.";
        return $ret;
    }

    if (strlen($ret['error'])==0 and strlen($vars['rest_pass'])==0) {
        $ret['error']="The password should be filled.";
        return $ret;
    }

    if (strlen($ret['error'])>0)return  $ret;
    //search for it in the database ?
	$items = $db->query("SELECT * FROM restaurant WHERE LOWER(r_email) = ?",$vars['rest_email'])->fetchAll();
	if (count($items)>0){
	        $ret['error']="There is already an account with this email address";
	        return $ret;
	}
	//Else, there is no users in the db with the same email
    $db->query("INSERT INTO owner (o_username, r_email, o_pwd) VALUES ( ?, ?, ? )", $vars['owner_username'], $vars['rest_email'], md5($vars['rest_pass']));
				
	//log the user directly by setting their cookies..
	setcookie("app_email", $vars['email'], time()+(3600*24),"/");
	setcookie("app_pass", md5($vars['pass']), time()+(3600*24),"/");
	
	$ret['status']=1;
	$ret['error']='';
	return $ret;
}
?>
