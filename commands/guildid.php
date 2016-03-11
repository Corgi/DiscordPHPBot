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

if($d['commands']['guildid'] == "1")
{
$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
$guildid = $guild->id;


try
{
$message->channel->sendMessage($message->full_channel->guild->name . "'s ID: " . $guildid);
} catch (PartRequestFailedException $e) {
}


}
else
{
echo "This command is disabled. \n";
}


} // cmd only works in server
?>