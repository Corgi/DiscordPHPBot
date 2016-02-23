<?php
$ini = new INI('config.ini');
if($d['commands']['denylinks'] == "1")
{
$ini->data['linkProtect'][$message->full_channel->guild->name] = 1;
$ini->write('config.ini');
}
else
{
$message->reply("This command is disabled.");
}
?>