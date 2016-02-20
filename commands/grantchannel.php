<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$msg=str_replace("#grantchannel ", "", $message->content);
$ini->data['channels'][$msg] = 1;
$ini->write('config.ini');
?>