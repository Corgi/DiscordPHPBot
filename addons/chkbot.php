<?php
session_start();
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$prefix=$d['settings']['Prefix'];
$owner=$d['settings']['owner'];
$wthr=$d['apis']['weather'];
$bitly=$d['apis']['bitly'];

if($d['settings']['firstTime'] == "No")
{
if($wthr == "") { echo "### Your Weather API isn't setup! the #weather command won't work \n"; }
if($prefix == "") { echo "### My Prefix isn't setup in config.ini. No commands will work \n"; }
if($bitly == "") { echo "### Your Bit.ly API isn't setup! the #shorturl command won't work \n"; }
}


if(($c == 0) && ($firstTime == "Yes"))
{
$ini = new INI('config.ini');
$d = $ini->read('config.ini');

if($d['settings']['owner'] == "")
{
echo "OWNER NOT SET: Open config.ini and under [settings] find owner and put owner = \"Your Discord Name\" \n\n";

}
else
{
if($message->author->username == $d['settings']['owner'])
{
$dat = explode($d['settings']['Prefix'], $message->content); // using normal param #paradox example #paradox who am i?
$rawdat=$dat[1];
if(($rawdat == "grantchannel") && ($d['settings']['owner'] == $message->author->username))
{
$msg=$message->full_channel->guild->name;
$ini->data['channels'][$msg] = 1;
$ini->data['settings']['firstTime'] = "No";
$ini->write('config.ini');
$firstTime = "No";
echo "###### WELCOME You're Server has been set to " . $msg . " \n SETUP COMPLETE! see my #commands \n";
echo "###### You can add or remove servers in the future using: grantchannel and stopchannel cmds. \n";

} // Allows the bot to moderate on your channel

		$reply = $message->timestamp->format('F Y h:i:s A') . ' - '; // Format the message timestamp.
		$reply .= $message->full_channel->guild->name . ' - ';
		$reply .= $message->author->username . ' - '; // Add the message author's username onto the string.
		$reply .= $message->content; // Add the message content.
		echo $reply . PHP_EOL; // Finally, echo the message with a PHP end of line.
}
} // only show messages from owner

} // end of checking is owner is set in config file.



// ###### Check if the bot needs an update. ###########

if(time() >= $_SESSION['check_update'] + (60 * 60 * 2))
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
echo "### Missing File: version.txt \n make sure this file is in the Paradox\DiscordPHPBot folder! \n";
}

if($online > $mine)
{
echo "### New Version: " . $online . " Is Available on Github! \n";
}
else
{
echo "## Checked for updates. No new version available. \n";
}
$_SESSION['check_update'] = time();
} // end of time check


// #### Check and see if there's a message from the developers!
// url https://raw.githubusercontent.com/proxikal/DiscordPHPBot/master/msg.txt
if(time() >= $_SESSION['check_message'] + (60 * 20))
{
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
		'header'=>"User-Agent: proxikal"
			  
    ),
); 

$online=file_get_contents("https://raw.githubusercontent.com/proxikal/DiscordPHPBot/master/msg.txt", false, stream_context_create($arrContextOptions));
$on=explode("=>", $online);
$od=explode("break;", $on[1]);

$themsg = " ";
foreach($od as $item)
{
$themsg .= $item . " \n";

}


if($on[0] != $d['msgcode']['code'])
{
$ini->data['msgcode']['code'] = $on[0];
$ini->write('config.ini');
$guild = $discord->guilds->get('name', $d['log']['server']);
$channel = $guild->channels->get('name', $d['log']['channel']); // you can change 'name' to any other attribute if you want
$channel->sendMessage(":speech_balloon:" . $themsg);

}

$_SESSION['check_message'] = time();
} // end of time check
?>