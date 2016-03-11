<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];

if($pref == "")
{
$pref=$thepref;
}


if($d['commands']['listreports'] == "1")
{

$de=" ";
foreach( $datas['report'] as $key=>$data )
{
$de .= $key . "\n";
}

$global->sendMessage("Here's a list of user's reported. \n ```" . $de . "```");
}
else
{

echo "This command is disabled. \n";
}
?>