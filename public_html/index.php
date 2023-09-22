<?php

spl_autoload_register();

use \classes\rest\Common as Common;
use \classes\rest\get\MethodGet as MethodGet;
use \classes\rest\post\MethodPost as MethodPost;
use \classes\rest\put\MethodPut as MethodPut;
use \classes\rest\delete\MethodDelete as MethodDelete;

$data = Common::get_request_data();

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
