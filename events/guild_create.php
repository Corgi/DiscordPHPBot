<?php


    echo "Joined {$guild->name}\r\n";


        $newguild=$guild->name;
        $newid=$guild->id;
        $master=$_SESSION['master'];
        $_SESSION['guildid'] = $newid;


if($_SESSION['master'] == "Carbon")
{
    echo "Invited by Carbon: ".PHP_EOL;

      $owner_id=$guild->owner_id;
        $new_owner = \Discord\Parts\User\User::find($owner_id);
         $new_owner = $new_owner->username;
         $guild_owner=$guild->owner_id;

    $didwork = 1;

$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');

$iniD->data[$newid]['Name'] = $newguild;
$iniD->data[$newid]['Links'] = "False";
$iniD->data[$newid]['Master'] = $new_owner;
$iniD->data[$newid][$owner_id] = 1;
$iniD->write('inis/masters.ini');

$iniP->data[$newid]['Prefix'] = "--";
$iniP->write('inis/Prefix.ini');


try{
$guild = $discord->guilds->get('name', $d['settings']['server']);
if(isset($guild))
{

// ### You can have the bot
$channel = $guild->channels->getAll('type', "text")->first(); // you can change 'name' to any other attribute if you want
$channel->sendMessage($newguild." Has called me to duty!"); // will return a Message object

} // check if guild exists.

    } catch (PartRequestFailedException $e) {
    } // end of try





}
else
{

    if($didwork == 0)
    {
         $guild_owner=$guild->owner_id;
         $server_owner = \Discord\Parts\User\User::find($guild_owner);


echo "Invited by: " . $master.PHP_EOL;

$guild = $discord->guilds->get('id', $newid);
$members = $guild->members; // Returns a collection of members
 $get_id=$members->get('username', $master);
$owner_id=$get_id->id;


    //  $new_owner = \Discord\Parts\User\User::find($master);
     //  $owner_id=$new_owner->id;

if($guild_owner != $owner_id)
{

// $server_owner->sendMessage("Hello! It seems `".$master."` has invited me to your server. I wanted to alert you incase i'm not allowed here!\nYou can type `#commands` or `#help [cmd name]` For all my information.");

} // check if the guild owner invited me, if not send him a message alerting him who invited him.

if($owner_id == "")
{
$owner_id=$_SESSION['non_Carbon'];
}


$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');


$iniD->data[$newid]['Name'] = $newguild;
$iniD->data[$newid]['Links'] = "False";
$iniD->data[$newid]['Master'] = $master;
$iniD->data[$newid][$owner_id] = 1;
$iniD->write('inis/masters.ini');

$iniP->data[$newid]['Prefix'] = "--";
$iniP->write('inis/Prefix.ini');




try{
$guild = $discord->guilds->get('name', "Paradox Lounge");
if(isset($guild))
{

$channel = $guild->channels->get('name', "general"); // you can change 'name' to any other attribute if you want
$channel->sendMessage($newguild." Has called me to duty!"); // will return a Message object

} // check if guild exists.

    } catch (PartRequestFailedException $e) {
    } // end of try





}

} // end of carbon check, if they were invited by carbonite..we need to put the owner_id as master



