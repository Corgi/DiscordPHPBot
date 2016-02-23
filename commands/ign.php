<?php

$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

if($d['apis']['mashape'] != "")
{

if($d['commands']['ign'] == "1")
{
$msg=str_replace($pref."ign ", "", $message->content);
$msg=str_replace(" ", "+", $msg);

$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"X-Mashape-Key: ".$d['apis']['mashape']               
  )
);
$context = stream_context_create($opts);
// These code snippets use an open-source library. http://unirest.io/php
$res = file_get_contents("https://ahmedakhan-game-review-information-v1.p.mashape.com/api/v1/information?game_name=" . $msg, false, $context);
$json = json_decode($res);

 $rdate=$json->result->rlsdate;
 $score=$json->result->ign->userScore;
 $name=$json->result->name;
 $url=$json->result->ign->url;
 
 if($name != "")
 {
$message->channel->sendMessage("**" . $name . "**: \n ```User Rating: " . $score . " \n Release Date: " . $rdate ."``` \n".$url); 
 }
 else
 {
 $message->channel->sendMessage("Sorry, I can't find that game right now..");
 }
 
}
else
{
$message->reply("This command is disabled.");
}
}
else
{
echo "### You need to setup a Mashape API Key. Some commands won't work! \n";
}
 ?>