<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

if($d['commands']['reportuser'] == "1")
{
$msg=str_replace($pref."reportuser ", "", $message->content);
$msg2=explode(" ", $msg);

$reportmsg=str_replace("#reportuser " . $msg2[0], "", $message->content);
$ini->data['report'][$msg2[0]] = $reportmsg;
$ini->write('config.ini');
}
else
{
$message->reply("This command is disabled.");
}
?>