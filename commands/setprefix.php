<?php
use Discord\Exceptions\PartRequestFailedException;

$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$iniM = new INI('inis/masters.ini');
$dM = $iniM->read('inis/masters.ini');

$pref=$p[$message->full_channel->guild->id]['Prefix'];
if($pref == "")
{
$global->sendMessage("You can't use this command in `private message`");
}
else
{


$msg=str_replace($pref."setprefix ", "", $message->content);
$deny="false";
$denied = array(1 => '!', '!!', '.', '..', '`', '+', ',', ';', '-', '~', '#', '^', '|', '@', '=', '*', '$', '%', '&');
$deltru="no";


if($d['commands']['setprefix'] == "1")
{




foreach ($d['respect'] as $key=>$val)
{
if($key == $message->full_channel->guild->id)
{
$deltru="yes";
} // end of if ch = respected than

} // end of foreach 2 find if the server is respected



if($deltru == "yes")
{
foreach ($denied as $ar)
{

	if($ar == $msg)
	{
		$deny="true";
	}

} // end of denied list for prefixes

}


if($dM[$message->full_channel->guild->id][$message->author->id] == "1")
{

	if(strlen($msg) <= 3)
	{

		if (preg_match("/[^A-Za-z0-9.]/", $msg))
			{

				if($deny == "false")
					{
						$iniP->data[$message->full_channel->guild->id]['Prefix'] = $msg;
						$iniP->write('inis/Prefix.ini');

						try
						{
						$message->channel->sendMessage(":exclamation: My command prefix has been changed in `".$message->full_channel->guild->name."` to `" . $msg . "`");
						} catch (PartRequestFailedException $e) {
						}


					}
					else
					{

						try
						{
					$message->channel->sendMessage(":exclamation: To prevent problems here on `".$message->full_channel->guild->name."` I have disabled basic prefixes, use something unique.");
					} catch (PartRequestFailedException $e) {
					}


					} // end of check if it's discord bots server, if so don't allow basic prefixes.
			}
			else
			{

				try
				{
				$message->channel->sendMessage(":exclamation: I only allow special characters like `~!@#$%^&*()_+=-\|/?.,`");
				} catch (PartRequestFailedException $e) {
				}


			} // end of special char check [it has to be special char]

	}
	else
	{

		try
		{
		$message->channel->sendMessage(":alien: Haha, are you trying to phone home, **E.T**? I only allow prefixes `3 characters or less`");
		} catch (PartRequestFailedException $e) {
		}

		
	}



}
else
{
echo "This command is disabled. \n";
}


}
else
{

	// message that they don't have master permissions in this server.
}




// ##### BOT OWNER CAN ONLY USE THIS IF ABOVE IS DISABLED.

if(($ow > 0) && ($d['commands']['setprefix'] == 0))
{
	if(strlen($msg) <= 3)
	{

if (preg_match("/[^A-Za-z0-9.]/", $msg)) {

if($deny == "false")
{
$ini->data['Prefix'][$message->full_channel->guild->name] = $msg;
$ini->write('config.ini');
$message->channel->sendMessage(":exclamation: My command prefix has been changed in `".$message->full_channel->guild->name."` to `" . $msg . "`");
}
else
{
$message->channel->sendMessage(":exclamation: To prevent problems here on `Discord Bots` I have disabled basic prefixes, use something unique.");
} // end of check if it's discord bots server, if so don't allow basic prefixes.
}
else
{
	$message->channel->sendMessage(":exclamation: I only allow special characters like `~!@#$%^&*()_+=-\|/?.,`");
} // end of special char check [it has to be special char]
	}
	else
	{
		$message->channel->sendMessage(":exclamation: I only allow prefixes 3 characters or less.");
	}
} // end of owner check


} // server only command
?>