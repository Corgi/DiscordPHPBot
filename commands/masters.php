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

$totalMasters=0;



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
	$ma = "";
}

if($ma != "")
{
$dfk="I can identify `".$ma."` masters in ".$message->full_channel->guild->name;
}
else
{
$dfk="";
}


foreach ($masters as $section)
{
		foreach($section as $key => $val)
		{
			if($val == 1)
				{
					$totalMasters=$totalMasters+1;
				}
		}
} // check if it's the right guild


$global->sendMessage("I currently have `".$totalMasters."` Masters. ".$dfk);


