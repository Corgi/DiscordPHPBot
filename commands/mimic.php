<?php
use Discord\Exceptions\PartRequestFailedException;


$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
if($pref == "")
{
$pref=$thepref;
}


if($d['commands']['mimic'] == "1")
{
$msg=str_replace($pref."mimic ", "", $message->content);

try
{
$global->sendMessage($msg); 
} catch (PartRequestFailedException $e) {
}


// echo var_dump($message);
}
else
{
echo "This command is disabled. \n";
}
?>