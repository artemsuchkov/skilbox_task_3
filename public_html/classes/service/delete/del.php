<?php

namespace classes\service\delete;
use \classes\db\Connect as Connect;

class Del {

    public function business_logic($endpoint) {
        
        $user_id = (int)$endpoint[1];

        $connect = new Connect;

        $user_id = $connect->cnt(" SELECT id count FROM `users` WHERE id  = '{$user_id}' AND deleted_at IS NULL ");

        if(empty($user_id))

            return false;

        if(!$connect->update(" UPDATE `users` SET deleted_at = now() WHERE id = '{$user_id}' "))

            return false;

        return $user_id;

    }

}


 