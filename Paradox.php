<?php
session_start();
$_SESSION['check_update'] = 0;
$_SESSION['check_message'] = 0;
ini_set("log_errors", 1);
ini_set("error_log", "php-error.log");


date_default_timezone_set('US/Eastern');
error_reporting( error_reporting() & ~E_NOTICE );

use Discord\Discord;
use Discord\WebSockets\Event;
use Discord\WebSockets\WebSocket;
use Discord\Parts\Guild;
use Discord\Parts\Permissions\ChannelPermission;
use Discord\Parts\Permissions\RolePermission;
use discord\Parts\User\Member;
$d=0;
$rawdata=0;

include 'INI.class.php'; 

// **** Emoji cheat sheet: http://www.emoji-cheat-sheet.com/ ****

// ############## Usefull Code & Commands ###############
// Send a Invite PM
// -------------
// $invite = $channel->createInvite();
// $message->author->sendMessage("Invite: {$invite->invite_url}");
// $message->reply('Invite sent in PM.');
// Includes the Composer autoload file
// ----------------------
//
// Bot Leave voice channel
// -------------
// $bot->voice->leave();
// $message->reply('Leaving voice channel...');
//-----------------------
//
// Send message to channel
// $message->channel->sendMessage("msg")
//
// $message->author->id;




include 'vendor/autoload.php';

echo "            ######################################" . PHP_EOL;
echo "            #     Paradox Bot Command Center     #" . PHP_EOL;
echo "            #         Created by: Proxy          #" . PHP_EOL;
echo "            #            Version: 0.0.2b         #" . PHP_EOL;
echo "            #          Framework: DiscordPHP     #" . PHP_EOL;


// Init the Discord instance.
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$discord = new Discord($d['settings']['email'], $d['settings']['password']);
// Init the WebSocket instance.
$ws = new WebSocket($discord);

$ws->on('ready', function ($discord) use ($ws) {
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

	$discord->updatePresence($ws, $d['settings']['status'], false);

echo "            #    Login complete, Listening...    #".PHP_EOL;
echo "            ######################################" . PHP_EOL;

// echo "Prefix: " . $d['settings']['Prefix'];

	$ws->on(Event::MESSAGE_CREATE, function ($message, $discord, $newdiscord) use ($ws) {


	$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];


$dat = explode($d['settings']['Prefix'], $message->content); // using normal param #paradox example #paradox who am i?
$rawdat=$dat[1];

$special = explode("<@147463276840747008> ", $message->content); // using special param @Paradox instead of #paradox example: @Paradox Who am i?
$specdat=$special[1];

if(strpos($message->content, " ") > 0)
{
$dat = explode(" ", $dat[1]);
$rawdat=$dat[0];
}

$l=0;
$r=0;
$lini = new INI('config.ini');
$ld = $lini->read('config.ini');

if($ld['linkProtect'][$message->full_channel->guild->name] == 1) // Check config to see if links are allowed or not.
{
$allow = true;
}
else
{
$allow = false;
}

$datas  = parse_ini_string(file_get_contents( 'config.ini' ), true);

include 'addons/granted_channels.php'; // this is a list of channels the bot has admin rights to.
$firstTime=$datas['settings']['firstTime'];
$isOwner=$datas['settings']['owner'];

 if($firstTime == "Yes")
 {
 if(($c < 1) && ($datas['settings']['owner'] != ""))
 {
 echo "Welcome! I see it's your first time \n You need to type " . $datas['settings']['Prefix'] . "grantchannel in your server for me to work!. \n  \n\n";
 }
 }

if($c > 0)
{
include 'addons/afk_bot.php'; // Afk bot 
include 'addons/channel_link_protection.php'; // Channel link protection
include 'addons/isMuted.php';

$ad=0;
$am=0;

if(isset($special[1]))  // this is using the special command param @Paradox instead of #cmd
{
include 'commands/whatsmyrole.php'; // @Paradox what's my role? returns if the user is my master or not.
}

if((isset($dat[1])) && ($message->author->username != "Paradox")) // This is the normal command param #example
{
include 'addons/chkowner.php'; // checks to see if user is my master or not.

// ################# Bot commands ####################
include 'master_cmds.php';
// end #############

} // isset end


		$reply = $message->timestamp->format('F Y h:i:s A') . ' - '; // Format the message timestamp.
		$reply .= $message->full_channel->guild->name . ' - ';
		$reply .= $message->author->username . ' - '; // Add the message author's username onto the string.
		$reply .= $message->content; // Add the message content.
		echo $reply . PHP_EOL; // Finally, echo the message with a PHP end of line.
		
		
	}	


include 'addons/chkbot.php'; // checks if the user is new, if the config is setup properly. this addon will walk you through it.


	});

});

$ws->run();
?>
