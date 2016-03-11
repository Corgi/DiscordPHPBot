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
$ma=0;
 $masters  = parse_ini_string(file_get_contents( 'inis/masters.ini' ), true);

$tc=0;
$tm=0;
$tcm=0;
$cnt=0;

	$past_time = $d['settings']['uptime'];
	$current_time = time();
	$diff = $current_time - $past_time;
	$days = floor($diff/(24*60*60));
	$remainder = $diff - $days*(24*60*60);
	$hours = floor($remainder/3600);
	$remainder = $remainder - ($hours*60*60);
	$minutes = floor($remainder/60);
	$seconds = $remainder-$minutes*60;
//	echo 'days='.$days. '  hours='.$hours. '   minutes='.$minutes . '   seconds = '.$seconds;

$cnt=0;

if($message->full_channel->guild->name != "")
{

foreach($dD[$message->full_channel->guild->id] as $mas=>$val)
{
if($val == 1)
{
$ma=$ma+1;
}
}

}
else
{
	$ma = "[Available in Server only]";
}

// if($ma > 2)
// {
// 	$ma = $ma - 2;
// }

$tm=0;
foreach ($masters as $section)
{
$guild_name=$section['Name'];

	$tc = $tc + 1;
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




foreach ($masters as $section)
{
		foreach($section as $key => $val)
		{
			if($val == 1)
				{
					$tm=$tm+1;
				}
		}
} // check if it's the right guild




foreach( $d['commands'] as $key=>$data )
{
$tcm = $tcm + 1;
}


if($days > 0)
{
$days1 = $days . " Days ";
}
if($hours > 0)
{
$hours1 = $hours . " Hours ";
}
if($minutes > 0)
{
$minutes1 = $minutes . " Minutes ";
}


$uptime=$days1 . $hours1 . $minutes1 . $seconds . " Seconds.";
$server_pref="";

$cmdsRun=number_format($d['settings']['cmdsRun']);
$owner=$d['settings']['owner'];
$tcm=number_format($tcm);
$cnt=number_format($cnt);

$result="```fix"."\n";

if($d['commands']['info'] == "1")
{
	if($p[$message->full_channel->guild->id]['Prefix'] == "")
		{
			$server_pref="Available Prefixes: ". $example;
		}
		else
		{
			$server_pref="Server Prefix: " . $p[$message->full_channel->guild->id]['Prefix'];
		}
try {
$global->sendMessage(":boom: **My Information**: \n ".$result."\n Author: Proxy \n Library: teamreflex\DiscordPHP \n Uptime: ".$uptime." \n Total Servers: ".$tc." \n ".$server_pref." \n Total Commands: ".$tcm." \n Commands Run: ".$cmdsRun." \n Total Masters: ".$tm." \n Master in ".$message->full_channel->guild->name.": ".$ma." \n Total Members: " . $cnt . " (Online: " . $online_count . "  //  Offline: " . $offline_count . ")```");
			} catch (PartRequestFailedException $e) {
//		echo "## something happened " . $e->getMessage().PHP_EOL;
				// continue;
			}
			
}
else
{

echo "This command is disabled. \n";
}
?>