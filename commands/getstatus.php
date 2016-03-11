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


if($d['commands']['getstatus'] == "1")
{
$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
$members = $guild->members; // Returns a collection of members
$nerd=str_replace($pref."getstatus ", "", strtolower($message->content));
$goid=str_replace("<@", "", $nerd);
$goid=str_replace(">", "", $goid);
$user = \Discord\Parts\User\User::find($goid);
$opt_user=$user->username;
$opt_id=$user->id;
$did=0;


if(strpos($nerd, "@") > 0)
{

$getstatus = $members->get('username', $opt_user);
$usrstatus = $getstatus->game->name;
try
{
$message->channel->sendMessage("**".$opt_user . "'s** status: `" . $usrstatus."`");
} catch (PartRequestFailedException $e) {
}


}
else // strpos mention elseif
{

	try
	{
	$message->channel->sendMessage("You need to mention the user by using `@`");
	} catch (PartRequestFailedException $e) {
	}
	
} // end of strpos make sure it's a mention




}
else
{
echo "This command is disabled. \n";
}


} // command only works in server
?>