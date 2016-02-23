<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

if($d['commands']['mimic'] == "1")
{
$msg=str_replace($pref."mimic ", "", $message->content);
$message->channel->sendMessage(":speaker: " . $msg); 
// echo var_dump($message);
}
else
{
$message->reply("This command is disabled.");
}
?>