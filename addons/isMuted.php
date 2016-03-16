<?php
use Discord\Exceptions\PartRequestFailedException;

$ini = new INI('config.ini');
$d = $ini->read('config.ini');


$damn=0;
$num=0;
$wo=0;
$did=0;
$theguild=$message->full_channel->guild->name;
$thechannel=$message->channel_id;

$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
if(isset($guild))
{



$channel = $guild->channels->get('id', $message->channel_id);
$channel = $message->channel;
$themsg=" ".$message->content;
$mid=0;

$ismute="false";



foreach( $d['muted'] as $key=>$data )
{
	$mute_data=explode("€", $data);
	$muted_user=$mute_data[0];
	$muted_reason=$mute_data[1];
	$user=$key;
}

$user_id=$message->author->id;

// if($dD[$message->full_channel->guild->name][$message->author->username] == "")
// {
	if(($message->author->username == $user) && ($message->full_channel->guild->id == $muted_user))
	{
$redata = $muted_reason;


						$user_id=$message->author->id;
						$mid=$message->id;
			//			echo "## I found the message ID:".$mid.PHP_EOL;
						$getmsg=str_replace($key, "****", $getmsg);
						$ismute="true";


				

		$rmmessages = 2;
		$channel = $message->channel;
		$num = 0;
		$channel->message_count = $rmmessages + 1;
foreach ($channel->messages as $key => $message) 
{


if($message->author->username != $discord->user->username)
{

if($ismute == "true")
{

	if($message->id == $mid)
	{
//		echo "## Found message id:".$mid.PHP_EOL;

		try {
				$w=$w+1;
//		echo "## DELETED => " . $mid.PHP_EOL;
				$message->delete();
			} catch (PartRequestFailedException $e) {
//		echo "## something happened " . $e->getMessage().PHP_EOL;
				$w=$w-1;
				continue;
			}
			$num++;
		}
		} // end of badword == "true"
	} // make sure the last message wasn't the bots.
	} // end of foreach














//####### TRY REPEATING IF IT FAILS TO DELETE..

if($w == 0)
{

$guild = $discord->guilds->get('name', $theguild);
$channel = $guild->channels->get('id', $thechannel);


foreach ($channel->messages as $key => $message) 
{
if($message->author->username != $discord->user->username)
{
if($ismute == "true")
{
	if($message->id == $mid)
	{
	//	echo "## Found message id:".$mid.PHP_EOL;

		try {
				$w=$w+1;
	//	echo "## DELETED => " . $mid.PHP_EOL;
				$message->delete();
			} catch (PartRequestFailedException $e) {
				$w=$w-1;
	//	echo "## something happened " . $e->getMessage().PHP_EOL;
				continue;
			}
			$num++;
	}
} // end of badword == "true"
} // check to make sure the last message wasn't his.
} // end of foreach
} // end of check and repease baby...check and repeat;;;











// ## SEARCH TO SEE IF PEOPLE EDIT THEIR MESSAGE TO ADD SWEAR WORDS. 



$guild = $discord->guilds->get('name', $theguild);
$channel = $guild->channels->get('id', $thechannel);

/*
foreach ($channel->messages as $key => $message) 
{


			foreach ($denied as $key)
			{
				if(strpos(strtolower($themsg), $key) >= 1)
					{
						$mid=$message->id;
			//			echo "## I found the message ID:".$mid.PHP_EOL;
						$badword="true";
					} // str pos if key is bad
			} // foreach loop



if($message->author->username != $discord->user->username)
{
if($badword == "true")
{
	if($message->id == $mid)
	{

		$channel = $message->channel;
		$num = 0;
		$channel->message_count = $rmmessages + 6;
	//	echo "## Found message id:".$mid.PHP_EOL;

		try {
				$w=$w+1;
	//	echo "## DELETED => " . $mid.PHP_EOL;
				$message->delete();
			} catch (PartRequestFailedException $e) {
	//	echo "## something happened " . $e->getMessage().PHP_EOL;
				continue;
			}
			$num++;
	}
} // end of badword == "true"
} // check to make sure the last message wasn't his.
} // end of foreach


*/



		if($w > 0)
		{

 if(time() >= $_SESSION[$message->author->id . '_muted'] + (60 * 2)) { // 60 * 2 is 2 minutes

$user = \Discord\Parts\User\User::find($message->author->id);
$user->sendMessage("You're currently muted in Server: " . $message->full_channel->guild->name . " The reason being: " . $muted_reason);
 }

		}
		else
		{
if($_SESSION[$message->author->id.$message->channel_id.'mt'] == "")
{

	$message->channel->sendMessage("I can't mute people if my permissions aren't setup to manage messages...");
$_SESSION[$message->author->id.$message->channel_id.'mt'] = "546";
}

		}

} // make sure the channel wants to have a filter/



// } // check to see if the user is different than the master




} // end of guild isset
?>