<?php

namespace classes\rest\put;
use \classes\rest\Common AS Common;
use \classes\db\Connect as Connect;

class Update {

    public function return_answer($endpoint,$data) {

        if (empty($data['FirstName']) OR empty($data['LastName'])) {
            Common::send_response([
                'status' => 'failed',
                'message' => 'Error. Some data are empty!',
            ], 400);
        }

        $user_id = (int)$endpoint[1];

        $connect = new Connect;

        $user_id = $connect->cnt(" SELECT id count FROM `users` WHERE id  = '{$user_id}' ");

        if(empty($user_id))

            Common::send_response([
                'status' => 'failed',
                'message' => "User not found",
            ], 400);

        $data['FirstName'] = $connect->safe($data['FirstName']);
        $data['LastName'] = $connect->safe($data['LastName']);

        $result = (new Connect)->update(" UPDATE `users` SET name = '{$data['FirstName']}', last_name = '{$data['LastName']}' WHERE id = '{$user_id}' ");

        if($result)

            Common::send_response([
                'status' => 'success',
                'message' => "User #{$user_id} is update",
            ], 200);
        
        Common::send_response([
            'status' => 'failed',
            'message' => 'Update error',
        ], 400);
    }

}


 