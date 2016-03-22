<?php
$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');

$ini = new INI('config.ini');
$d = $ini->read('config.ini');

echo "### IT WAS TRIGGERED = > RESPECT THIS ROLE".PHP_EOL;


if(($d['settings']['owner'] == $message->author->id) || ($dD[$message->full_channel->guild->id]['Master'] == $message->author->id))
{

			$ini->data['respect'][$message->full_channel->guild->id] = "1";
			$ini->write('config.ini');

$message->channel->sendMessage("I've added `".$message->full_channel->guild->name."` to my respect list. Basic Command syntax is `Disabled`. Certain commands are no longer allowed in chat, however are still available in my Private Messages!"); 

} // end of only owner can use this shit
?>
