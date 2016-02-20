<?php
$guild = $discord->guilds->get('id', '<SERVER ID>');////
    
    $everyone_role = $guild->roles->get('name', '@everyone');
    
$allow = new \Discord\Parts\Permissions\ChannelPermission;
$allow->create_instant_invite = true;
$deny = new \Discord\Parts\Permissions\ChannelPermission;

$channel = new \Discord\Parts\Channel\Channel();
$channel->name = 'Testcreate';
$channel->type = 'text';
$channel->guild_id = '<SERVER ID>';    
$channel->save();

$channel->setPermissions($everyone_role, $allow, $deny);

// $channel->save();
?>
