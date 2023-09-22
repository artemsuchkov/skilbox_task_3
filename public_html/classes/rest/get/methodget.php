<?php

namespace classes\rest\get;
use \classes\rest\Common AS Common;

class MethodGet {

    private $endpoint;

    public function __construct($endpoint) {
        $this->endpoint = $endpoint;
    }

    public function endpoint() {
        
        $class_name = '\\classes\\rest\\get\\'.$this->endpoint[0];

        if (class_exists($class_name)) {
            $ans = new $class_name;
            $ans->return_answer($this->endpoint);
        }

        else {
            Common::send_response([
				'status' => 'failed',
				'message' => 'No method allow',
			], 400);
        }

    }

}


 