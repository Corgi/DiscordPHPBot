<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

if($d['commands']['getstatus'] == "1")
{
$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
$members = $guild->members; // Returns a collection of members
$nerd=str_replace($pref."getstatus ", "", $message->content);
$getstatus = $members->get('username', $nerd);
$usrstatus = $getstatus->game->name;
$getid = $getstatus->id;
$getimg = $getstatus->user->avatar;
$message->reply($nerd . "'s status: " . $usrstatus);
}
else
{
$message->reply("This command is disabled.");
}

?>