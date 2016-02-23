<?php
if($d['commands']['info'] == "1")
{
$message->channel->sendMessage(":boom: **Paradox Bot** \n ``` Created By: Proxy \n Framework: DiscordPHP \n Version 0.0.5b ``` \n https://github.com/teamreflex/DiscordPHP");
}
else
{

$message->reply("This command is disabled.");
}
?>