<?php
    date_default_timezone_set("Europe/Moscow");
    $text = "META: " . $_SERVER["REMOTE_ADDR"] . " [" . date("d.m.Y H:i:s") . "] / ";
    $text = $text . "TYPE: form / ";
    $result = count($temp["response"]["false"]) ? "false" : "true";
    $text = $text . " RESULT: " . $result . " / ARGS:";
    foreach ($_POST as $field => $value){
        $text = $text . " " . $field . "=" . $value;
    }
    $desc = fopen("requests.log", "a");
    fwrite($desc, $text . "\r\n");
    fclose($desc);
?>