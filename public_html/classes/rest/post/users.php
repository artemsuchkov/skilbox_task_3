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

        $connect = new Connect;
        $data['FirstName'] = $connect->safe($data['FirstName']);
        $data['LastName'] = $connect->safe($data['LastName']);

        $result = $connect->add(" INSERT INTO `users` (`name`,`last_name`) VALUES ('{$data['FirstName']}','{$data['LastName']}')");

        if($result)

            Common::send_response([
                'status' => 'success',
                'message' => 'User added',
            ], 200);
        
        Common::send_response([
            'status' => 'failed',
            'message' => 'Error',
        ], 400);
        
    }

}


 