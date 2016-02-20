<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$msg=str_replace("#addmaster ", "", $message->content);
$ini->data['owners'][$msg] = 1;
$ini->write('config.ini');
?>