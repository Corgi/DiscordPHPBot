<?php
use Discord\Exceptions\PartRequestFailedException;

$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$invalidUser = "no";

$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');

$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
$did=0;

if($pref == "")
{
$global->sendMessage("You can't use this command in `private message`");
}
else
{

if($d['commands']['addmaster'] == "1")
{
$msg=str_replace($pref."addmaster ", "", strtolower($message->content));
// $goid=str_replace("<@", "", $msg);
//$goid=str_replace(">", "", $goid);


$goid=explode("<@", $msg);
$goid=explode(">", $goid[1]);
$goid=$goid[0];

if($goid[0] == "")
{
	$invalidUser="yes";
}

$user = \Discord\Parts\User\User::find($goid);
$opt_user=$user->username;
$opt_id=$user->id;
$did=0;



if(strpos($msg, "@") > 0)
{


	if($dD[$message->full_channel->guild->id][$opt_id] == 1)
	{
		$did=$did+1;
		try
		{
	$global->sendMessage(":exclamation: This user is already on my masters list in `".$message->full_channel->guild->name."`");
		} catch (PartRequestFailedException $e) {
		}

	}


if($did == 0) 
{
	if($dD[$message->full_channel->guild->id][$message->author->id] == 1) // check if user is master on this server
	{

	$iniD->data[$message->full_channel->guild->id][$opt_id] = 1;
	$iniD->write('inis/masters.ini');
	$did=$did+1;


	try
	{
	$global->sendMessage(":exclamation: `" . $opt_user . "` Has been added to my **masters list**");
	} catch (PartRequestFailedException $e) {
	}


	}
	else
	{
		try
		{
		$global->sendMessage(":exclamation: You'e not on my masters list.");
		} catch (PartRequestFailedException $e) {
		}

	}
}
else
{
// $message->channel->sendMessage(":exclamation: `" . $opt_user . "` is already one of my  **masters**");
} // end of check if the user is already a master.


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
echo "## This command is disabled. \n";
}


} // only works in server
?>