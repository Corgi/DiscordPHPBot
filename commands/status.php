<?php
$ini2 = new INI('config.ini');
$dd = $ini2->read('config.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
if($pref == "")
{
$pref=$thepref;
}

if($d['settings']['owner'] == $message->author->id)
{

		if($d['commands']['status'] == "1")
{
//		$message->reply("Attempting status change.:: ");
		$nerd=str_replace($pref."status ", "", $message->content);
		$discord->updatePresence($this->ws, $nerd, false);
		$ini2->data['settings']['status'] = $nerd;
		$ini2->write('config.ini');
		//$message->reply("Status Successfully Changed to **".$nerd."!**");
		}
		else
		{
		echo "This command is disabled. \n";
		}

	}
	
?>
