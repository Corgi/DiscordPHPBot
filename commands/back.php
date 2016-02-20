<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
unset($ini->data['afk'][$message->author->username]);
$ini->write('config.ini');
$message->channel->sendMessage(":white_check_mark: Welcome back, I have removed your AFK Status.");
?>