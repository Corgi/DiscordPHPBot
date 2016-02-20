<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$msg=str_replace("#afk ", "", $message->content);
$usrid=$message->author;
$message->channel->sendMessage(":clock1: You're now AFK: " . $msg);
$ini->data['afk'][$message->author->username] = $message->author . "€" . $msg;
$ini->write('config.ini');
?>
