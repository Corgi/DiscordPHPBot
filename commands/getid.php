<?php
$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
$members = $guild->members; // Returns a collection of members
$nerd=str_replace("#getid ", "", $message->content);
$getstatus = $members->get('username', $nerd);
$getid = $getstatus->id;
$message->reply($nerd . "'s ID: " . $getid);
?>