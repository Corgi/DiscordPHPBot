<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');

	if($d['commands']['restart'] == "1")
	{
if($message->author->username == $d['settings']['owner'])
{

$message->channel->sendMessage(":heavy_exclamation_mark: Restarting Bot");
exec('c:\WINDOWS\system32\cmd.exe /c START '. $_SERVER['DOCUMENT_ROOT'] . '\Paradox\DiscordPHPBot\Restart.bat');
die;
}
else
{
$message->channel->sendMessage(":exclamation: Only the Bot Owner: **".$d['settings']['owner']."** can Restart me.");
} // end of bot owner check

	}
	else
	{
	$message->reply("This command is disabled.");
	}

?>