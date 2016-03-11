<?php
use Discord\Exceptions\PartRequestFailedException;

$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');

if($specdat == "what's my role?")
{

if($dD[$message->full_channel->guild->id][$message->author->id] == "1")
{
$am = $am + 1;
}
}

if($am > 0)
{

	try
	{
$message->reply("You're my **master** on `".$message->full_channel->guild->name."`"); 
} catch (PartRequestFailedException $e) {
}

}
else
{

	try
	{
$message->reply("You're not set as one of my masters on `".$message->full_channel->guild->name."`"); 
} catch (PartRequestFailedException $e) {
}


}


?>