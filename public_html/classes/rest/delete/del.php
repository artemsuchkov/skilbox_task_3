<?php

namespace classes\rest\delete;
use \classes\rest\Common AS Common;
use \classes\service\delete\Del as ServiceDel;

class Del {

    public function return_answer($endpoint) {

        $service = new ServiceDel;
        
        $result = $service->business_logic($endpoint);

        if($result)

            return \classes\rest\Common::send_response([
                'status' => 'success',
                'message' => "User #{$result} is delete",
            ], 200);

        Common::send_response([
            'status' => 'failed',
            'message' => 'User does\'t exist',
        ], 400);
        
    }

}


 