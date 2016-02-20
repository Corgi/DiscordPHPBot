<?php
$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
$members = $guild->members; // Returns a collection of members
$nerd=str_replace("#getstatus ", "", $message->content);
$getstatus = $members->get('username', $nerd);
$usrstatus = $getstatus->game->name;
$getid = $getstatus->id;
$getimg = $getstatus->user->avatar;
$message->reply($nerd . "'s status: " . $usrstatus);
?>