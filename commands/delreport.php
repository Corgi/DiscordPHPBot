<?php
$ini = new INI('config.ini');
// $d = $ini->read('config.ini');
$msg=str_replace("#delreport ", "", $message->content);
unset($ini->data['report'][$msg]);
$ini->write('config.ini');
$message->channel->sendMessage("Deleted report: `" . $msg . "`");
?>