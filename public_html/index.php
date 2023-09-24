<?php

spl_autoload_register();


use \classes\rest\Common as Common;
use \classes\rest\get\MethodGet as MethodGet;
use \classes\rest\post\MethodPost as MethodPost;
use \classes\rest\put\MethodPut as MethodPut;
use \classes\rest\delete\MethodDelete as MethodDelete;

/*
$host = 'mysql';
$user = 'root';
$pass = 'rootpassword';
$conn = mysqli_connect($host, $user, $pass, "test_db");

mysqli_query($conn, "SET NAMES 'utf8'");
$result = mysqli_query($conn," SELECT * FROM `users` ");
 
 
while($page = mysqli_fetch_array($result)) {
	echo $page["name"];
}
*/































switch (Common::get_method()) {

    case "GET":
        $api = new MethodGet(Common::get_endpoint());
		$api->endpoint();
        break;

    case "POST":
        $api = new MethodPost(Common::get_endpoint(),Common::get_request_data());
		$api->endpoint();
        break;

    case "PUT":
        $api = new MethodPut(Common::get_endpoint(),Common::get_request_data());
		$api->endpoint();
        break;

	case "DELETE":
		$api = new MethodDelete(Common::get_endpoint());
		$api->endpoint();
		break;

	default:
		Common::send_response(array(
			'code' => 405,
			'status' => 'failed',
			'message' => 'Method not allowed'
		), 405);
}
