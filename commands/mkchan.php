<?php
use Discord\Exceptions\PartRequestFailedException;


$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
if($pref == "")
{
$global->sendMessage("You can't use this command in `private message`");
}
else
{

$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');
$isOwner=0;
$canWork = "False";

$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
$channel = $guild->channels->get('id', $message->channel_id);



if($d['commands']['mkchan'] == "1")
{
$mkdat=str_replace($pref."mkchan ", "", strtolower($message->content));
$sp=explode(" ", $mkdat);


if($dD[$message->full_channel->guild->id][$message->author->id] == 1)
{
	$isOwner=1;
}


	if($isOwner == 1)
		{

			$guild = $discord->guilds->get('name', $message->full_channel->guild->name); // 
			$g2 = $guild->id; // 

  			  $everyone_role = $guild->roles->get('name', '@everyone');

			$allow = new \Discord\Parts\Permissions\ChannelPermission;
			$allow->create_instant_invite = true;
			$allow->read_messages = true;
			$allow->send_messages = true;
			$allow->read_message_history = true;
			$deny = new \Discord\Parts\Permissions\ChannelPermission;
			$deny->manage_permissions = true;
			$deny->manage_channel = true;
			$deny->send_tts_messages = true;
			$deny->embed_links = true;
			$deny->attach_files = true;
			$deny->manage_messages = true;


			$channel = new \Discord\Parts\Channel\Channel();
			$channel->name = $sp[0];
			$channel->type = $sp[1];
			$channel->guild_id = $g2; 
			try { 
			$channel->save();
			$channel->setPermissions($everyone_role, $allow, $deny);
		} catch (PartRequestFailedException $e) {
$message->channel->sendMessage("Something happened, probably permission issues. \n ```".$e->getMessage()."```");

$req="```ruby"."\n";
$guild = $discord->guilds->get('name', $d['settings']['server']);
$channel = $guild->channels->get('name', "error_reports"); // you can change 'name' to any other attribute if you want
$channel->sendMessage("`Automatic Error Report:` Someone ran into an error!\n ".$req."User: " . $message->author->username . " Guild: ".$message->full_channel->guild->name."\nFile: mkchan.php\nError Message:\n".$e->getMessage()."```");


// continue;
		} // end of try n catch

}		// $channel->save();
else
{

	try
	{
$message->channel->sendMessage("You're not one of my masters on this server.");
} catch (PartRequestFailedException $e) {
}


} // end of isOwner 


}
else
{
echo "This command is disabled. \n";
}

}
?>
