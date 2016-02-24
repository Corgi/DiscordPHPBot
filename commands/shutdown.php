<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

if($d['commands']['shutdown'] == "1")
{

if($message->author->username == $d['settings']['owner'])
{
$message->channel->sendMessage(":exclamation: Shutting Down. Thanks for having me :v:");
die;
}
else
{
$message->channel->sendMessage(":exclamation: Only the Bot Owner: **".$d['settings']['owner']."** can shut me down.");
} // end of bot owner check

}
else
{
$message->reply("This command is disabled.");
} // end of cmd enabled or disabled chk.