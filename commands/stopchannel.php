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


if($dD[$message->full_channel->guild->id]['Master'] == $message->author->username)
{
$ad = $ad + 1;
}



if($ad > 0)
{
unset($iniP->data[$message->full_channel->guild->id]);
$iniP->write('inis/Prefix.ini');
unset($iniD->data[$message->full_channel->guild->id]);
$iniD->write('inis/masters.ini');

try
{
$message->channel->sendMessage(":exclamation: My commands no longer work on `".$message->full_channel->guild->name."` and the data was reset. \n Type #join [server link] to have me come back in.");
} catch (PartRequestFailedException $e) {
}


}
else
{


	try
	{
	$message->channel->sendMessage("The person who invited me `.$dD[$message->full_channel->guild->id]['Master'].` has to use this command. If you're the owner you can kick me and then re-invite if you want. ");
	} catch (PartRequestFailedException $e) {
	}


	
}

} // end of does the server exist in masters.ini


} // only works in server
?>
