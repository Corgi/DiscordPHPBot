<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

if($d['commands']['delreport'] == "1")
{
$msg=str_replace($pref."delreport ", "", $message->content);
unset($ini->data['report'][$msg]);
$ini->write('config.ini');
$message->channel->sendMessage("Deleted report: `" . $msg . "`");
}
else
{
$message->reply("This command is disabled.");
}
?>