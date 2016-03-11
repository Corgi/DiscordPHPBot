<?php
use Discord\Exceptions\PartRequestFailedException;

$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
if($pref == "")
{
$pref=$thepref;
}


if($d['commands']['reportuser'] == "1")
{
$msg=str_replace($pref."reportuser ", "", strtolower($message->content));
$msg2=explode(" ", $msg);
$reportmsg=str_replace($pref."reportuser " . $msg2[0], "", strtolower($message->content));

$goid=str_replace("<@", "", $msg2[0]);
$goid=str_replace(">", "", $goid);
$user = \Discord\Parts\User\User::find($goid);
$opt_user=$user->username;
$opt_id=$user->id;
$did=0;

if(strpos($msg, "@") > 0)
{
$ini->data['reports'][$opt_user] = $message->full_channel->guild->id . "€" . $reportmsg;
$ini->write('config.ini');

try
{
$global->sendMessage("A report against `".$opt_user."` has been added to my list.");
} catch (PartRequestFailedException $e) {
}


}
else
{

	try
	{
	$global->sendMessage("You need to mention the user by using `@`");
	} catch (PartRequestFailedException $e) {
	}

	
}



}
else
{
echo "This command is disabled. \n";
}
?>