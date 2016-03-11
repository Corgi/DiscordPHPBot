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

if($d['settings']['owner'] == $message->author->username)
{

if($d['commands']['delreport'] == "1")
{
$msg=str_replace($pref."delreport ", "", $message->content);
unset($ini->data['report'][$msg]);
$ini->write('config.ini');
$global->sendMessage("Deleted report: `" . $msg . "`");
}
else
{
echo "This command is disabled. \n";
}

} // end of owner check

?>