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


$msg=str_replace($pref."transfer ", "", strtolower($message->content));
// $goid=str_replace("<@", "", $msg);
//$goid=str_replace(">", "", $goid);


$goid=explode("<@", $msg);
$goid=explode(">", $goid[1]);
$goid=$goid[0];
$user = \Discord\Parts\User\User::find($goid);
$opt_user=$user->username;
$opt_id=$user->id;




if($dD[$message->full_channel->guild->id]['Master'] == $message->author->id)
{



if(strpos($message->content, "@") > 0)
{

	$iniD->data[$message->full_channel->guild->id]['Master'] = $opt_id;
	$iniD->data[$message->full_channel->guild->id][$opt_id] = 1;
	$iniD->write('inis/masters.ini');

$global->sendMessage("Alright, sorry to see you go as my `sudo` master ".$message->author->username." :v:\nOn a brighter note welcome to my `sudo` role ".$opt_user);
}
else
{
	$global->sendMessage("You need to mention the user with the `@` symbol.");
}



} // only the master can transfer ownership.


}// can't use this command in a pm.