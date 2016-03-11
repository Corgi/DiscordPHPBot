<?php
use Discord\Exceptions\PartRequestFailedException;

$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
$canWork = "False";

if($pref == "")
{
$global->sendMessage("You can't use this command in `private message`");
}
else
{


$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
$channel = $guild->channels->get('id', $message->channel_id);

$overrides = $channel->overwrites;
foreach ($overrides as $override) {
 $allow = new \Discord\Parts\Permissions\ChannelPermission;
 $allow->perms = $override->allow;
if ($allow->perms->manage_server == true)
{
	$canWork="True";
}
 $deny = new \Discord\Parts\Permissions\ChannelPermission;
 $deny->perms = $override->deny;
 }


if($d['commands']['serverinfo'] == "1")
{
$msg=str_replace($pref."serverinfo ", "", strtolower($message->content));


    $guild = $discord->guilds->get('name', $message->full_channel->guild->name);
    $member_count = $guild->members->count();


$serv_loc=$guild->region;
$owner_id=$guild->owner_id;
$serv_id=$guild->id;
$serv_icon=$guild->icon;
$serv_time=strtotime($guild->joined_at);

	$past_time = $serv_time;
	$current_time = time();
	$diff = $current_time - $past_time;
	$days = floor($diff/(24*60*60));
	$remainder = $diff - $days*(24*60*60);
	$hours = floor($remainder/3600);
	$remainder = $remainder - ($hours*60*60);
	$minutes = floor($remainder/60);
	$seconds = $remainder-$minutes*60;
	echo 'days='.$days. ' hours='.$hours. ' minutes='.$minutes . ' seconds = '.$seconds;




 foreach ( $guild->features as $f )
{
$serv_afk=f['afk_channel_id'];
}
if($serv_afk == "")
{
	$serv_afk = "None";
}



$roles = "";
$rcnt=1;


foreach ( $guild->roles as $role )
{
if($role->name == "@everyone")
{
$roles .= " [".$rcnt."] => " . str_replace("@", "", $role->name) . "\n";
}
else
{
$roles .= " [".$rcnt."] => " . $role->name . "\n";
}
	$rcnt=$rcnt+1;
}


foreach ( $guild->members as $col)
{
if($col->status == "online")
	{
		$online_count = $online_count + 1;
	}
}

if($canWork == "True") // check if you're admin in this server.
{
$members = $guild->members; // Returns a collection of members
$theowner = $members->get('id', $owner_id);
$serv_owner = $theowner->username;
}
else
{
$user = \Discord\Parts\User\User::find($owner_id);
$theowner = $user->username;
$serv_owner = $theowner;	
}


$code1 = "```fix" . "\n";
$code1 .= $message->full_channel->guild->name . "\n" . "Owner: " . $serv_owner . "\n" . "Location: " . $serv_loc;
$code1 .= "``` \n";

// $guild = $discord->guilds->get('name', $message->full_channel->guild->name);


$code2 = "```csharp" . "\n";
$code2 .= "Server ID: " . $serv_id . "\n" . "Owner ID: " . $owner_id;
$code2 .= "``` \n";

echo var_dump($theowner->roles);

// echo var_dump($theowner);

$new_icon=str_replace("http://discordapp.com/", "", $serv_icon);
$new_icon=str_replace("discordapp.com/", "", $new_icon);
$newicon = explode("/", $new_icon);
$newicon = "/" . $newicon[3] . "/" . $newicon[4];


try
{
$message->channel->sendMessage($code1 . $code2 . "```Created: ".$days." Days ".$hours." Hours ".$minutes ." Minutes ".$seconds." Seconds Ago" . "\n" . "Server Icon: " . $newicon."\n" . "AFK Channel: " . $serv_afk . "\n" . "Members: " . $member_count . " (" . $online_count . " Online!)" . "\n" . "Server Roles: \n" . $roles . "```"); 
} catch (PartRequestFailedException $e) {
}



// echo var_dump($message);
}
else
{
echo "This command is disabled. \n";
}

} // server command only.
?>