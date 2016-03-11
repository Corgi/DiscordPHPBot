<?php
use Discord\Exceptions\PartRequestFailedException;


if(strtolower($specdat) == "what's your prefix?")
{
$pref=$p[$message->full_channel->guild->id]['Prefix'];


try
{
$message->channel->sendMessage("My prefix on this server is `".$pref."` you can change it by typing \n **".$pref."setprefix [newprefix]**"); 
} catch (PartRequestFailedException $e) {
}



}


?>