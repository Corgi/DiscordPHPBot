<?php
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

?>