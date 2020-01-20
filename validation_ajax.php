<?php
require_once("validation_class.php");
header("Content-Type: application/json");
if (isset($_POST) && count($_POST)>0){
    $validate = new Validate();
    $temp = array("response" => $validate->validate_form($_POST));
    $response = json_encode($temp);
    echo $response;

    require_once("postlog.php");   
}
?>