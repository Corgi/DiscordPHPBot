<?php
use Discord\Exceptions\PartRequestFailedException;

$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniD = new INI('inis/masters.ini');
$dD = $ini->read('inis/masters.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
if($pref == "")
{
$pref=$thepref;
}

    $f = 'C:\xampp\htdocs\Paradox\DiscordPHPBot';


$memory = dirSize($f);
$memory = format_size($memory);



$global->sendMessage("My current memory is `".$memory."`");



