<?php

$channel = $guild->channels->get('id', $message->channel_id);

$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
$channel = $guild->channels->get('type', 'text');
$me = $guild->members->get('username', $discord->user->username);

try {
   // $channel->sendMessage('testing perms')->delete();
    $canWork="True";
} catch (\Discord\Exceptions\DiscordRequestFailedException $e) {
    echo "Can't send message\r\n";
}



if($message->full_channel->guild->name == "")
{
    $canWork="True";
}