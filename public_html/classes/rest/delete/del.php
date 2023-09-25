<?php

namespace classes\rest\delete;
use \classes\rest\Common AS Common;
use \classes\db\Connect as Connect;

class Del {

    public function return_answer($endpoint) {

        $user_id = (int)$endpoint[1];

        $connect = new Connect;

        $user_id = $connect->cnt(" SELECT id count FROM `users` WHERE id  = '{$user_id}' AND deleted_at IS NULL ");

        if(empty($user_id))

            Common::send_response([
                'status' => 'failed',
                'message' => 'User does\'t exist',
            ], 400);

        if(!$connect->update(" UPDATE `users` SET deleted_at = now() WHERE id = '{$user_id}' "))

            Common::send_response([
                'status' => 'failed',
                'message' => 'User does\'t exist',
            ], 400);

        return \classes\rest\Common::send_response([
            'status' => 'success',
            'message' => "User #{$user_id} is delete",
        ], 200);

    }

}


 