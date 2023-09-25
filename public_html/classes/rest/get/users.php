<?php

namespace classes\rest\get;
use \classes\rest\Common AS Common;
use \classes\db\Connect as Connect;

class Users {

    public function return_answer($endpoint) {

        if(is_numeric($endpoint[1])) {

            $result = (new Connect)->findOne(" SELECT * FROM `users` WHERE id = '{$endpoint[1]}' AND deleted_at IS NULL ");

            if(!empty($result))

                return \classes\rest\Common::send_response([
                    'status' => 'success',
                    'message' => "User #{$result['id']}: {$result['name']} {$result['last_name']}",
                ], 200);

            Common::send_response([
                'status' => 'failed',
                'message' => 'User does\'t exist',
            ], 400);

        }

        Common::send_response([
            'status' => 'failed',
            'message' => 'User id is not number',
        ], 400);
    }

}


 