<?php
use Discord\Exceptions\PartRequestFailedException;

$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$iniB = new INI('inis/badwords.ini');
$dB = $iniB->read('inis/badwords.ini');
$iniM = new INI('inis/masters.ini');
$dM = $iniM->read('inis/masters.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
$did=0;
if($pref == "")
{
$global->sendMessage("You can't use this command in `private message`");
}
else
{


if($dM[$message->full_channel->guild->id][$message->author->id] == "1")
{
$msg=str_replace($pref."set ", "", strtolower($message->content));
$opt=explode(" ", $msg);
$theword=str_replace($pref."set ".$opt[0]." ", "", $message->content);
$word=strtolower($theword);


// #######################################################################

if(isset($opt[1]))
{







if(strtolower($opt[0]) == "greetmsg")
{
			$message->channel->sendMessage("My `Greetings Message` has been changed to: \n ```".$word."```");
			$iniM->data[$message->full_channel->guild->id]['GreetMsg'] = $word;
			$iniM->write('inis/masters.ini');

} // end of add greetmsg

} // end of isset

// #######################################################################





if(isset($opt[1]))
{


if(strtolower($opt[0]) == "filtermsg")
{
			$message->channel->sendMessage("My `Filter Message` has been changed to: \n ```".$word."```");
			$iniM->data[$message->full_channel->guild->id]['FilterMsg'] = $word;
			$iniM->write('inis/masters.ini');

} // end of add greetmsg

} // end of isset



if(isset($opt[1]))
{


if(strtolower($opt[0]) == "linkmsg")
{
			$message->channel->sendMessage("My `Ant-Link Message` has been changed to: \n ```".$word."```");
			$iniM->data[$message->full_channel->guild->id]['LinkMsg'] = $word;
			$iniM->write('inis/masters.ini');

} // end of add greetmsg

} // end of isset

} // end of owner check
} // end of pm check, this command only works in server
?>