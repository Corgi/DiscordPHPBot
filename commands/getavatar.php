<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

if($d['commands']['getavatar'] == "1")
{
$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
$members = $guild->members; // Returns a collection of members
$nerd=str_replace($pref."getavatar ", "", $message->content);
$getstatus = $members->get('username', $nerd);
$getimg = $getstatus->user->avatar;
$message->reply($nerd . "'s Avatar: " . $getimg);
}
else
{
$message->reply("This command is disabled.");
}

?>