<?php

namespace classes\service\put;
use \classes\db\Connect as Connect;

class Update {

    public function business_logic($endpoint,$data) {
        
        if (empty($data['FirstName']) OR empty($data['LastName'])) 
            return false;
        
        $connect = new Connect;

        $user_id = $connect->cnt(" SELECT id count FROM `users` WHERE id  = '".(int)$endpoint[1]."' AND deleted_at IS NULL ");

        if(empty($user_id))
            return false;

        $data['FirstName'] = $connect->safe($data['FirstName']);
        $data['LastName'] = $connect->safe($data['LastName']);

        $result = (new Connect)->update(" UPDATE `users` SET name = '{$data['FirstName']}', last_name = '{$data['LastName']}' WHERE id = '{$user_id}' ");

        if($result) 
            return $user_id;
        

    }

}


 