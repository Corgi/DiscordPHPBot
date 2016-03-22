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

if($d['commands']['logchannel'] == "1")
{
$msg=str_replace($pref."logchannel ", "", $message->content);
$fixmsg=str_replace(" ", "_", $msg);
$ini->data['settings']['log_channel'] = $fixmsg;
$ini->write('config.ini');
$global->sendMessage(":hash: You've setup a log channel."); 
}
else
{
echo "This command is disabled. \n";
}

}

?>