<?php
use Discord\Exceptions\DiscordRequestFailedException;
use Discord\Exceptions\InviteInvalidException;
use Discord\Exceptions\PartRequestFailedException;
$pref=$p[$message->full_channel->guild->id]['Prefix'];
if($pref == "")
{
$global->sendMessage("You can't use this command in `private message`");
}
else
{
$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
$cndd="Yes";
$damn=0;
$did=0;
$opt=str_replace($pref."flush ", "", $message->content);
if(isset($guild))
{
$channel = $guild->channels->get('id', $message->channel_id);
if($d['commands']['flush'] == "1")
{
if($dD[$message->full_channel->guild->id][$message->author->id] != "")
{
$response = "```fix"."\n";
// echo $opt.PHP_EOL;
if($opt <= 50)
{
		$rmmessages = $opt;
		$channel = $message->channel;
		$num = 0;
		$channel->message_count = $rmmessages + 1;
		foreach ($channel->message_history as $key => $message) {
			if($cndd == "Yes")
			{
			try {
				$message->delete();
			} catch (PartRequestFailedException $e) {
				continue;
				$cndd="No";
			}
			$num++;
			}
		}
$new=$opt - $num;
if($num < $opt)
{
		$rmmessages = $new;
		$channel = $message->channel;
		$num = 0;
		$channel->message_count = $rmmessages + 1;
		foreach ($channel->message_history as $key => $message) {
			if($cndd == "Yes")
			{

			try {
				$message->delete();
			} catch (PartRequestFailedException $e) {
			$message->reply("I don't have permissions to do this. I can only delete my messages right now.");
			$cndd="No";
			}
			$num++;

			}
		}
} // try to delete again if it didn't work.
if($cndd != "No")
{
$message->channel->sendMessage("Flushed {$num} messages.");
}
}
else
{
$message->reply("Sorry i can only flush 50 or less messages at the moment.");
}
}
else
{
		 $user = \Discord\Parts\User\User::find($message->author->id);
	 $user->sendMessage("You're not one of my masters on `".$message->full_channel->guild->name."`");
} // end of is owner command
}
else
{
echo "This command is disabled. \n";
} // end of disabled check
} // check if guild is valid.
} // this cmd only works in server
?>
