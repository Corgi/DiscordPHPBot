<?php
/*
try{
        \Discord\Helpers\Guzzle::put("guilds/$guildid/bans/$memberid?delete-message-days=1");
    }catch (\Discord\Exceptions\DiscordRequestFailedException $e) {
        $logger->err($e);
    }
    */
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

$canWork = "False";
$iniC = new INI('inis/masters.ini');
$dC = $iniC->read('inis/masters.ini');

$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
$channel = $guild->channels->get('id', $message->channel_id);


if($d['commands']['ban'] == "1")
{
$msg=str_replace($pref."ban ", "", strtolower($message->content));
$goid=str_replace("<@", "", $msg);
$goid=str_replace(">", "", $goid);
$user = \Discord\Parts\User\User::find($goid);
$opt_user=$user->username;
$opt_id=$user->id;
$did=0;


if($msg != $discord->user->username)
{
if(strpos($msg, "@") > 0)
{
	if($dC[$message->full_channel->guild->id][$message->author->id] == 1)
	{


try
{
\Discord\Helpers\Guzzle::put("guilds/".$message->full_channel->guild->id."/bans/".$opt_id."?delete-message-days=1");
$did=$did+1;
$message->channel->sendMessage(":hammer: The user `".$opt_user."` has been banned from `".$message->full_channel->guild->name."`");
} catch (DiscordRequestFailedException $e) {

	$req="```ruby"."\n";
$guild = $discord->guilds->get('name', $d['settings']['server']);
$channel = $guild->channels->get('name', "error_reports"); // you can change 'name' to any other attribute if you want
$channel->sendMessage("`Automatic Error Report:` Someone ran into an error!\n ".$req."User: " . $message->author->username . " Guild: ".$message->full_channel->guild->name."\nFile: ban.php\nError Message:\n".$e->getMessage()."```");



$did=$did+1;
// continue;
} // end of try

/*
if($did > 0)
{
try
{
$message->channel->sendMessage("I don't have permissions to kick people in `" . $message->full_channel->guild->name . "`");
} catch (PartRequestFailedException $e) {
}

}
*/




	}
	else
	{
		$did=$did+1;

		try
		{
		$message->channel->sendMessage("You're not one of my masters on `".$message->full_channel->guild->name."`");
		} catch (PartRequestFailedException $e) {
		}


	}
}
else
{
	$did=$did+1;

	try
	{
$message->channel->sendMessage("You need to mention the user by using `@`");
} catch (PartRequestFailedException $e) {
}


} // end of strpos make sure it's a mention.
} // canwork = true and the user is not myself.

if($did == 0)
{

	try
	{
	$message->channel->sendMessage("I don't have permissions on this server.");
	} catch (PartRequestFailedException $e) {
	}

	
}


}
else
{
echo "This command is disabled. \n";
}

} // this cmd only words in server
?>

