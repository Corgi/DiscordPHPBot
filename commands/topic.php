<?php
use Discord\Exceptions\PartRequestFailedException;


$ini = new INI('config.ini');
$d = $ini->read('config.ini');
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

$chpos=0;
$did=0;
$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
$channel = $guild->channels->get('id', $message->channel_id);


if($d['commands']['topic'] == "1")
{


	if($dD[$message->full_channel->guild->id][$message->author->id] == 1)
	{


$msg=str_replace($pref."topic ", "", $message->content);
$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
$channel = $guild->channels->get('id', $message->channel_id);
$chpos=$channel->position;
$name=$channel->name;
			// $channel = new \Discord\Parts\Channel\Channel();
			// $channel->name = $name;
			// $channel->type = $sp[1];
			// $channel->guild_id = $g2;
			
			$channel->topic = $msg;
			$channel->position = $chpos; 
			try {
			$channel->save();
			$did=$did+1;
			$message->channel->sendMessage("Topic attempt set to " . $msg . " Channel position was: " . $chpos . " And is now: " . $channel->position); 
			} catch (PartRequestFailedException $e) {

				$req="```ruby"."\n";
$guild = $discord->guilds->get('name', $d['settings']['server']);
$channel = $guild->channels->get('name', "error_reports"); // you can change 'name' to any other attribute if you want
$channel->sendMessage("`Automatic Error Report:` Someone ran into an error!\n ".$req."User: " . $message->author->username . " Guild: ".$message->full_channel->guild->name."\nFile: topic.php\nError Message:\n".$e->getMessage()."```");

					try
					{
				$message->channel->sendMessage("Something happened, probably permission issues. \n ```".$e->getMessage()."```");
				} catch (PartRequestFailedException $e) {
				}


			//	continue;
			} // end of try

// echo var_dump($message);
}
else
{

	try
	{
$message->channel->sendMessage("You're not one of my bot masters on this server.");	
} catch (PartRequestFailedException $e) {
}


}


}
else
{
echo "This command is disabled. \n";
}

} // only works in server
?>