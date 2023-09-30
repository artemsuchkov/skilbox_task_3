<?php

namespace classes\rest\get;
use \classes\rest\Common AS Common;
use \classes\service\get\Users as ServiceUsers;

class Users {

    public function return_answer($endpoint) {

        $service = new ServiceUsers;
        
        $result = $service->business_logic($endpoint);

        if($result)

            return \classes\rest\Common::send_response([
                'status' => 'success',
                'message' => "User #{$result['id']}: {$result['name']} {$result['last_name']}",
            ], 200);

        Common::send_response([
            'status' => 'failed',
            'message' => 'User does\'t exist',
        ], 400);
        
    }

}


 