<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

if($d['commands']['addmaster'] == "1")
{
$msg=str_replace($pref."addmaster ", "", $message->content);
$ini->data['owners'][$msg] = 1;
$ini->write('config.ini');
$message->channel->sendMessage(":exclamation: " . $msg . " Has been added to my **masters list**");
}
else
{
$message->reply("This command is disabled.");
}
?>