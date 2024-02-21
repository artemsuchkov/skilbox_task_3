<?php

$conn = mysqli_init();

//$conn->options(MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);
//$conn->ssl_set(NULL, NULL, '/home/<домашняя директория>/.mysql/root.crt', NULL, NULL);
//$conn->real_connect('rc1d-chp76sv7oa9my5qp.mdb.yandexcloud.net', 'user1', 'Artemiy911!', 'db1', 3306, NULL, MYSQLI_CLIENT_SSL);
$conn->real_connect('rc1d-chp76sv7oa9my5qp.mdb.yandexcloud.net', 'user1', 'Artemiy911!', 'db1', 3306, NULL);

$q = $conn->query('SELECT version()');
$result = $q->fetch_row();
echo($result[0]);

$q->close();
$conn->close();

define('DB_HOST', 'mysql');
define('DB_USER', 'root');
define('DB_PASS', 'rootpassword');
define('DB_NAME', 'test_db');

spl_autoload_register();

use \classes\rest\Common as Common;
use \classes\rest\get\MethodGet as MethodGet;
use \classes\rest\post\MethodPost as MethodPost;
use \classes\rest\put\MethodPut as MethodPut;
use \classes\rest\delete\MethodDelete as MethodDelete;


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
