<?php
use Discord\Exceptions\PartRequestFailedException;

$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');
$iniA = new INI('inis/afk.ini');
$dA = $iniA->read('inis/afk.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
if($pref == "")
{
$pref=$thepref;
}
$deltru="no";

	$msg=str_replace($pref."afk ", "", $message->content);

$did = 0;



if($d['commands']['afk'] == "1")
{



foreach ($d['respect'] as $key=>$val)
{
if($key == $message->full_channel->guild->id)
{
$deltru="yes";
} // end of if ch = respected than

} // end of foreach 2 find if the server is respected



if($deltru == "no")
{



if($dA[$message->author->id]['Id'] == "")
{
	$iniA->data[$message->author->id]['Username'] = $message->author->username;
	$iniA->data[$message->author->id]['AFK'] = "True";
	$iniA->data[$message->author->id]["Id"] = $message->author->id;
	$iniA->data[$message->author->id]["Message"] = $msg;
	$iniA->data[$message->author->id]["time"] = time();
	$iniA->write('inis/afk.ini');
	$did=$did+1;
	try
	{
$global->sendMessage(":clock1: You're now AFK: " . $msg);
} catch (PartRequestFailedException $e) {
	}


}
else
{
	$iniA->data[$message->author->id]['AFK'] = "True";
	$iniA->data[$message->author->id]['Message'] = $msg;
	$iniA->data[$message->author->id]["time"] = time();
	$iniA->write('inis/afk.ini');
	$did=$did+1;
	try
	{
$global->sendMessage(":clock1: You're now AFK: " . $msg);
} catch (PartRequestFailedException $e) {
	}
	
} // end of check if new, add whole section and words...if not new...just change false to true.


}
else
{
	$global->sendMessage("You can't go afk on a server that's in my respect list.");
} // check if server is respected..




}
else
{
echo "This command is disabled. \n";
}



?>