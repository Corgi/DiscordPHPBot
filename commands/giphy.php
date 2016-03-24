<?php
use Discord\Exceptions\PartRequestFailedException;
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
if($pref == "")
{
$pref=$thepref;
}

if($d['commands']['giphy'] == "1")
{
$msg=str_replace($pref."giphy ", "", $message->content);
$msg=str_replace(" ", "+", $msg);

 $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://api.giphy.com/v1/gifs/random?api_key=YOURAPIKEYHERE&tag=' . $msg);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
	$json = json_decode($data);
	
	// $message->channel->sendMessage($json->data->images->fixed_height->url); 

	try
	{
	$global->sendMessage($json->data->image_original_url);
	} catch (PartRequestFailedException $e) {
$req="```ruby"."\n";
$guild = $discord->guilds->get('name', $d['settings']['server']);
$channel = $guild->channels->get('name', "error_reports"); // you can change 'name' to any other attribute if you want
$channel->sendMessage("`Automatic Error Report:` Someone ran into an error!\n ".$req."User: " . $message->author->username . " Guild: ".$message->full_channel->guild->name."\nFile: giphy.php\nError Message:\n".$e->getMessage()."```");
} // end of try

	}
	else
	{
	echo "This command is disabled. \n";
	}
	?>
