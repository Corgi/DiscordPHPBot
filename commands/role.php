<?php
    $guild = $discord->guilds->first();
    $role = $guild->roles->get('name', '@everyone');
    $message->channel->sendMessage("Changing roles for {$role} ");
	
?>