<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
if($pref == "")
{
$pref=$thepref;
}

if($d['commands']['shutdown'] == "1")
{

if($message->author->id == $d['settings']['owner'])
{
$global->sendMessage(":exclamation: Shutting Down. Thanks for having me :v:");
die;
}
else
{
$global->sendMessage(":exclamation: Only the Bot Owner: **".$d['settings']['owner']."** can shut me down.");
} // end of bot owner check

}
else
{
echo "This command is disabled. \n";
} // end of cmd enabled or disabled chk.