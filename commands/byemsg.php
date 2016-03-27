<?php
$pref=$p[$message->full_channel->guild->id]['Prefix'];
if($pref == "")
{
$global->sendMessage("You can't use this command in `private message`");
}
else
{

// $iniC = new INI('inis/masters.ini');
// $dC = $iniC->read('inis/masters.ini');


$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
$channel = $guild->channels->get('id', $message->channel_id);


if($d['commands']['byemsg'] == "1")
{
$msg=str_replace($pref."byemsg ", "", strtolower($message->content));

	if($msg != "")
	{

if(($this->isMaster($message->full_channel->guild->name, $message->author->id) == true) || ($dD[$message->full_channel->guild->id]['Master'] == $message->author->username))
{
					$iniD->data[$message->full_channel->guild->id]['byemsg'] = $msg;
					$iniD->write('inis/masters.ini');
					$message->channel->sendMessage("Alright I will now say your message when people leave: " .$msg);

			} // make sure the user is a master.

	}
	else
	{
		$message->channel->sendMessage("You need to set a message. example `".$pref."byemsg sorry to see you go!`");
	}



}
else
{
	echo "Command is disabled".PHP_EOL;
}



} // server only command

