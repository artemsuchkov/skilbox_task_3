<?php

namespace classes\rest\get;

class Users {

    public function return_answer($endpoint) {
        return \classes\rest\Common::send_response([
            'status' => 'success',
            'message' => 'User #1 datafffff'.' '.$endpoint[0],
        ], 200);
    }

}


 