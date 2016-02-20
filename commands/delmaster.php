<?php
$ini2 = new INI('config.ini');
// $d2 = $ini2->read('config.ini');
$msg2=str_replace("#delmaster ", "", $message->content);
unset($ini2->data['owners'][$msg2]);
$ini2->write('config.ini');
?>