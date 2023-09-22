<?php

namespace classes\rest\post;
use \classes\rest\Common AS Common;

class Users {

    public function return_answer($endpoint,$data) {

        if (empty($data['FirstName']) OR empty($data['LastName'])) {
            Common::send_response([
                'status' => 'failed',
                'message' => 'Error. Some data are empty!',
            ], 400);
        }

        Common::send_response([
            'status' => 'success',
            'message' => 'User #1 post'.' '.$endpoint[0].' '.$data["FirstName"].' '.$data["LastName"],
        ], 200);
    }

}


 