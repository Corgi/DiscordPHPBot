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


	$past_time = $d['settings']['uptime'];
	$current_time = time();
	$diff = $current_time - $past_time;
	$days = floor($diff/(24*60*60));
	$remainder = $diff - $days*(24*60*60);
	$hours = floor($remainder/3600);
	$remainder = $remainder - ($hours*60*60);
	$minutes = floor($remainder/60);
	$seconds = $remainder-$minutes*60;

if($days > 0)
{
$days1 = $days . " Days ";
}
if($hours > 0)
{
$hours1 = $hours . " Hours ";
}
if($minutes > 0)
{
$minutes1 = $minutes . " Minutes ";
}


	$uptime=$days1 . $hours1 . $minutes1 . $seconds . " Seconds.";


$global->sendMessage("Current uptime is `".$uptime."`");


