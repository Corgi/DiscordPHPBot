<?php
		$ini2 = new INI('config.ini');
		$dd = $ini2->read('config.ini');
//		$message->reply("Attempting status change.:: ");
		$nerd=str_replace("#status ", "", $message->content);
		$discord->updatePresence($ws, $nerd, false);
		$ini2->data['settings']['status'] = $nerd;
		$ini2->write('config.ini');
?>