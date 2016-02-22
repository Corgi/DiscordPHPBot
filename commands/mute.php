<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$msg=str_replace("#mute ", "", $message->content);
$msg2=explode(" ", $msg);

$reportmsg=str_replace("#mute " . $msg2[0], "", $message->content);
$ini->data['muted'][$msg2[0]] = $reportmsg;
$ini->write('config.ini');

$message->channel->sendMessage("`" . $msg . "` Has been muted.");
?>