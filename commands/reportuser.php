<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$msg=str_replace("#reportuser ", "", $message->content);
$msg2=explode(" ", $msg);

$reportmsg=str_replace("#reportuser " . $msg2[0], "", $message->content);
$ini->data['report'][$msg2[0]] = $reportmsg;
$ini->write('config.ini');
?>