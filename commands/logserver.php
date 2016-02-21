<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$msg=str_replace("#logserver ", "", $message->content);
$ini->data['log']['server'] = $msg;
$ini->write('config.ini');
$message->channel->sendMessage(":hash: You've setup a server log."); 
?>