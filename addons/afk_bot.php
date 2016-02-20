<?php

$ab=0;
// ################### AFK Bot Check ###################
foreach( $datas['afk'] as $key=>$data )
{
$newkey=explode("€", $data);
// $message->reply($newkey[0]);
// $message->reply($newkey[1]);
// $message->reply($key);
echo strpos($message->content, $key);
$adat=str_replace("<", "", $newkey[0]);
if((strpos($message->content, $key) > 0) || (strpos($message->content, $adat) > 0))
{
$afkmsg=$newkey[1];
$afkusr=$key;
$ab = $ab + 1;
}
} // end of foreach loop
// ######################################################

if(($ab > 0) && ($message->author->username != "Paradox"))
{
$message->channel->sendMessage(":zzz:*" . $afkusr . "'s AFK:* . o 0 ( **" . $afkmsg . "** ) 0 o .");
}

?>