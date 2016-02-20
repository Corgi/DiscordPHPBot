<?php
if($specdat == "what's my role?")
{
foreach( $datas['owners'] as $key=>$data )
{
if(($message->author->username == $key) && ($data == 1))
{
$am = $am + 1;
}
}

if($am > 0)
{
$message->reply("You're set to **master role**, You are allowed to post links & use my master commands." . $msg); 
}
else
{
$message->reply("You're not set as one of my masters. **Link restriction is on.**" . $msg); 
}
}

?>