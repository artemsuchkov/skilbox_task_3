<?php

namespace classes\service\get;
use \classes\db\Connect as Connect;

class Users {

    public function business_logic($endpoint) {
        
        $result = (new Connect)->findOne(" SELECT * FROM `users` WHERE id = '".(int)$endpoint[1]."' AND deleted_at IS NULL ");

        if($result)

            return $result;

        return false;

    }

}


 