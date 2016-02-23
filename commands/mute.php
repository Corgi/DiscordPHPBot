<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

if($d['commands']['mute'] == "1")
{
$msg=str_replace($pref."mute ", "", $message->content);
$msg2=explode(" ", $msg);
$reportmsg=str_replace($pref."mute " . $msg2[0], "", $message->content);
$ini->data['muted'][$msg2[0]] = $reportmsg;
$ini->write('config.ini');
$message->channel->sendMessage("`" . $msg . "` Has been muted.");
}
else
{
$message->reply("This command is disabled.");
}
?>