<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
if($pref == "")
{
$pref=$thepref;
}

if($d['settings']['owner'] == $message->author->id)
{
$msg=str_replace($pref."enable ", "", $message->content);
$ini->data['commands'][$msg] = 1;
$ini->write('config.ini');
$message->channel->sendMessage(":exclamation: `" . $pref.$msg . "` Is now **enabled**");
}

?>
