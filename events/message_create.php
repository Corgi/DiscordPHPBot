<?php
use Discord\Exceptions\InviteInvalidException;
$datas  = parse_ini_string(file_get_contents( 'config.ini' ), true);
$firstTime=$datas['settings']['firstTime'];
 if($firstTime == "Yes")
 {

if($message->content == "#owner")
{

    $ini = new INI('config.ini');
    $d = $ini->read('config.ini');
    $iniM = new INI('inis/masters.ini');
    $m = $iniM->read('inis/masters.ini');
    $iniP = new INI('inis/Prefix.ini');
    $p = $iniP->read('inis/Prefix.ini');
    $goid=$message->author->id;


    if($goid != "")
    {
        $ini->data['settings']['owner'] = $goid;
        $ini->data['settings']['server'] = $message->full_channel->guild->name;
        $ini->data['settings']['Name'] = $discord->user->username;
        $ini->data['settings']['firstTime'] = "No";
        $ini->write("config.ini");

        $iniM->data[$message->full_channel->guild->id]['Server'] = $message->full_channel->guild->name;
        $iniM->data[$message->full_channel->guild->id]['Master'] = $goid;
        $iniM->data[$message->full_channel->guild->id][$message->author->id] = "1";
        $iniM->data[$message->full_channel->guild->id]['GreetChannel'] = "";
        $iniM->write("inis/masters.ini");

        $iniP->data[$message->full_channel->guild->id]['Prefix'] = "#";
        $iniP->write("inis/Prefix.ini");


        $message->channel->sendMessage("Alright, I recognize <@".$goid."> as my Owner.\nMy main server: ".$message->full_channel->guild->name."\nMy Name is ".$discord->user->username."\nMy framework is `DiscordPHP` I was written by: `Proxy` you can come in and ask for help with anything at: https://discord.gg/0pTKzt2BDInBOrxL");
    }
    else
    {
        $message->channel->sendMessage("Something went wrong... you need to type `##owner @user` make sure to mention yourself.");
    }
} // look for owner

} // make sure it's the first time.






include 'addons/afk_bot.php'; // Afk bot 
include 'addons/isMuted.php';
$pref=$p[$message->full_channel->guild->id]['Prefix'];
if($pref != "")
{
    $dat = explode($pref, $message->content); // using normal param #paradox example #paradox who am i?
    $rawdat=$dat[1];
}




$special = explode("<@".$discord->user->id."> ", $message->content); // using special param @Paradox instead of #paradox example: @Paradox Who am i?
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


// ######### UNCOMMENT THIS PATCH IF YOU WANT TO SEE THE CHAT ON THE BOTS SERVERS
// WARNING, THIS COULD CAUSE MEMORY CRASHES IF YOU'RE ON A DECENT AMOUNT OF SERVERS.

        $reply = $message->timestamp->format('F Y h:i:s A') . ' - '; // Format the message timestamp.
        $reply .= $message->full_channel->guild->name . ' - ';
        $reply .= $message->author->username . ' - '; // Add the message author's username onto the string.
        $reply .= $message->content; // Add the message content.
        echo $reply . PHP_EOL; // Finally, echo the message with a PHP end of line.    








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



    $worked="false";
    $invalid="false";
    if (preg_match('/https:\/\/discord.gg\/(.+)/', $message->content, $matches))
    {
        $discord->acceptInvite($message->content);
        $message->author->sendMessage("Hi, I am now in your server!");
    }

} // end of message = owner & it's a pm.
$didwork=0;
include 'addons/chkbot.php'; // checks if the user is new, if the config is setup properly. this addon will walk you through it.

