<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

$msg=str_replace($pref."enable ", "", $message->content);
$ini->data['commands'][$msg] = 1;
$ini->write('config.ini');
$message->channel->sendMessage(":exclamation: `" . $pref.$msg . "` Is now **enabled**");
?>