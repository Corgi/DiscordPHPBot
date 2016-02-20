<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$msg=str_replace("#delmaster ", "", $message->content);
unset($ini->data['owners'][$msg]);
$ini->write('config.ini');
?>