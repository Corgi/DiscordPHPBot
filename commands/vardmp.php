
<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];

if($pref == "")
{
$pref=$thepref;
}


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
	echo 'days='.$days. ' hours='.$hours. ' minutes='.$minutes . ' seconds = '.$seconds . PHP_EOL;

$convert = 'days='.$days. ' hours='.$hours. ' minutes='.$minutes . ' seconds = '.$seconds;

if($message->author->username == $d['settings']['owner'])
{


if($d['commands']['vardmp'] == "1")
{
$msg=str_replace($pref."vardmp ", "", $message->content);


$guild = $discord->guilds->get('name', $message->full_channel->guild->name);

$manage = $guild->permission_overwrites->manage_messages;

$user = \Discord\Parts\User\User::find('Paradox');
$user = $user->username;

echo "####" . $user . PHP_EOL;



$members = $guild->members; // Returns a collection of members
$members = $members->get('id', $discord->user->id);
$channel = $guild->channels->get('id', $message->channel_id);
// $roles = $guild->roles;
// $data = $roles->items->asArray();
// $bio = $data['items'];

$overwrites=$guild->overwrites;
$overrides = $channel->overwrites;
// $over=$guild->overwrites->getAll('type', 'role') . "TEST"; 

$test=$guild->roles->overwrites;


foreach ($overrides as $override) {
 $allow = new \Discord\Parts\Permissions\ChannelPermission;
 $allow->perms = $override->allow;

// echo "### ALLOW PERMS: " . $allow->perms . PHP_EOL;
 $deny = new \Discord\Parts\Permissions\ChannelPermission;
 $deny->perms = $override->deny;
 // echo "\n### DENY PERMS: " . $deny->perms . PHP_EOL;
 }
if ($allow->perms->send_messages == true)
{

//	echo "### I CAN SEND MESSAGES HERE!!! \n";

}
$p=0;


	$result = @eval("echo $msg;" . "; return true;");
//	echo "### EVAL CODE BELOW!!! \n " . $result . PHP_EOL;

	if($result == true)
	{
	  ob_start();                    // start buffer capture
  $tear=eval("echo $msg;");           // dump the values
	var_dump($tear);
    $contents = ob_get_contents(); // put the buffer into a variable
    ob_end_clean();  
$contents = str_replace("NULL", "", $contents);
}
else
{
	$contents = "There was a parse error.";
}

	// $thedmp=file_get_contents($filestamp);
	$thecode = "```csharp" . "\n";
	$thecode .= $contents . "\n";
	$thecode .= "```";

if(strlen($contents) < 2000)
{

	$global->sendMessage($thecode); 
}
else
{
	$global->sendMessage("This object was too large. *Exceeded 2,000 Characters.*"); 	
}
/*
	  ob_start();                    // start buffer capture
	var_dump($members);
    $contents2 = ob_get_contents(); // put the buffer into a variable
    ob_end_clean(); 

 error_log($contents2, 3, "VAR_DUMP_DATA-NEW-".time().".log");
*/



//	echo "##### COMMAND TRIGGERED! ";


// echo var_dump($message);
}
else
{
echo "### This Command is disabled !!! \n";
}


} // end of owner check
?>


