<?php
$ini = new INI('config.ini');
// $d = $ini->read('config.ini');
$msg=str_replace("#unmute ", "", $message->content);
unset($ini->data['muted'][$msg]);
$ini->write('config.ini');
$message->channel->sendMessage("`" . $msg . "` can now speak in channel.");
?>