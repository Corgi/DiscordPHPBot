<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

if($d['commands']['log'] == "1")
{

$msg=str_replace($pref."log ", "", $message->content);

if(($d['log']['server'] != "") && ($d['log']['channel']))
{
// ############## Post in bot_log channel #################
// $guild = $discord->guilds->first(); // change this to get your guild
$guild = $discord->guilds->get('name', $d['log']['server']);
$channel = $guild->channels->get('name', $d['log']['channel']); // you can change 'name' to any other attribute if you want
$channel->sendMessage($msg . " *pushed by - " . $message->author->username . "*"); // will return a Message object
// ########################################################
// $guild->name
}
else
{
$channel->sendMessage("You have not setup the log server or log channel. run the :hash:logserver or logchannel command"); // will return a Message object
}

}
else
{
$message->reply("This command is disabled.");
}
?>