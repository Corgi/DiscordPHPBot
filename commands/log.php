<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
if($pref == "")
{
$pref=$thepref;
}



if($d['commands']['log'] == "1")
{


if($d['settings']['owner'] == $message->author->id)
{



$msg=str_replace($pref."log ", "", $message->content);

if(($d['settings']['server'] != "") && ($d['settings']['log_channel']))
{
	
// ############## Post in bot_log channel #################
// $guild = $discord->guilds->first(); // change this to get your guild
$guild = $discord->guilds->get('name', $d['settings']['server']);
$channel = $guild->channels->get('name', $d['settings']['log_channel']); // you can change 'name' to any other attribute if you want
$channel->sendMessage($msg . " *pushed by - " . $message->author->username . "*"); // will return a Message object
// ########################################################
// $guild->name
}
else
{
$global->sendMessage("You have not setup the log server or log channel. run the :hash:logserver or logchannel command"); // will return a Message object
}


} // make sure it's the owner.




}
else
{
echo "This command is disabled. \n";
}
?>