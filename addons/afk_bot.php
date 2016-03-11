<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];
$ab=0;
$deltru="no";

$isAFK="false";
// ################### AFK Bot Check ###################
$usrs  = parse_ini_string(file_get_contents( 'inis/afk.ini' ), true);



foreach ($d['respect'] as $key=>$val)
{
if($key == $message->full_channel->guild->id)
{
$deltru="yes";
} // end of if ch = respected than

} // end of foreach 2 find if the server is respected




foreach($usrs as $section)
{

foreach ($section as $usr=>$inp)
{
$adat= substr($section['Id'], -3) . ">";
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
$message->channel->sendMessage(":zzz:*" . $afkusr . "'s AFK:* . o 0 ( **" . $afkmsg . "** ) 0 o . \n");
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



/*
foreach( $d['afk'] as $key=>$mdata )
{
$newkey=explode("=>", $mdata);


// $message->reply($newkey[0]);
// $message->reply($newkey[1]);
// $message->reply($key);
// echo strpos($message->content, $key);

// $the_msg=$newkey[1];
$adat= substr($newkey[0], -3) . ">";

if(strpos($message->content, $adat)  > 0)
{
$theirmsg=explode("=>", $d['afk'][$key]);
$theirid=$theirmsg[0];

// $afkmsg=$newkey[1];
$afkusr=$key;
$ab = $ab + 1;
}
} // end of foreach loop
// ######################################################

if(($ab > 0) && ($message->author->username != $discord->user->username))
{

 if(time() >= $_SESSION[$message->full_channel->guild->name.'_'.$afkusr.'_afk_bot_spam'] + (60 * 2)) { // 60 * 2 is 2 minutes
$message->channel->sendMessage(":zzz:*" . $afkusr . "'s AFK:* . o 0 ( **" . $theirmsg[1] . "** ) 0 o .");
$_SESSION[$message->full_channel->guild->name.'_'.$afkusr.'_afk_bot_spam'] = time(); // Prevent the bot from spamming 
}
}
*/



?>