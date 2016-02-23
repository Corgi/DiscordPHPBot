<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

if($d['commands']['getid'] == "1")
{
$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
$members = $guild->members; // Returns a collection of members
$nerd=str_replace($pref."getid ", "", $message->content);
$getstatus = $members->get('username', $nerd);
$getid = $getstatus->id;
$message->reply($nerd . "'s ID: " . $getid);
}
else
{
$message->reply("This command is disabled.");
}

?>