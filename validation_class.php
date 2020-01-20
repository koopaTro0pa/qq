<?php

class Validate{
    private $users = array( 
        array("id" => 1, "email" => "admin@admin.com"),
        array("id" => 2, "email" => "prodam@garaj.ru")
    );
    
    private function validate_name($name){
        $response["result"] = $name ? (bool)preg_match("/^[A-Za-z]{2,}$/", $name) : false;
        $response["message"] = $response["result"] ? null : "Введите корректное имя";
        return $response;
    }
    
    private function validate_surname($surname){
        $response["result"] = $surname ? (bool)preg_match("/^[A-Za-z]{2,}$/", $surname) : false;
        $response["message"] = $response["result"] ? null : "Введите корректную фамилию";
        return $response;
    }
    
    private function validate_email($email){
        $response["result"] = $email && preg_match("/^[a-zA-Z0-9_\-.\+]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,}$/", $email);
        $response["message"] = $response["result"] ? null : "Некорректный e-mail";
        if ($response["result"]){
            foreach ($this->users as $user){
                if (!strcasecmp($email,$user["email"])){
                    $response["result"] = false;
                    break;
                }
            }
            $response["message"] = $response["result"] ? null : "Этот e-mail уже зарегистрирован";
        } 
        return $response;
    }
    
    private function validate_password_length($password){
        $response["result"] = strlen($password) > 4;
        $response["message"] = $response["result"] ? null : "Пароль должен быть длиннее 4х символов";
        return $response;
    }
    
    private function validate_password_check($password, $password_check){
        $response["result"] = !strcmp($password,$password_check);
        $response["message"] = $response["result"] ? null : "Пароли не совпадают";
        return $response;
    }
    
    public function validate_form($args){
        $field_results[] = ["name", $this->validate_name($args["name"])];
        $field_results[] = ["surname", $this->validate_surname($args["surname"])];
        $field_results[] = ["email", $this->validate_email($args["email"])];
        $field_results[] = ["password", $this->validate_password_length($args["password"])];
        $field_results[] = ["password_check", $this->validate_password_check($args["password"], $args["password_check"])];
        
        $responses = array("false" => array(), "true"=> array());
        
        foreach ($field_results as $result){
            if (!$result[1]["result"]) $responses["false"][] = array($result[0], $result[1]["message"]);
            else $responses["true"][] = $result[0];
        }
        return $responses;
    }
}
?>