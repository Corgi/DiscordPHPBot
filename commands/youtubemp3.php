<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

if($d['commands']['getyoutube'] == "1")
{
$msg=str_replace($pref."getyoutube ", "", $message->content);
$link="http://www.youtube.com/watch?v=" . $msg;
if(strpos($msg, ".com") > 0)
{
$message->channel->sendMessage("Something happened, make sure to only put the youtube ID \n Example: `#getyoutube i62Zjga8JOM`");
}
else
{
$res = file_get_contents("http://www.youtubeinmp3.com/fetch/?format=JSON&video=".$link);
$json = json_decode($res);

 $title=$json->title;
 $link=$json->link;
 
$message->channel->sendMessage("*".$title."* Download link: \n ".$link); 
// echo var_dump($message);
} // end the .com check
}
else
{
$message->reply("This command is disabled.");
}
?>