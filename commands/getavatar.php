<?php
$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
$members = $guild->members; // Returns a collection of members
$nerd=str_replace("#getavatar ", "", $message->content);
$getstatus = $members->get('username', $nerd);
$getimg = $getstatus->user->avatar;
$message->reply($nerd . "'s Avatar: " . $getimg);
?>