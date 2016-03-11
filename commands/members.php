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

$cnt=0;
$online_count=0;
$offline_count=0;


foreach ($masters as $section)
{
$guild_name=$section['Name'];
    $guild = $discord->guilds->get('name', $guild_name);
if(isset($guild))
{
foreach ( $guild->members as $col)
{
if($col->status == "online")
	{
		$online_count = $online_count + 1;
		$cnt=$cnt+1;

	}
	else
	{
$cnt=$cnt+1;
$offline_count = $offline_count+1;

	}
} // end of isset, trying to stop that error

} // end of foreach section
}



$global->sendMessage("I have `".$cnt."` total members. There's `".$online_count."` online and `".$offline_count."` offline.");



