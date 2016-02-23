<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

if($d['commands']['delmaster'] == "1")
{
$msg2=str_replace($pref."delmaster ", "", $message->content);
unset($ini->data['owners'][$msg2]);
$ini->write('config.ini');
}
else
{
$message->reply("This command is disabled.");
}
?>