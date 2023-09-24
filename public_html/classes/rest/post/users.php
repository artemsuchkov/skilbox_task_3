<?php

namespace classes\rest\post;
use \classes\rest\Common AS Common;
use \classes\db\Connect as Connect;

class Users {

    public function return_answer($endpoint,$data) {

        if (empty($data['FirstName']) OR empty($data['LastName'])) {
            Common::send_response([
                'status' => 'failed',
                'message' => 'Error. Some data are empty!',
            ], 400);
        }

        $conn = Connect::getInstance();
        //print_r($conn->conn);

        $result = mysqli_query($conn->conn," SELECT * FROM `users` WHERE id='1' ");
        $user = mysqli_fetch_array($result);
        //print_r($user);

        if($user["name"])

            Common::send_response([
                'status' => 'success',
                'message' => 'User #1 post'.' '.$user["name"].' '.$data["last_name"].' ' ,
            ], 200);
        
        Common::send_response([
            'status' => 'failed',
            'message' => 'Error. No user!',
        ], 400);
        
    }

}


 