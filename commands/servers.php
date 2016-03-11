<?php
use Discord\Exceptions\PartRequestFailedException;

$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniD = new INI('inis/masters.ini');
$dD = $ini->read('inis/masters.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
if($pref == "")
{
$pref=$thepref;
}

 $masters  = parse_ini_string(file_get_contents( 'inis/masters.ini' ), true);

$totalServers=0;



foreach ($masters as $section)
{
$guild_name=$section['Name'];

    $guild = $discord->guilds->get('name', $guild_name);
if(isset($guild))
{
$totalServers = $totalServers + 1;

} // end of foreach section
}

$global->sendMessage("I'm currently on `".$totalServers."` Servers.");

