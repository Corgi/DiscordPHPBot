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


if($d['commands']['mute'] == "1")
{

if(strpos($message->content, "@") > 0)
{

if($dD[$message->full_channel->guild->id][$message->author->id] == "1")
{
$msg=str_replace($pref."mute ", "", strtolower($message->content));
$msg2=explode(" ", $msg);
$reportmsg=str_replace($pref."mute " . $msg2[0], "", strtolower($message->content));

$goid=str_replace("<@", "", $msg2[0]);
$goid=str_replace(">", "", $goid);
$user = \Discord\Parts\User\User::find($goid);
$opt_user=$user->username;
$opt_id=$user->id;

$ini->data['muted'][$opt_user] = $message->full_channel->guild->name . "€" . $reportmsg;
$ini->write('config.ini');

try
{
$message->channel->sendMessage("`" . $opt_user . "` Has been muted.");
} catch (PartRequestFailedException $e) {
}


}
else
{

	try
	{
$message->channel->sendMessage("You're not one of my masters on this server.");
} catch (PartRequestFailedException $e) {
}


} // end of isOWner check
}
else
{

	try
	{
	$message->channel->sendMessage("You need to mention the user by using `@`");
} catch (PartRequestFailedException $e) {
}


} // end of strpos find if the user was a mention or not.




}
else
{
echo "This command is disabled. \n";
}


} // cmd works in server only
?>