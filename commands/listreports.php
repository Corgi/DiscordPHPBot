<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');

if($d['commands']['listreports'] == "1")
{

$de=" ";
foreach( $datas['report'] as $key=>$data )
{
$de .= $key . "\n";
}

$message->channel->sendMessage("Here's a list of user's reported. \n ```" . $de . "```");
}
else
{

$message->reply("This command is disabled.");
}
?>