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

	if($d['commands']['restart'] == "1")
	{
if($message->author->id == $d['settings']['owner'])
{

$global->sendMessage(":heavy_exclamation_mark: Restarting Bot");
exec('C:\Windows\System32\cmd.exe" /cmd '. $_SERVER['DOCUMENT_ROOT'] . '/Paradox/DiscordPHPBot/StartBot.bat');
die;
}
else
{
$global->sendMessage(":exclamation: Only the Bot Owner: **".$d['settings']['owner']."** can Restart me.");
} // end of bot owner check

	}
	else
	{
	echo "This command is disabled. \n";
	}

?>