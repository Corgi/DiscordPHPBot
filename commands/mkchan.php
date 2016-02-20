<?php
$guild = $discord->guilds->get('id', '146064483121496064');////
    
    $everyone_role = $guild->roles->get('name', '@everyone');
    
$allow = new \Discord\Parts\Permissions\ChannelPermission;
$allow->create_instant_invite = true;
$deny = new \Discord\Parts\Permissions\ChannelPermission;

$channel = new \Discord\Parts\Channel\Channel();
$channel->name = 'Testcreate';
$channel->type = 'text';
$channel->guild_id = '146064483121496064';    
$channel->save();

$channel->setPermissions($everyone_role, $allow, $deny);

// $channel->save();
?>