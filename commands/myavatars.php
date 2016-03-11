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

$avatars="";
$kc="0";

foreach (glob("*.png") as $filename) {
	$kc=$kc+1;
$filename=str_replace(".png", "", $filename);

   $avatars .= $kc.". ".$filename . "\n";
    // do what you need to do......
} 
if($d['commands']['myavatars'] == "1")
{

$global->sendMessage("Here's a list of my avatars: \n ```" . $avatars . "```"); 
// echo var_dump($message);
}
else
{
echo "This command is disabled. \n";
}
?>