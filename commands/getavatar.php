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
	
if($d['commands']['getavatar'] == "1")
{
$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
$members = $guild->members; // Returns a collection of members
$nerd=str_replace($pref."getavatar ", "", strtolower($message->content));
$goid=str_replace("<@", "", $nerd);
$goid=str_replace(">", "", $goid);
$user = \Discord\Parts\User\User::find($goid);
$opt_user=$user->username;
$opt_id=$user->id;
$did=0;

	if(strpos($nerd, "@") > 0)
	{
		$getstatus = $members->get('username', $opt_user);
		$getimg = $getstatus->user->avatar;
		try
		{
		$message->channel->sendMessage($opt_user . "'s Avatar: " . $getimg);
		} catch (PartRequestFailedException $e) {
		}

	}
	else
	{
		try
		{
		$message->channel->sendMessage("You need to mention the user by using `@`");
		} catch (PartRequestFailedException $e) {
		}

		
	}

}
else
{
echo "This command is disabled. \n";
}


} // this command only works with mentions, thus SERVER ONLY.
?>