<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];
if($d['commands']['stopchannel'] == "1")
{
$msg=str_replace($pref."stopchannel ", "", $message->content);
unset($ini->data['channels'][$msg]);
$ini->write('config.ini');
}
else
{
$message->reply("This command is disabled.");
}

?>
