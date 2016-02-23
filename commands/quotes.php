<?php

$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

if($d['apis']['mashape'] != "")
{

if($d['commands']['quotes'] == "1")
{

$msg=str_replace($pref."quotes ", "", $message->content);

if(($msg == "movies") || ($msg == "famous"))
{
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"X-Mashape-Key: ".$d['apis']['mashape']               
  )
);
$context = stream_context_create($opts);
// These code snippets use an open-source library. http://unirest.io/php
$res = file_get_contents("https://andruxnet-random-famous-quotes.p.mashape.com/?cat=famous", false, $context);
$json = json_decode($res);

 $arg1=$json->quote;
 $arg2=$json->author;
 
//  echo "ID: " . $arg1 . "<br>Title: " . $arg2; 
 
 // echo "<BR><BR>------VARDUMP------<BR>";
//  echo var_dump($json);
$dn = $msg;

 if($msg == "movies") { $dn == "Movie"; }
  if($msg == "famous") { $dn == "Famous"; }
$message->channel->sendMessage($dn . " Quote: \n ```" . $arg1 . "``` *By: ".$arg2."*"); 
}
else
{
$message->reply("**Example usage:** `#quotes movies` *;; to get movie quotes* \n `#quotes famous` *;; to get famous quotes.* ");
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