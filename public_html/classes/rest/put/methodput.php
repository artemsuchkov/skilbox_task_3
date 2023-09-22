<?php

namespace classes\rest\put;
use \classes\rest\Common AS Common;

class MethodPut {

    private $endpoint;
    private $data;

    public function __construct($endpoint,$data) {
        $this->endpoint = $endpoint;
        $this->data = $data;
    }

    public function endpoint() {
        
        $class_name = '\\classes\\rest\\put\\'.$this->endpoint[0];

        if (class_exists($class_name)) {
            $ans = new $class_name;
            $ans->return_answer($this->endpoint,$this->data);
        }

        else {
            Common::send_response([
				'status' => 'failed',
				'message' => 'No method allow',
			], 400);
        }

    }

}


 