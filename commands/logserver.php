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
if($d['commands']['logserver'] == "1")
{
$msg=str_replace($pref."logserver ", "", $message->content);
$ini->data['settings']['server'] = $msg;
$ini->write('config.ini');
$message->channel->sendMessage(":hash: You've setup a server log."); 
}
else
{
echo "This command is disabled. \n";
}
}
?>