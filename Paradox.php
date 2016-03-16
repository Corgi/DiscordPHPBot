<?php
session_start();
ini_set('memory_limit', '-1');
header('Content-type: text/html; charset=utf-8');
$_SESSION['last_run'] = 0;
$_SESSION['check_update'] = 0;
$_SESSION['check_message'] = 0;
$_SESSION['afk_bot_spam'] = 0;
$_SESSION['spam_check'] = 0; // the time a last command was used
$_SESSION['mute_warning'] = 0;
$gamecode=0;
$_SESSION['last_purge'] = 0;

$_SESSION['non_Carbon'] = "";
$_SESSION['master'] = "";

ini_set("log_errors", 1);
ini_set("error_log", "php-error.log");

function var_error_log( $object=null, $myob=null ){
    ob_start();                    // start buffer capture
    var_dump( $object );           // dump the values
    $contents = ob_get_contents(); // put the buffer into a variable
    ob_end_clean();                // end capture
    error_log($contents, 3, "VAR_DUMP_".$myob.".log");        // log contents of the result of var_dump( $object )
}


date_default_timezone_set('US/Eastern');
error_reporting( error_reporting() & ~E_NOTICE );

use Discord\Discord;
use Discord\WebSockets\Event;
use Discord\WebSockets\WebSocket;
use Discord\Parts\Guild;
use Discord\Parts\Guild\Invite;
use Discord\Parts\User;
use Discord\Parts\Permissions\ChannelPermission;
use Discord\Parts\Permissions\RolePermission;
use discord\Parts\User\Member;
use Discord\Helpers\Guzzle;
use Discord\Exceptions\DiscordRequestFailedException;
use Discord\Exceptions\InviteInvalidException;

$d=0;
$rawdata=0;

include 'include/INI.class.php'; 

 $units = explode(' ', 'B KB MB GB TB PB');

function dirSize($directory) {
    $size = 0;
    foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory)) as $file){
        $size+=$file->getSize();
    }
    return $size;
} 



function format_size($size) {
    global $units;

    $mod = 1024;

    for ($i = 0; $size > $mod; $i++) {
        $size /= $mod;
    }

    $endIndex = strpos($size, ".")+3;

    return substr( $size, 0, $endIndex).' '.$units[$i];
}

include 'toString.php'; // the class for turning objs into strings.



// ##################### BAN A USER ############################
/*
try{
        \Discord\Helpers\Guzzle::put("guilds/$guildid/bans/$memberid?delete-message-days=1");
    }catch (\Discord\Exceptions\DiscordRequestFailedException $e) {
        $logger->err($e);
    }
    */




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


// $perm = new \Discord\Parts\Permissions\RolePermission;
// $perm->create_instant_invite = true/false;

// $guild = $discord->guilds->first();
// $role = $guild->roles->first();

// $role->permissions = $perm;
// $role->save();

// get all the servers the user is in.
/*
$guildcount = 0;
        $servers = '';
        foreach ($discord->guilds as $guild) {
            foreach ($guild->members as $member) {
                if ($member->id == $user->id) {
                    $guildcount++;
                    $servers .= $guild->name . ", ";
                }
            }
        }
        $servers = rtrim($servers, ', ');
        $str .= "**Shared Servers:** {$guildcount} _({$servers})_\r\n";
*/



include 'vendor/autoload.php';

echo "            ######################################" . PHP_EOL;
echo "            #     Paradox Bot Command Center     #" . PHP_EOL;
echo "            #         Created by: Proxy          #" . PHP_EOL;
echo "            #            Version: 0.0.2b         #" . PHP_EOL;
echo "            #          Framework: DiscordPHP     #" . PHP_EOL;


// Init the Discord instance.
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$ini->data['settings']['uptime'] = time();
$ini->write('config.ini');

$discord = new Discord($d['settings']['email'], $d['settings']['password']);
// Init the WebSocket instance.
$ws = new WebSocket($discord);

$ws->on('ready', function ($discord) use ($ws) {
$ini = new INI('config.ini');
$d = $ini->read('config.ini');

	$discord->updatePresence($ws, $d['settings']['status'], false);

echo "            #    Login complete, Listening...    #".PHP_EOL;
echo "            ######################################" . PHP_EOL;

// echo "Prefix: " . $d['settings']['Prefix'];


	$ws->on(Event::MESSAGE_CREATE, function ($message, $discord, $newdiscord) use ($ws) {



$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');

// new convert:

$datas  = parse_ini_string(file_get_contents( 'config.ini' ), true);

include 'addons/granted_channels.php'; // this is a list of channels the bot has admin rights to.
$firstTime=$datas['settings']['firstTime'];
$isOwner=$datas['settings']['owner'];

 if($firstTime == "Yes")
 {
 if(($c < 1) && ($datas['settings']['owner'] != ""))
 {
 echo "Welcome! I see it's your first time \n Private message me with: #join http://discord.gg/invitelink for me to join your server. \n And have bot permissions.  \n\n";
 }
 }



$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');

if($c > 0)
{
$iniK = new INI('inis/masters.ini');
$dK = $iniK->read('inis/masters.ini');

include 'addons/afk_bot.php'; // Afk bot 
include 'addons/isMuted.php';


$ini = new INI('config.ini');
$d = $ini->read('config.ini');


$pref=$p[$message->full_channel->guild->id]['Prefix'];
if($pref != "")
{
    $dat = explode($pref, $message->content); // using normal param #paradox example #paradox who am i?
    $rawdat=$dat[1];

}


// ##### CHANGE THE <@YOURBOTSIDHERE> or it will only work if you say @Paradox... 
$special = explode("<@147463276840747008> ", $message->content); // using special param @Paradox instead of #paradox example: @Paradox Who am i?
$specdat=$special[1];

if(strpos($message->content, " ") > 0)
{
$dat = explode(" ", $dat[1]);
$rawdat=$dat[0];
}


$ad=0;
$am=0;
$rawdat=strtolower($rawdat);
$specdat=strtolower($specdat);

include 'special_commands.php';

// end of @Paradox commands.







if((isset($dat[1])) && ($message->author->username != $discord->user->username)) // This is the normal command param #example
{
include 'addons/chkowner.php'; // checks to see if user is my master or not.

// ################# Bot commands ####################
// make sure we have permissions to send messages or we're screwed..

$pref_len=strlen($pref);

$drp=substr($message->content, 0, $pref_len);
if($drp == $pref)
{
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
include 'master_cmds.php';
}

// end #############
} // isset end


		$reply = $message->timestamp->format('F Y h:i:s A') . ' - '; // Format the message timestamp.
		$reply .= $message->full_channel->guild->name . ' - ';
		$reply .= $message->author->username . ' - '; // Add the message author's username onto the string.
		$reply .= $message->content; // Add the message content.
		echo $reply . PHP_EOL; // Finally, echo the message with a PHP end of line.	
		
	}	
$prefixes  = parse_ini_string(file_get_contents( 'inis/Prefix.ini' ), true);

$chk=0;
// ### join server if this is the firstTime and user private messages #join <serverlink>
$ispm=0;
if(($message->full_channel->guild->name == "") && ($message->author->username != $discord->user->username))
{
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');

$example="";
$ex=0;
foreach($prefixes as $section)
{
foreach($section as $key => $val)
{
if(($ex < 4) && ($val != ""))
{
    $example .= $val . ", ";
    $ex=$ex+1;
}

$pmdat=explode($val, $message->content);
    if(isset($pmdat[1]))
        {
            $rawdat=$pmdat[1];
            $pref_len=strlen($val);
            $drp=substr($message->content, 0, $pref_len);
                if($drp == $val)
                    {
                        $chk="1";
                        $thepref=$val;
                    } // end of derp
        }

} // foreach end check for prefixes.
} // end of section foreach

if(strpos($message->content, " ") > 0)
{
$pmdat = explode(" ", $rawdat);
$rawdat=$pmdat[0];
}


if($chk == 1)
{

        $ispm="1";
    include 'master_cmds.php';
}
else
{



}


$worked="false";
$invalid="false";


if(strpos($message->content, ".gg/") > 0)
{
    $worked="true";
// $discord->acceptInvite($code);
$server_link=substr($message->content, -16);
$humanlink=explode("gg/", $message->content);


if(strpos($message->content, "-") > 0)
{


try
{
$discord->acceptInvite($message->content);
$_SESSION['master'] = $message->author->username;
$_SESSION['non_Carbon'] = $message->author->id;
$message->author->sendMessage("Alright I'm now on your server! If you've invited me using carbonite.com Then I've made the server owner my Bot Master. If this is not what you wanted, kick Paradox and invite him yourself in PM!");
} catch (\Exceptions $e) {
$message->author->sendMessage("Something has gone wrong, either i am banned from this server, or the invite is expired!");
} // end of try




}
else
{

try
{
$discord->acceptInvite($server_link);
$_SESSION['master'] = $message->author->username;
$_SESSION['non_Carbon'] = $message->author->id;
$message->author->sendMessage("Alright I'm now on your server! If you've invited me using carbonite.com Then I've made the server owner my Bot Master. If this is not what you wanted, kick Paradox and invite him yourself in PM!");
} catch (\Exceptions $e) {
$invalid = "true";
$message->author->sendMessage("Sorry, something has happened. \n ```".$e->getMessage()."```");
}

} // check if it's human readable or not. using the xkcdpass


} // end of join command




// $message->author->sendMessage("command sent: \n" . $pmdat[1]);
if(isset($rawdat))
{
if(($rawdat == "join") && ($worked == "false"))
{
$pmsg=str_replace("#join ", "", $message->content);

// $discord->acceptInvite($code);
$server_link=substr($message->content, -16);


try
{
$discord->acceptInvite($server_link);
$_SESSION['master'] = $message->author->username;
$_SESSION['non_Carbon'] = $message->author->id;
$message->author->sendMessage("Alright I'm now on your server! If you've invited me using carbonite.com Then I've made the server owner my Bot Master. If this is not what you wanted, kick Paradox and invite him yourself in PM!");
} catch (\Exceptions $e) {
$message->author->sendMessage("Sorry, something has happened. \n ```".$e->getMessage()."```");
$invalid="true";
}


} // end of join command


// $message->author->sendMessage("command sent: \n" . $pmdat[1]);

} // end of isset $pmdat[1]
} // end of message = owner & it's a pm.


$didwork=0;

include 'addons/chkbot.php'; // checks if the user is new, if the config is setup properly. this addon will walk you through it.


	});

$err=0;
$owner_id="";
$ws->on(Event::GUILD_CREATE, function ($guild, $discord, $new) {
    echo "Joined {$guild->name}\r\n";


        $newguild=$guild->name;
        $newid=$guild->id;
        $master=$_SESSION['master'];
        $_SESSION['guildid'] = $newid;


if($_SESSION['master'] == "Carbon")
{
    echo "Invited by Carbon: ".PHP_EOL;

      $owner_id=$guild->owner_id;
        $new_owner = \Discord\Parts\User\User::find($owner_id);
         $new_owner = $new_owner->username;
         $guild_owner=$guild->owner_id;

    $didwork = 1;

$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');

$iniD->data[$newid]['Name'] = $newguild;
$iniD->data[$newid]['Links'] = "False";
$iniD->data[$newid]['Master'] = $new_owner;
$iniD->data[$newid][$owner_id] = 1;
$iniD->write('inis/masters.ini');

$iniP->data[$newid]['Prefix'] = "#";
$iniP->write('inis/Prefix.ini');


// $user = \Discord\Parts\User\User::find($owner_id);
 // $user->sendMessage(":v: Hello, I was invited by someone from __Carbonitex.net__. You are now my `sudo` bot master in this server, you can add masters, delete masters, kick, make channels, all those good things. For my commands type `#commands` either in PM or on your server. \nMake sure he has the correct permissions for what you want him to do. You can also type `#help [cmd]` to get help on any command. *If you did not invite this bot to your server and do not want him here, throw a kick or ban hammer my way!\n\nPopular Problems:\n```Bot's not responding to commands:\nIf he has permissions to the server try kicking him, and then Re-invite in PM with a link.\n\nRole color isn't changing\nIf the role is new, or newly renamed..it could take a few miniutes.```\nAny other issues type `#error [your error]` and for a new feature `#request [new feature]` Thanks Again!");


}
else
{

    if($didwork == 0)
    {
         $guild_owner=$guild->owner_id;
         $server_owner = \Discord\Parts\User\User::find($guild_owner);


echo "Invited by: " . $master.PHP_EOL;

$guild = $discord->guilds->get('id', $newid);
$members = $guild->members; // Returns a collection of members
 $get_id=$members->get('username', $master);
$owner_id=$get_id->id;


    //  $new_owner = \Discord\Parts\User\User::find($master);
     //  $owner_id=$new_owner->id;

if($guild_owner != $owner_id)
{

$server_owner->sendMessage("Hello! It seems `".$master."` has invited me to your server. I wanted to alert you incase i'm not allowed here!\nYou can type `#commands` or `#help [cmd name]` For all my information.");

} // check if the guild owner invited me, if not send him a message alerting him who invited him.

if($owner_id == "")
{
$owner_id=$_SESSION['non_Carbon'];
}


$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');


$iniD->data[$newid]['Name'] = $newguild;
$iniD->data[$newid]['Links'] = "False";
$iniD->data[$newid]['Master'] = $master;
$iniD->data[$newid][$owner_id] = 1;
$iniD->write('inis/masters.ini');

$iniP->data[$newid]['Prefix'] = "#";
$iniP->write('inis/Prefix.ini');




 // $user->sendMessage(":v: You are now my `sudo` bot master in this server, you can add masters, delete masters, kick, make channels, all those good things. For my commands type `#commands` either in PM or on your server. \nMake sure he has the correct permissions for what you want him to do. You can also type `#help [cmd]` to get help on any command.\n\nPopular Problems:\n```Bot's not responding to commands:\nIf he has permissions to the server try kicking him, and then Re-invite in PM with a link.\n\nRole color isn't changing\nIf the role is new, or newly renamed..it could take a few miniutes.```\nAny other issues type `#error [your error]` and for a new feature `#request [new feature]` Thanks Again!");


}

} // end of carbon check, if they were invited by carbonite..we need to put the owner_id as master

  });



$ws->on(Event::GUILD_DELETE, function ($guild, $discord, $new) {
    echo "Kicked From {$guild->name}\r\n";
        $newguild=$guild->id;

$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');


unset($iniD->data[$newguild]);
$iniD->write('inis/masters.ini');


unset($iniP->data[$newguild]);
$iniP->write('inis/Prefix.ini');

  });




});

$ws->run();
?>
