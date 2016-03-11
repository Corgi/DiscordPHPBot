<?php
use Discord\Exceptions\PartRequestFailedException;

$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
if($pref == "")
{
$global->sendMessage("You can't use this command in `private message`");
}
else
{
$did = 0;



if(($dD[$message->full_channel->guild->id][$message->author->id] == "1") || ($dD[$message->full_channel->guild->id]['Master'] == $message->author->username))
{
echo "###I MADE IT THIS FAR!!!!".PHP_EOL;


if($d['commands']['allowlinks'] == "1")
{
// $msg=str_replace("#allowlinks ", "", $message->content);
$al_dat=$dD[$message->full_channel->guild->id]['Links'];
echo "## MADE IT THIS FAR!!! ".PHP_EOL;

	$iniD->data[$message->full_channel->guild->id]['Links'] = "False";
	$iniD->write('inis/masters.ini');

	$did=$did+1;
	try
	{
		$message->channel->sendMessage("Links are now allowed on this server.");
	} catch (PartRequestFailedException $e) {
	}



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

} // command is disabled


} // command only works in pm
?>