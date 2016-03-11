<?php
$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');

$ini = new INI('config.ini');
$d = $ini->read('config.ini');

echo "### IT WAS TRIGGERED = > RESPECT THIS ROLE".PHP_EOL;


if($d['settings']['owner'] == $message->author->username)
{
			$iniD->data[$message->full_channel->guild->id]['Master'] = $message->author->username;
			$iniD->data[$message->full_channel->guild->id][$message->author->id] = "1";
			$iniD->write('inis/masters.ini');
			$message->channel->sendMessage("You've assumed `sudo` role. Remember to give me back!"); 


} // end of only owner can use this shit
?>
