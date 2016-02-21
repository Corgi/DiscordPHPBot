<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$msg=str_replace("#logchannel ", "", $message->content);
$fixmsg=str_replace(" ", "_", $msg);
$ini->data['log']['channel'] = $fixmsg;
$ini->write('config.ini');
$message->channel->sendMessage(":hash: You've setup a log channel."); 
?>