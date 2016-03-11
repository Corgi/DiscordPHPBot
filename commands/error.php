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

$msg=str_replace($pref."error ", "", $message->content);
$msg=str_replace("```", "", $msg);


if(time() >= $_SESSION[$message->author->id.'_er_spam'] + (60 * 15)) { // 60 * 2 is 2 minutes
$res="```fix"."\n";

$guild = $discord->guilds->get('name', $d['settings']['server']);
$channel = $guild->channels->get('name', "error_reports"); // you can change 'name' to any other attribute if you want

try
{
$channel->sendMessage("`".$message->author->username . "` Found an Error: \n".$res." ".$msg."```"); // will return a Message object
$global->sendMessage("The Error has been sent in. it's placed at the top of the `TODO` List! \nIf your error isn't detailed enough, expect a PM from `Proxy` My author!");
$_SESSION[$message->author->id.'_er_spam'] = time();
} catch (PartRequestFailedException $e) {
}


}
else
{

	try
	{
	$global->sendMessage("I allow one request per 15 minutes. `and this is subject to change` \nabusing this command will get you banned from all commands.");
	} catch (PartRequestFailedException $e) {
	}
	
}