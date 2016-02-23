<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

if($d['commands']['logchannel'] == "1")
{
$msg=str_replace($pref."logchannel ", "", $message->content);
$fixmsg=str_replace(" ", "_", $msg);
$ini->data['log']['channel'] = $fixmsg;
$ini->write('config.ini');
$message->channel->sendMessage(":hash: You've setup a log channel."); 
}
else
{
$message->reply("This command is disabled.");
}

?>