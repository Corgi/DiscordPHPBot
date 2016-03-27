<?php
$pref=$p[$message->full_channel->guild->id]['Prefix'];
if($pref == "")
{
$global->sendMessage("You can't use this command in `private message`");
}
else
{



if($d['commands']['byemsg'] == "1")
{
$msg=str_replace($pref."autorole ", "", $message->content);
if(($this->isMaster($message->full_channel->guild->name, $message->author->id) == true) || ($dD[$message->full_channel->guild->id]['Master'] == $message->author->username))
{



	$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
    // And now the user to change.
   // $member = $guild->members->first();
	if(isset($guild))
	{
//		echo "Found the Guild!".PHP_EOL;

// echo "Found the member!".PHP_EOL;
    // And the role to remove.
   // $role = $member->roles->first();
		try
		{
		$role = $guild->roles->get('name', $msg);
		} catch (PartRequestFailedException $e) {
			$message->channel->sendMessage("I don't have permissions to manage roles in this server");
		}

	if(isset($role))
	{
	//	echo "Saving the role!".PHP_EOL;
    // $member->addRole($role);
    // $member->save(); // Remember: You MUST save after changing roles.
   //  $message->channel->sendMessage("Alright, I've given you the role `".$msg."`");
		$iniD->data[$message->full_channel->guild->id]['Auto'] = $msg;
		$iniD->write('inis/masters.ini');
		$message->channel->sendMessage("Alright I will now add all new members to the role: " .$msg);
	}
	else
	{
		$message->channel->sendMessage("I can't find the role you're trying to grab. `This is Case Sensitive..`");
	} // make sure the role exists.

	} // check to make sure the guild exists.





}
else
{
	$message->channel->sendMessage("Only my masters can use this command.");
}




}
else
{
	echo "Command is disabled".PHP_EOL;
}



} // server only command

