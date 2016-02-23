<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

$msg=str_replace($pref."disable ", "", $message->content);
$ini->data['commands'][$msg] = 0;
$ini->write('config.ini');
$message->channel->sendMessage(":exclamation: `" . $pref.$msg . "` Is now **disabled**");

?>