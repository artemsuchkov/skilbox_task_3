<?php

namespace classes\rest\delete;
use \classes\rest\Common AS Common;

class Del {

    public function return_answer($endpoint) {

        Common::send_response([
            'status' => 'success',
            'message' => 'User #1 delete',
        ], 200);
        
    }

}


 