<?php

    $greetmsg="";
    $found=0;
$isguild=$data->guild_id;
 // $masters  = parse_ini_string(file_get_contents( 'inis/masters.ini' ), true);
$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');
if($dD[$isguild]['GreetMsg'] != "")
{
    $guild = $discord->guilds->get('id', $data->guild_id);

    if(isset($guild))
    {


    $new_member = $data->user;
    $newguild=$data->guild_id;
    $guild_name=$guild->name;

    $res="The Message didn't work";
    $r=0;
// echo "NEW USER: " . $new_member->username . " GUILD: " . $guild->name.PHP_EOL;
// $channel = $guild->channels->getAll('type', 'text')->first();
$greetchannel=$dD[$newguild]['GreetChannel'];


$channel = $guild->channels->get('name', $greetchannel);
if(!isset($channel))
{
$channel = $guild->channels->getAll('type', 'text')->first();
}

$greetmsg = $dD[$newguild]['GreetMsg'];
$greetmsg=str_replace("{user}", $new_member->username, $greetmsg);
$greetmsg=str_replace("{guild}", $guild->name, $greetmsg);

try
{
$channel->sendMessage($greetmsg);
} catch (DiscordRequestFailedException $e) { 
 $user = \Discord\Parts\User\User::find($guild->owner_id);
 $user->sendMessage("You have me setup to greet people. yet my permissions won't allow me to talk in your server. If you want me to work, fix this.");
}


} // check if guild isset
}
