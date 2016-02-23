<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];
if($d['commands']['giphy'] == "1")
{
$msg=str_replace($pref."giphy ", "", $message->content);
$msg=str_replace(" ", "+", $msg);

 $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://api.giphy.com/v1/gifs/random?api_key=dc6zaTOxFJmzC&tag=' . $msg);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
	$json = json_decode($data);
	
	// $message->channel->sendMessage($json->data->images->fixed_height->url); 
	$message->channel->sendMessage($json->data->image_original_url);
	}
	else
	{
	$message->reply("This command is disabled.");
	}
	?>