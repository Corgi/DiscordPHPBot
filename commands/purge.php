<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');

if($d['commands']['purge'] == "1")
{
		$rmmessages = $dat[1];
		$channel = $message->channel;
		$num = 0;
		$channel->message_count = $rmmessages + 1;

		foreach ($channel->messages as $key => $message) {
			try {
				$message->delete();
			} catch (PartRequestFailedException $e) {
				continue;
			}
			$num++;
		}

		$message->reply("Purged {$num} messages.");
		
}
else
{
$message->reply("This command is disabled.");
}
?>