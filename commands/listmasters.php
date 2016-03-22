<?php
use Discord\Exceptions\PartRequestFailedException;

$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniD = new INI('inis/masters.ini');
$dD = $ini->read('inis/masters.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
$opt_server=$message->full_channel->guild->id;
$inviter=$dD[$opt_server]['Master'];

if($pref == "")
{
$global->sendMessage("You can't use this command in `private message`");
}
else
{


if($dD[$opt_server]['Master'] == $message->author->id)
{
$found=0;

$masters  = parse_ini_string(file_get_contents( 'inis/masters.ini' ), true);
$tm=0;

$result = "```ruby" . "\n";

foreach ($masters as $section)
{
//	if($data[''])

foreach($section as $key => $val)
{
	if($section['Name'] == $message->full_channel->guild->name)
	{
		if($val == "1")
		{
			 $user = \Discord\Parts\User\User::find($key);
		$result .= "Found " . $user->username . " in: " . $section['Name'] . "\n";
		$found=$found+1;
		}
	}
} // foreach loop - masters
}  // foreach loop - sections
$result .="(".$found.") Result(s) found.```";

try
{
$message->channel->sendMessage("Search master query for: " .$opt_server." Complete. \n" . $result);
} catch (PartRequestFailedException $e) {
}


}
else
{

	try
	{
	$message->channel->sendMessage("Sorry, Only the bot inviter `".$inviter."` Has  permissions to use this command.");
	} catch (PartRequestFailedException $e) {
	}

	
}

} // cmd only works in server
?>