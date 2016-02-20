<?php
$msg=str_replace("#mimic ", "", $message->content);
$message->channel->sendMessage(":speaker: " . $msg); 
// echo var_dump($message);
?>