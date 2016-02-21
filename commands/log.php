<?php
$msg=str_replace("#log ", "", $message->content);

if(($ld['log']['server'] != "") && ($ld['log']['channel']))
{
// ############## Post in bot_log channel #################
// $guild = $discord->guilds->first(); // change this to get your guild
$guild = $discord->guilds->get('name', $ld['log']['server']);
$channel = $guild->channels->get('name', $ld['log']['channel']); // you can change 'name' to any other attribute if you want
$channel->sendMessage($msg . " *pushed by - " . $message->author->username . "*"); // will return a Message object
// ########################################################
// $guild->name
}
else
{
$channel->sendMessage("You have not setup the log server or log channel. run the :hash:logserver or logchannel command"); // will return a Message object
}
?>