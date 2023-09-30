<?php

namespace classes\rest\post;
use \classes\rest\Common AS Common;
use \classes\service\post\Users as ServiceUsers;

class Users {

    public function return_answer($endpoint,$data) {

        $service = new ServiceUsers;
        
        $result = $service->business_logic($endpoint,$data);

        if($result)

            return \classes\rest\Common::send_response([
                'status' => 'success',
                'message' => "User #{$result} added",
            ], 200);

        Common::send_response([
            'status' => 'failed',
            'message' => 'Error',
        ], 400);
        
    }

}


 