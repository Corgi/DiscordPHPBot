<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$msg=str_replace($pref."setprefix ", "", $message->content);
$ini->data['settings']['Prefix'] = $msg;

if($d['commands']['setprefix'] == "1")
{

$ini->write('config.ini');
$message->channel->sendMessage(":exclamation: My command prefix has been changed to `" . $msg . "`");
}
else
{
$message->reply("This command is disabled.");
}
?>