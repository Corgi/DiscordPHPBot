<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

if($d['commands']['afk'] == "1")
{
$msg=str_replace($pref."afk ", "", $message->content);
$usrid=$message->author;
$message->channel->sendMessage(":clock1: You're now AFK: " . $msg);
$ini->data['afk'][$message->author->username] = $message->author . "€" . $msg;
$ini->write('config.ini');
}
else
{
$message->reply("This command is disabled.");
}
?>
