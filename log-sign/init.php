<?php

error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Load the appropriate language file based on the user's language preference
// ---
$lang = 'en'; // Default language if no preference is set

include 'lang/' . $lang . '.php';
include("lib/db.php");
include("lib/utils.php");
include("lib/func.user.php");

//It is very stupid to share passwords within GIT, but for demostration, we will close our eyes on this principle.
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'foodz_db';

$db = new db($dbhost, $dbuser, $dbpass, $dbname);

$vars=get_input_vars();
$appuser=user_get_logged_user();
?>
