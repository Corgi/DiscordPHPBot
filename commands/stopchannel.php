<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$msg=str_replace("#stopchannel ", "", $message->content);
unset($ini->data['channels'][$msg]);
$ini->write('config.ini');
?>
