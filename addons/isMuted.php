<?php
// ############# Mute Addon begins here ##################

foreach( $datas['muted'] as $key=>$data )
{
if($message->author->username == $key)
{
$redata = $data;

		$rmmessages = 0;
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
		$message->channel->sendMessage(":no_entry_sign: " . $den . " You have been muted. **Reason:** *" . $redata . "*"); 
}
}
// #########################################################

?>