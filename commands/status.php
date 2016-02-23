<?php
		$ini2 = new INI('config.ini');
		$dd = $ini2->read('config.ini');
		$pref=$dd['settings']['Prefix'];
		if($d['commands']['status'] == "1")
{
//		$message->reply("Attempting status change.:: ");
		$nerd=str_replace($pref."status ", "", $message->content);
		$discord->updatePresence($ws, $nerd, false);
		$ini2->data['settings']['status'] = $nerd;
		$ini2->write('config.ini');
		}
		else
		{
		$message->reply("This command is disabled.");
		}
?>