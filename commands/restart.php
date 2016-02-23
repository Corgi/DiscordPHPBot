<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');

if($d['commands']['restart'] == "1")
{

	$message->channel->sendMessage(":heavy_exclamation_mark: Restarting Bot");
	exec('c:\WINDOWS\system32\cmd.exe /c START '. $_SERVER['DOCUMENT_ROOT'] . '\Paradox\DiscordPHPBot\Restart.bat');
	die;
	}
	else
	{
	$message->reply("This command is disabled.");
	}
?>