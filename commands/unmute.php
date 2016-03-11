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


$canWork = "False";

$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
$channel = $guild->channels->get('id', $message->channel_id);

$overrides = $channel->overwrites;
foreach ($overrides as $override) {
 $allow = new \Discord\Parts\Permissions\ChannelPermission;
 $allow->perms = $override->allow;

 $deny = new \Discord\Parts\Permissions\ChannelPermission;
 $deny->perms = $override->deny;
 }
if ($allow->perms->manage_messages == true)
{

	$canWork="True";

}

if($dD[$message->full_channel->guild->id][$message->author->id] == "1")
{


if($datas['commands']['unmute'] == "1")
{
$msg=str_replace($pref . "unmute ", "", $message->content);
$goid=str_replace("<@", "", $msg);
$goid=str_replace(">", "", $goid);
$user = \Discord\Parts\User\User::find($goid);
$opt_user=$user->username;
$opt_id=$user->id;
$did=0;

if(strpos($msg, "@") > 0)
{

foreach( $d['muted'] as $key=>$data )
{
	$mute_dat=explode("€", $data);

	if($key == $opt_user)
		{
			if($mute_dat[0] == $message->full_channel->guild->name)
			{
			unset($ini->data['muted'][$key]);
			$ini->write('config.ini');

			try
			{
			$message->channel->sendMessage("`" . $opt_user . "` can now speak in channel.");
			} catch (PartRequestFailedException $e) {
			}


			$did=$did+1;
			}

		}

} // end of foreach 

if($did == 0)
{

	try
	{
		$message->channel->sendMessage("`" . $opt_user . "` is not on my mute list.");
	} catch (PartRequestFailedException $e) {
	}


}


}
else
{

	try
	{
	$message->channel->sendMessage("You need to mention the user by using `@`");
	} catch (PartRequestFailedException $e) {
	}


} // find out if it's a mention or a fake user.


}
else
{
echo "This command is disabled. \n";
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


} // only works in server
?>