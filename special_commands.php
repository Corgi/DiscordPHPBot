<?php
if(isset($specdat))  // this is using the special command param @Paradox instead of #cmd
{

    try
    {

 if(strtolower($specdat) == "give me sudo")
{
include 'commands/openaccess.php'; // @Paradox what's my role? returns if the user is my master or not.
}
if(strtolower($specdat) == "will you have my baby?")
{
	$message->channel->sendMessage("*plants seed in ".$message->author->username . "*");
}


if(strtolower($specdat) == "what's my role?")
{
include 'commands/whatsmyrole.php'; // @Paradox what's my role? returns if the user is my master or not.
}
if(strtolower($specdat) == "what's your prefix?")
{
include 'commands/whatsyourprefix.php'; // @Paradox what's your prefix returns my prefix on their server.
}
if(strtolower($specdat) == "who invited you?")
{
include 'commands/whoinvitedyou.php'; // @Paradox what's your prefix returns my prefix on their server.
}
if(strtolower($specdat) == "respect this server")
{
include 'commands/respectthisserver.php'; // @Paradox what's your prefix returns my prefix on their server.
}
if(strtolower($specdat) == "disrespect this server")
{
include 'commands/disrespectthisserver.php'; // @Paradox what's your prefix returns my prefix on their server.
}

/*
if(strtolower($specdat) == "debug")
{
include 'commands/debug.php'; // @Paradox what's your prefix returns my prefix on their server.
}
*/


} catch (\Discord\Exceptions\DiscordRequestFailedException $e) {
    echo "Can't send message\r\n";
    $user1_id=$message->author->id;
$user = \Discord\Parts\User\User::find($user1_id);
$user->sendMessage("It appears i don't have permissions on your server. if you want Paradox to react in your server, he needs to be able to send messages.");

}




} // end of @Paradox commands
