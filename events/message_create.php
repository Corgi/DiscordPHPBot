<?php


// ######testing new github bot
// include 'addons/github.php'; // added this to a cron job, i think it's making my bot non-responsive.
// ############################

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


if($c > 0)
{

include 'addons/afk_bot.php'; // Afk bot 

include 'addons/isMuted.php';


$pref=$p[$message->full_channel->guild->id]['Prefix'];
if($pref != "")
{
    $dat = explode($pref, $message->content); // using normal param #paradox example #paradox who am i?
    $rawdat=$dat[1];

}

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

/*
		$reply = $message->timestamp->format('F Y h:i:s A') . ' - '; // Format the message timestamp.
		$reply .= $message->full_channel->guild->name . ' - ';
		$reply .= $message->author->username . ' - '; // Add the message author's username onto the string.
		$reply .= $message->content; // Add the message content.
		echo $reply . PHP_EOL; // Finally, echo the message with a PHP end of line.
*/		
		
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
$message->author->sendMessage("Alright I'm now on your server! My default prefix is: `--` you can type `--cmds` to see my list! If you've invited me using carbonite.com Then I've made the server owner my Bot Master. If this is not what you wanted, kick Paradox and invite him yourself in PM!");
} catch (InviteInvalidException $e) {
 $message->author->sendMessage("Something has gone wrong, either i am banned from this server, or the invite is expired!");
} // end of try




}
else
{

try
{
$discord->acceptInvite($message->content);
$_SESSION['master'] = $message->author->username;
$_SESSION['non_Carbon'] = $message->author->id;
$message->author->sendMessage("Alright I'm now on your server! My default prefix is: `--` you can type `--cmds` to see my list! If you've invited me using carbonite.com Then I've made the server owner my Bot Master. If this is not what you wanted, kick Paradox and invite him yourself in PM!");
} catch (InviteInvalidException $e) {
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
$discord->acceptInvite($message->content);
$_SESSION['master'] = $message->author->username;
$_SESSION['non_Carbon'] = $message->author->id;
$message->author->sendMessage("Alright I'm now on your server! My default prefix is: `--` you can type `--cmds` to see my list! If you've invited me using carbonite.com Then I've made the server owner my Bot Master. If this is not what you wanted, kick Paradox and invite him yourself in PM!");
} catch (InviteInvalidException $e) {
$message->author->sendMessage("Sorry, something has happened. \n ```".$e->getMessage()."```");
$invalid="true";
}


} // end of join command


// $message->author->sendMessage("command sent: \n" . $pmdat[1]);



}
else
{

 // if(time() >= $_SESSION[$message->author->id.'_pm_spam'] + (60 * 2)) { // 60 * 2 is 2 minutes

// $message->author->sendMessage("It seems you're having problems, I can join your server by typing `#join invite code` \n If you're just looking for my commands: in the server we are in type `@Paradox what's your prefix?` to get my prefix in the server. you can also join https://discord.gg/0pTKzt2BDIqDS4oW and ask me any questions! or just hangout."); 
// $_SESSION[$message->author->id.'_pm_spam'] = time();

// } // end of spam protection


} // end of isset $pmdat[1]
} // end of message = owner & it's a pm.


$didwork=0;

include 'addons/chkbot.php'; // checks if the user is new, if the config is setup properly. this addon will walk you through it.

