<?php
use Discord\Exceptions\DiscordRequestFailedException;
use Discord\Exceptions\InviteInvalidException;
use Discord\Exceptions\PartRequestFailedException;
$file = 'cmd_history.log';
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$old=$d['settings']['cmdsRun'];
$newnum = $old + 1;
$ini->data['settings']['cmdsRun'] = $newnum;
$ini->write('config.ini');
$iscm=0;
$isBanned = "false";
$type="";
$server="";
$user="";
$global = "";
$rep=0;
$DontDoIt="no";
$isSpecial="no";

$iscmd2=0;

if($message->full_channel->guild->name != "")
{


	if($message->author->id != $d['settings']['owner'])
	{


try{
$guild = $discord->guilds->get('name', $d['settings']['server']);
if(isset($guild))
{

// ###### Log all commands to cmd_history.log file typed in a server ##################

$current = file_get_contents($file);
// Append a new person to the file
$current .= $message->author->username . " Triggered: " . $pref.$rawdat." In Server " .  $message->full_channel->guild->name . "\n";
// Write the contents back to the file
file_put_contents($file, $current);


} // check if guild exists.

	} catch (PartRequestFailedException $e) {
	} // end of try

} // check if the user is owner or not, if so don't log his commands.

}
else
{

		if($message->author->id != $d['settings']['owner'])
	{

// ########## Logs all pm commands, the logs will not log the owner's commands.
	try{
$current = file_get_contents($file);
// Append a new person to the file
$current .= $message->author->username . " Triggered: " . $pref.$rawdat." In Private Message\n";
// Write the contents back to the file
file_put_contents($file, $current);
	} catch (PartRequestFailedException $e) {
	} // end of try

} // check if owner or not.


} // check if it's a server request or a pm request.




// ############## check if it's a chat command or a pm command. ####################
if($message->full_channel->guild->name != "")
{
$type="server";
$global = $message->channel;
}
else
{
$type="pm";
$user = \Discord\Parts\User\User::find($message->author->id);
$global=$user;
}




// # CHECK IF it's a command
foreach ( $d['commands'] as $key=>$data )
{
	if($rawdat == $key)
	{
		$iscm=$iscm+1;
	}	
}
// #################





foreach ( $d['user_cmd_ban'] as $key2=>$data2 )
{
	if($message->author->id == $key2)
	{
		$isBanned= "true";

	}	
}






if($iscm > 0)
{
	if($isBanned == "false")
	{
$rawdat=strtolower($rawdat);

try {
	$sendError=0;
  //  $channel->sendMessage('testing perms')->delete();
if($rawdat == "byemsg") { include 'commands/byemsg.php'; } // Let's play Emoji Order Frenzy!!
if($rawdat == "setwarning") { include 'commands/setwarning.php'; } // Let's play Emoji Order Frenzy!!
if($rawdat == "announce") { include 'commands/announce.php'; } // Let's play Emoji Order Frenzy!! 
if($rawdat == "cats") { include 'commands/cats.php'; } // Let's play Emoji Order Frenzy!! 
if($rawdat == "updates") { include 'commands/updates.php'; } // Let's play Emoji Order Frenzy!! 	
if(($rawdat == "flush") && ($ad > 0)) { include 'commands/flush.php'; } // deletes x amount of messages from channel.
if($rawdat == "transfer") { include 'commands/transfer.php'; } // use spell check on a word.
if($rawdat == "set") { include 'commands/set.php'; } // allows bot masters to set their greetmsg/linkmsg/filtermsg
if($rawdat == "setprefix") { include 'commands/setprefix.php'; } // sets the command prefix. Default is #
if(($rawdat == "restart") && ($ow > 0)) { include 'commands/restart.php'; } // Restarts the bot.
if($rawdat == "mimic") { include 'commands/mimic.php'; } // returns the text you've typed.
if($rawdat == "afk") { include 'commands/afk.php'; } // adds an afk message, if someone mentions you it will reply for you.
if($rawdat == "back") { include 'commands/back.php'; } // deletes your afk message.
if(($rawdat == "commands") || ($rawdat == "cmd") || ($rawdat == "cmds")) { include 'commands/commands.php'; } // Shows a list of commands
if($rawdat == "status") { include 'commands/status.php'; } // changes Paradox bot status
if($rawdat == "getstatus") { include 'commands/getstatus.php'; } // gets user status
if($rawdat == "getid") { include 'commands/getid.php'; } // gets user id
if($rawdat == "getavatar") { include 'commands/getavatar.php'; } // gets user avatar.
if($rawdat == "info") { include 'commands/info.php'; } // displays bot information
if(($rawdat == "kick") && ($ad > 0)) { include 'commands/kick.php'; } // kicks a user from server.
if(($rawdat == "addmaster") && ($ad > 0)) { include 'commands/addmaster.php'; } // adds a user to my masters list.
if(($rawdat == "delmaster") && ($ad > 0)) { include 'commands/delmaster.php'; } // removes a user from my masters list.
if(($rawdat == "mkchan") && ($ad > 0)) { include 'commands/mkchan.php'; } // Creates channel in server.
if(($rawdat == "log") && ($ow > 0)) { include 'commands/log.php'; } // posts a log into the bot_log channel.
if(($rawdat == "logserver") && ($ow > 0)) { include 'commands/logserver.php'; } // sets a server for your bot log.
if(($rawdat == "logchannel") && ($ow > 0)) { include 'commands/logchannel.php'; } // sets a channel for your bot log.
if($rawdat == "reportuser") { include 'commands/reportuser.php'; } // reports a user.
if(($rawdat == "listreports") && ($ow > 0)) { include 'commands/listreports.php'; } // lists reported users.
if(($rawdat == "delreport") && ($ow > 0)) { include 'commands/delreport.php'; } // deletes a report on a user usage: #delreport <username>
if($rawdat == "mute") { include 'commands/mute.php'; } // deletes user's text in chat. #mute <user>
if($rawdat == "unmute") { include 'commands/unmute.php'; } // deletes a report on a user usage: #delreport <username>
if($rawdat == "giphy") { include 'commands/giphy.php'; } // posts a random giphy img #giphy <keyword>
if($rawdat == "sticker") { include 'commands/sticker.php'; } // posts a random giphy sticker #sticker <keyword>
if($rawdat == "weather") { include 'commands/weather.php'; } // get's the weather from a zip code #weather <ZIPCODE> or <CITYNAME>
if($rawdat == "shorturl") { include 'commands/shorturl.php'; } // uses bit.ly #shorturl <url> you have to setup a OAUTH key from bit.ly then place in config.ini under [apis].
if($rawdat == "quotes") { include 'commands/quotes.php'; } // returns a random famous quote #quotes
if(($rawdat == "enable") && ($ow > 0)) { include 'commands/enable.php'; } // enable a command: #enable restart, #enable shorturl etc..
if(($rawdat == "disable") && ($ow > 0)) { include 'commands/disable.php'; } // disable a command: #disable restart, #disable shorturl etc..
if(($rawdat == "shutdown") && ($ow > 0)) { include 'commands/shutdown.php'; } // Shuts the bot down. Only the Bot Owner can use this.
if(($rawdat == "change") && ($ow > 0)) { include 'commands/change.php'; } // change bot information ;; only the bot master can use this
if(($rawdat == "myavatars") && ($ow > 0)) { include 'commands/myavatars.php'; } // shows a list of png files the bot can use as his avatar.
if($rawdat == "serverinfo") { include 'commands/serverinfo.php'; } // shows a list of png files the bot can use as his avatar.
if($rawdat == "vardmp") { include 'commands/vardmp.php'; } // eval a variable.
if($rawdat == "sudo") { include 'commands/sudo.php'; } // eval a variable.
if($rawdat == "topic") { include 'commands/topic.php'; } // dumps an object or arrow to Dumps/ folder.
if($rawdat == "rolecolor") { include 'commands/rolecolor.php'; } // dumps an object or arrow to Dumps/ folder.
if($rawdat == "checkurl") { include 'commands/checkurl.php'; } // dumps an object or arrow to Dumps/ folder.
if($rawdat == "listmasters") { include 'commands/listmasters.php'; } // dumps an object or arrow to Dumps/ folder.
if($rawdat == "help") { include 'commands/help.php'; } 
if($rawdat == "checkpass") { include 'commands/checkpass.php'; } 
if($rawdat == "hash") { include 'commands/hash.php'; } 
if($rawdat == "locateip") { include 'commands/locateip.php'; } 
if($rawdat == "isemail") { include 'commands/isemail.php'; } 
if($rawdat == "request") { include 'commands/request.php'; } 
if($rawdat == "error") { include 'commands/error.php'; } // reports error to my error_reports channel
if($rawdat == "guildid") { include 'commands/guildid.php'; } // grabs guildid
if($rawdat == "ban") { include 'commands/ban.php'; } // grabs guildid
if($rawdat == "dm") { include 'commands/dm.php'; } // sends dm
if($rawdat == "servers") { include 'commands/servers.php'; } // shows my servers
if($rawdat == "masters") { include 'commands/masters.php'; } // shows total masters
if($rawdat == "members") { include 'commands/members.php'; } // shows total members
if($rawdat == "memory") { include 'commands/memory.php'; } // shows total memory
if($rawdat == "uptime") { include 'commands/uptime.php'; } // shows total memory

} catch (DiscordRequestFailedException $e) {
    echo "Can't send message\r\n";
$user1_id=$message->author->id;
$user = \Discord\Parts\User\User::find($user1_id);
$user->sendMessage("Hello! it seems we have a problem! Whatever you're trying to make me do, i don't have permissions for. Make sure i can send messages in your server, if you're trying to kick,ban make sure i have `Kick` or `Ban` enabled in my role. If you're trying to flush. i need `manage_messages` permission enabled.");
} // catch an error if the bot doesn't have permissions he will pm the user.

} // end of check if user is banned from my commands, if not run command.




if(($_SESSION[$message->author->id.'_try'] > 0) && ($isBanned == "false"))
{
unset($_SESSION[$message->author->id.'_try']);
} // end of wipe user tries.



}
else // $iscm esle if
{


// ##### let's see if people are spamming incorrect commands, I built paradox to be a little bipolar.. if they type too many
// ##### Unknown commands without getting it right, he bans their asses from every using his commands. (I added this for cmd_history.log) 
if($isBanned == "false")
{

// ### Check if the user has tried more than 2 times but less than 5
if(($_SESSION[$message->author->id.'_try'] > 2) && ($_SESSION[$message->author->id.'_try']) < 5)
{
//	echo "### USER HAS TRIED more than twice less than 5 TIMES" . PHP_EOL;
$user1_id=$message->author->id;
$user = \Discord\Parts\User\User::find($user1_id);
$_SESSION[$message->author->id.'_try'] = $_SESSION[$message->author->id.'_try'] + 1;
}





if($_SESSION[$message->author->id.'_try'] <= 2)
{
// echo "### USE HAS TRIED 0 TIMES" . PHP_EOL;
// $message->reply("Command not Found, please type ".$pref."commands to see a list of my commands. \n");
$_SESSION[$message->author->id.'_try'] = $_SESSION[$message->author->id.'_try'] + 1;

} // if the user hasn't tried my commands wrong before show this 2 times!
} // end of isban == false check






if($_SESSION[$message->author->id.'_try'] > 5)
{
	echo "### USE HAS BEEN BANNED FROM COMMANDS" . PHP_EOL;

// $user1_id=$message->author->id;
// $user = \Discord\Parts\User\User::find($user1_id);
$message->reply("I'm sorry, You have been banned from using my commands. \n Bans (may) get wiped weekly. \n ");
$_SESSION[$message->author->id.'_try'] = $user_try + 1;
	if($isBanned == "false")
		{
			$ini->data['user_cmd_ban'][$message->author->id] = $message->author->username;
			$ini->write('config.ini');
		}
} // if the user hasn't tried my commands wrong before show this 2 times!



} // end of check if it's a command or not.


?>