<?php
$pref=$p[$message->full_channel->guild->id]['Prefix'];
if($pref == "")
{
$pref=$thepref;
}

$msg=str_replace($pref."request ", "", $message->content);
$msg=str_replace("```", "", $msg);

$res="```fix"."\n";


if(time() >= $_SESSION[$message->author->id.'_rq_spam'] + (60 * 30)) { // 60 * 2 is 2 minutes

$guild = $discord->guilds->get('name', $d['settings']['server']);
$channel = $guild->channels->get('name', "bot_requests"); // you can change 'name' to any other attribute if you want
try
{
$channel->sendMessage("`".$message->author->username . "` Requests Feature:  \n".$res." ".$msg."```"); // will return a Message object
$global->sendMessage("Your request has been sent in. Thank you for your feedback! ");
$_SESSION[$message->author->id.'_rq_spam'] = time();
} catch (PartRequestFailedException $e) {
}


}
else
{
	try
	{
	$global->sendMessage("I allow one request per 30 minutes. `and this is subject to change` \nabusing this command will get you banned from all commands.");
	} catch (PartRequestFailedException $e) {
	}
	
}
