<?php
use Discord\Exceptions\PartRequestFailedException;

$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$canWork = "False";
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');
if($pref == "")
{
$global->sendMessage("You can't use this command in `private message`");
}
else
{

$damn=0;
$did=0;

$opt=str_replace($pref."flush ", "", $message->content);

$guild = $discord->guilds->get('name', $message->full_channel->guild->name);

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
		foreach ($channel->messages as $key => $message) {
			try {
				$message->delete();
			} catch (PartRequestFailedException $e) {
				continue;
			}
			$num++;
		}

$new=$opt - $num;

if($num < $opt)
{

		$rmmessages = $new;
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



} // try to delete again if it didn't work.


$message->reply("Flushed {$num} messages.");
	


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