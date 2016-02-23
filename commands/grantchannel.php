<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];
if($d['commands']['grantchannel'] == "1")
{
$msg=str_replace($pref."grantchannel ", "", $message->content);
$ini->data['channels'][$msg] = 1;
$ini->write('config.ini');
}
else
{
$message->reply("This command is disabled.");
}
?>
