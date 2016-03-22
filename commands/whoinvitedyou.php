<?php
use Discord\Exceptions\PartRequestFailedException;


$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');

$ini = new INI('config.ini');
$d = $ini->read('config.ini');

echo "### IT WAS TRIGGERED".PHP_EOL;

if(strtolower($specdat) == "who invited you?")
{
$minv=$dD[$message->full_channel->guild->id]['Master'];

try
{
$message->channel->sendMessage("It appears I was invited by: <@" . $minv . "> He's my `sudo` master on this server."); 
} catch (PartRequestFailedException $e) {
}


}


?>
