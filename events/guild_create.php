<?php


    echo "Joined {$guild->name}\r\n";

      $master=$guild->owner_id;
      $user = \Discord\Parts\User\User::find($master);
      $username=$user->username;

        $newguild=$guild->name;
        $newid=$guild->id;
        $_SESSION['guildid'] = $newid;


/*
// USE THIS SECTION IF YOU WANT YOUR BOT TO ALERT YOUR SERVER WHEN HE JOINS!
// MAKE SURE TO USE YOUR SERVER NAME AND CHANNEL NAME!
try{
$guild = $discord->guilds->get('name', "Paradox Lounge");
if(isset($guild))
{

$channel = $guild->channels->get('name', "general"); // you can change 'name' to any other attribute if you want
$channel->sendMessage($newguild." Has called me to duty!"); // will return a Message object

} // check if guild exists.

    } catch (PartRequestFailedException $e) {
    } // end of try
*/
    


    $didwork = 1;

$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');

$iniD->data[$newid]['Name'] = $newguild;
$iniD->data[$newid]['Links'] = "False";
$iniD->data[$newid]['Master'] = $username;
$iniD->data[$newid][$master] = 1;
$iniD->write('inis/masters.ini');

$iniP->data[$newid]['Prefix'] = "--";
$iniP->write('inis/Prefix.ini');
