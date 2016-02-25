<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
if($d['commands']['allowlinks'] == "1")
{
// $msg=str_replace("#allowlinks ", "", $message->content);
unset($ini->data['linkProtect'][$message->full_channel->guild->name]);
$ini->write('config.ini');
}
else
{
$message->reply("This command is disabled.");
}
?>
