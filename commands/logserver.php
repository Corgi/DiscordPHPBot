<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];
if($d['commands']['logserver'] == "1")
{
$msg=str_replace($pref."logserver ", "", $message->content);
$ini->data['log']['server'] = $msg;
$ini->write('config.ini');
$message->channel->sendMessage(":hash: You've setup a server log."); 
}
else
{
$message->reply("This command is disabled.");
}
?>