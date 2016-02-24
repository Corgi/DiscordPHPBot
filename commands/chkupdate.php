<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

if($d['commands']['chkupdate'] == "1")
{

// version link: https://raw.githubusercontent.com/proxikal/DiscordPHPBot/master/version.txt
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
		'header'=>"User-Agent: proxikal"
			  
    ),
); 

$online=file_get_contents("https://raw.githubusercontent.com/proxikal/DiscordPHPBot/master/version.txt", false, stream_context_create($arrContextOptions));
$online=str_replace("\n", "", $online);

if (file_exists("version.txt")) {
$mine=file_get_contents("version.txt");
}
else
{
$message->channel->sendMessage(":hash: Missing File: `version.txt` \n make sure this file is in the Paradox\DiscordPHPBot folder!");
}

if($online > $mine)
{
$message->channel->sendMessage(":hash: New Version: **" . $online . "** Is Available on Github!");
}
else
{
$message->channel->sendMessage(":hash: Checked for updates. No new version available.");
}

}
else
{
$message->reply("This command is disabled.");
} // end of checking if cmd is enabled or not.
?>