<?php
header('Access-Control-Allow-Origin: *');
include("config.php");
ini_set('max_execution_time', 300);
$action   =$_GET['action'];
$db=mysql_connect($servername, $username, $password) or die('Could not connect');
    mysql_select_db($dbname, $db) or die('');
    $result = null;
    $data = '{"data":[';
switch ($action)
{
	case 'insertUser':{
			include_once('users/users.php');
			insertUser();
			break;
	}
	case 'updateUser':{
			include_once('users/users.php');
			updateUser();
			break;
	}
	case 'getlistUsers':{
			include_once('users/users.php');
			getlistUsers();
			break;
	}
	
    default:
}


mysql_close($db);
?>