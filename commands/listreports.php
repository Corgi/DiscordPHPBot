<?php
$de=" ";
foreach( $datas['report'] as $key=>$data )
{
$de .= $key . "\n";
}

$message->channel->sendMessage("Here's a list of user's reported. \n ```" . $de . "```");
?>