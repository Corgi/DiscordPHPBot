<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

if($d['commands']['shorturl'] == "1")
{

$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
); 

if($d['apis']['bitly'] != "")
{
$msg=str_replace($pref."shorturl ", "", $message->content);
  $json_string = file_get_contents("https://api-ssl.bitly.com/v3/shorten?access_token=".$d['apis']['bitly']."&login=proxikal@gmail.com:Joshua(1)&longUrl=".$msg, false, stream_context_create($arrContextOptions));
  $json = json_decode($json_string);
  $error = $json->{'status_txt'};
  if($json->{'status_code'} == "200")
  {
  $newurl=$json->{'data'}->{'url'};
  
  $message->reply("**Bitly URL Created:** " . $newurl); 
  }
  else
  {
  // send message that it failed
  $dar="";
  if($error = "INVALID_LOGIN")
  {
  $dar="Make sure you're adding `&login=username:password` parameter in **commands/shorturl.php** *on line: 15*"; 
  }
  $message->reply("**Error Status:** `" . $error . "`" . $dar); 
  }
  
  }
  else
  {
  $message->reply(":red_circle: **Error! ** \n ```You need to setup a bit.ly OAUTH key @ http://bit.ly \n open config.ini in the Paradox directory \n place OAUTH key under [apis] bitly = YORUOAUTH```"); 
  }
  }
  else
  {
  $message->reply("This command is disabled.");
  }
  
  
  ?>