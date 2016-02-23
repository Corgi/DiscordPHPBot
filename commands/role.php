<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
if($d['commands']['role'] == "1")
{
    $guild = $discord->guilds->first();
    $role = $guild->roles->get('name', '@everyone');
    $message->channel->sendMessage("Changing roles for {$role} ");
}
else
{
$message->reply("This command is disabled.");
}

?>