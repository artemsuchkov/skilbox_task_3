<?php

namespace classes\rest\put;
use \classes\rest\Common AS Common;
use \classes\service\put\Update as ServiceUpdate;

class Update {

    public function return_answer($endpoint,$data) {

        $service = new ServiceUpdate;
        
        $result = $service->business_logic($endpoint,$data);

        if($result)

            return \classes\rest\Common::send_response([
                'status' => 'success',
                'message' => "User #{$result} is update",
            ], 200);

        Common::send_response([
            'status' => 'failed',
            'message' => 'Error',
        ], 400);
    }

}


 