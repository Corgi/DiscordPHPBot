<?php
$ab=0;
$deltru="no";

$isAFK="false";
// ################### AFK Bot Check ###################
$usrs  = parse_ini_string(file_get_contents( 'inis/afk.ini' ), true);



if($message->full_channel->guild->name == "Discord Bots")
{
	$deltru = "yes";
}




foreach($usrs as $section)
{

foreach ($section as $usr=>$inp)
{
$adat= "@" . $section['Id'] . ">";
if((strpos($message->content, $adat)  > 0) && ($section['AFK'] == "True"))
{
 $afkusr=$section['Username'];
 $afkid=$section['Id'];
 $afkmsg=$section['Message'];
 $afktime=$section['Time'];
 $thsrv=$message->full_channel->guild->name;
$isAFK="true";
} // end of strpos
} // end of foreach 2

} // check all sections 

// echo date('Y-m-d H:i:s', $now);


if(($isAFK == "true") && ($message->author->username != $discord->user->username))
{

$afk_time=$days1 . $hours1 . $minutes1 . $seconds . " Seconds.";
 if(time() >= $_SESSION[$thesrv.'_'.$afkusr.'_afk_bot_spam'] + (60 * 5)) { // 60 * 2 is 2 minutes

// check if the server is respect, if so...send a pm instead.
if($deltru == "no")
{

	try
	{
$message->channel->sendMessage(":zzz:*" . $afkusr . "'s AFK:* . o 0 ( **" . $afkmsg . "** ) 0 o . \n");
} catch (DiscordRequestFailedException $e) {

}

}
else
{
// $user = \Discord\Parts\User\User::find($message->author->id);
// $user->sendMessage(":zzz:*" . $afkusr . "'s AFK:* . o 0 ( **" . $afkmsg . "** ) 0 o . \n");
}
// ##############################

$_SESSION[$thesrv.'_'.$afkusr.'_afk_bot_spam'] = time(); // Prevent the bot from spamming 
}
}


