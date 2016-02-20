<?php
	
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
?>