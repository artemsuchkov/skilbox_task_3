<?php
/*
include("classes/rest/common.php");
include("classes/rest/get/get.php");
include("classes/rest/get/users.php");
include("classes/rest/post/post.php");
include("classes/rest/post/users.php");
include("classes/rest/put/put.php");
include("classes/rest/put/update.php");
include("classes/rest/delete/delete.php");
include("classes/rest/delete/del.php");
*/

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
	


	// POST request
	// Store some data or something
	if ($method === 'POST' ) {
		
		if(Common::get_endpoint()[0] == 'users') {
		
			// You'd normally do stuff here...

			// Example: Check that all required data was provided
			if (empty($data['FirstName']) OR empty($data['LastName'])) {
				Common::send_response([
					'status' => 'failed',
					'message' => 'Error. Some data are empty!',
				], 400);
			}

			// If there are no issues, save your data or something...

			// Then, respond with a success
			Common::send_response([
				'status' => 'success',
				'message' => "User added ",
			]);
		
		}
		
		Common::send_response([
			'status' => 'failed',
			'message' => 'This method not allow!',
		], 400);

	}




	if ($method === 'PUT' ) {
		
		if(Common::get_endpoint()[0] == 'update') {
		
			
			if( Common::get_endpoint()[1] == "1" ) {
			
				if (empty($data['FirstName']) OR empty($data['LastName'])) {
					Common::send_response([
						'status' => 'failed',
						'message' => 'Error. Some data are empty!',
					], 400);
				}

				Common::send_response([
					'status' => 'success',
					'message' => 'User #1 update data',
				], 200);

			}	
			
			Common::send_response([
				'status' => 'failed',
				'message' => 'No user to update',
			], 400);
			
		
		}
		
		Common::send_response([
			'status' => 'failed',
			'message' => 'This method not allow!',
		], 400);

		

	}





	if ($method === 'DELETE' ) {
		
		if(Common::get_endpoint()[0] == 'delete') {
		
			
			if( Common::get_endpoint()[1] == "1" ) {
			
				Common::send_response([
					'status' => 'success',
					'message' => 'User #1 deleted',
				], 200);

			}	
			
			Common::send_response([
				'status' => 'failed',
				'message' => 'No user to delete',
			], 400);
			
		
		}
		
		Common::send_response([
			'status' => 'failed',
			'message' => 'This method not allow!',
		], 400);

		

	}







	// All other request methods
	

