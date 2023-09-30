<?php

namespace classes\service\post;
use \classes\db\Connect as Connect;

class Users {

    public function business_logic($endpoint,$data) {
        
        if (empty($data['FirstName']) OR empty($data['LastName'])) {
            return false;
        }

        $connect = new Connect;
        $data['FirstName'] = $connect->safe($data['FirstName']);
        $data['LastName'] = $connect->safe($data['LastName']);

        $result = $connect->add(" INSERT INTO `users` (`name`,`last_name`) VALUES ('{$data['FirstName']}','{$data['LastName']}')");

        if($result)

            return $result;

        return false;

    }

}


 