<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];
if($d['commands']['unmute'] == "1")
{
$msg=str_replace($pref . "unmute ", "", $message->content);
unset($ini->data['muted'][$msg]);
$ini->write('config.ini');
$message->channel->sendMessage("`" . $msg . "` can now speak in channel.");
}
else
{
$message->reply("This command is disabled.");
}
?>