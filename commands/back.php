<?php
use Discord\Exceptions\PartRequestFailedException;

$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');

$iniA = new INI('inis/afk.ini');
$dA = $iniA->read('inis/afk.ini');

$pref=$p[$message->full_channel->guild->id]['Prefix'];

if($pref == "")
{
$pref=$thepref;
}

if($d['commands']['back'] == "1")
{

	if($dA[$message->author->id]['AFK'] == "True")
	{
	$iniA->data[$message->author->id]['AFK'] = "False";
	unset($_SESSION[$message->full_channel->guild->name.'_'.$message->author->username.'_afk_bot_spam']);
	$iniA->write('inis/afk.ini');
	try
	{
	$global->sendMessage(":white_check_mark: Welcome back, I have removed your AFK Status.");
	} catch (PartRequestFailedException $e) {
	}

	}
	else
	{
	try
	{
	$global->sendMessage(":white_check_mark: Welcome back, I have removed your AFK Status.");
	} catch (PartRequestFailedException $e) {
	}
	}
}
else
{
echo "This command is disabled. \n";
}
?>