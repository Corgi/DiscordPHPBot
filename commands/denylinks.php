<?php
$ini = new INI('config.ini');
// $d = $ini->read('config.ini');
// $msg=str_replace("#allowlinks ", "", $message->content);
$ini->data['linkProtect'][$message->full_channel->guild->name] = 1;
$ini->write('config.ini');
?>