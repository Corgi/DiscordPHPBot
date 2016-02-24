<?php
session_start();
$_SESSION['last_run'] = 0;
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
use Discord\Parts\User;
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

// ########## Change discord information ########
// $discord = new Discord();
// $discord->username = 'newusername';
// $discord->email = 'new@email.com';
// $discord->new_password = 'myNewPassword';
// $discord->setAvatar('/path/to/new/avatar');

// $discord->password = 'myCurrentPassword';
// $discord->save();
//#######################

// ###### Message specific user by ID & possibly user_name or just name
// $user = \Discord\Parts\User\User::find(':user_id'); //:user_id should be a value... ie:
// $user = \Discord\Parts\User\User::find('146046383726657536');
// $user->sendMessage('hello!');

// $overrides =  $channel->overwrites->getAll('type', 'member'); get's all members in channel.


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
 echo "Welcome! I see it's your first time \n Private message me this: #join <invitelink> \n or PM me with: #join http://discord.gg/invitelink for me to join your server. \n And have bot permissions.  \n\n";
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

if((isset($dat[1])) && ($message->author->username != $discord->user->username)) // This is the normal command param #example
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


// ### join server if this is the firstTime and user private messages #join <serverlink>

if(($message->full_channel->guild->name == "") && ($message->author->username != $discord->user->username))
{
$pmdat=explode("#", $message->content);
$pmraw=$pmdat[1];

if(strpos($message->content, " ") > 0)
{
$pmdat = explode(" ", $pmdat[1]);
$pmraw=$pmdat[0];
}

// $message->author->sendMessage("command sent: \n" . $pmdat[1]);
if(isset($pmraw))
{
if($pmraw == "join")
{
$pmsg=str_replace("#join ", "", $message->content);

// $discord->acceptInvite($code);
$server_link=substr($message->content, -16);
$discord->acceptInvite($server_link);
$message->author->sendMessage("joined " . $server_link);

$message->author->sendMessage(":thumbsup: Good, Now Please type \n\n #grantchannel \"Your Server Name\" *wihout the quotes* in this window. \n **Not in your server, but in this PM.**");

} // end of join command

if($pmraw == "grantchannel")
{
$pmsg=str_replace("#grantchannel ", "", $message->content);
if($firstTime == "Yes")
{
$ini->data['channels'][$pmsg] = 1;
$ini->data['log']['server'] = $pmsg;
$ini->data['linkProtect'][$pmsg] = 1;
$ini->data['log']['channel'] = "bot_log";
$ini->data['settings']['firstTime'] = "No";
$ini->write('config.ini');
$firstTime = "No";
$message->author->sendMessage(":thumbsup: You did it! Now my commands should work on your server! \n create a channel called: **bot_log** to get my fixes & updates.");
}
else // this else will work when firstTime bind is removed.
{
$ini->data['channels'][$pmsg] = 1;
$ini->data['linkProtect'][$pmsg] = 1;
$ini->write('config.ini');
$message->author->sendMessage(":thumbsup: You did it! Now my commands should work on your server!");
} // check if it was the first channel, if it was it means it's his first time, setup bot_log, log_server etc..
} // end of grantchannel command

} // end of isset $pmdat[1]
} // end of message = owner & it's a pm.



include 'addons/chkbot.php'; // checks if the user is new, if the config is setup properly. this addon will walk you through it.

	});

});

$ws->run();
?>
