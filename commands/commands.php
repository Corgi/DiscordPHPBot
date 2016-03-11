<?php
use Discord\Exceptions\PartRequestFailedException;

$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
$main_server=$d['settings']['server'];
$iniD = new INI('inis/masters.ini');
$dD = $ini->read('inis/masters.ini');
$opt_user=$message->author->username;
$opt_server=$message->full_channel->guild->name;
if($pref == "")
{
$pref=$thepref;
}



if($d['commands']['commands'] == "1")
{
// $msg=str_replace("#allowlinks ", "", $message->content);
// unset($ini->data['linkProtect'][$message->full_channel->guild->name]);
// $ini->write('config.ini');
$owner = "```fix"."\n";




//	if($message->full_channel->guild->name != $main_server)
//	{
 $user = \Discord\Parts\User\User::find($message->author->id);
$global->sendMessage("Show a list of all your commands here!");



//	}
//	else
//	{
// $message->channel->sendMessage(":exclamation:Here's my **master** commands! \n ```---------------------------------------------- \n ".$pref."restart       ;; Restarts Paradox bot.  \n ".$pref."log [msg]            ;; adds log to bot_log channel  \n ".$pref."logserver [server]   ;; sets a server for the bot log.  \n ".$pref."logchannel [channel] ;; sets a log channel.  \n ".$pref."purge [number]       ;; removes msgs from chat  \n ".$pref."kick [user]          ;; kicks someone from server.  \n ".$pref."addmaster [user]     ;; makes user my master.  \n ".$pref."delmaster [user]     ;; remove user from master.  \n ".$pref."mkchan [name] [type] ;; creates channel. type=text or voice.  \n ".$pref."grantchannel         ;; turns bot on in channel.  \n ".$pref."stopchannel          ;; stops bot on channel.  \n ".$pref."allowlinks           ;; Allows links on your server  \n ".$pref."denylinks            ;; prevents links on server. \n ".$pref."enable               ;; enables a command: ".$pref."enable shorturl. \n ".$pref."disable              ;; disables a command: ".$pref."disable mimic. \n ".$pref."showrules            ;; Shows rules for Paradox Lounge. \n----------------------------------------------\n```");
// $message->channel->sendMessage(":negative_squared_cross_mark:Here's my user commands! \n ```---------------------------------------------- \n ".$pref."info                      ;; posts bot information. \n ".$pref."mimic [text]              ;; mimics last message \n ".$pref."afk [text]                ;; sets an away message \n ".$pref."back                      ;; stops away message \n ".$pref."status [text]             ;; changes the bots status \n ".$pref."giphy <keyword>           ;; posts random giphy img. \n ".$pref."sticker <keyword>         ;; posts randomy sticker. \n ".$pref."reportuser [user] [msg]   ;; report user with msg. \n @Paradox what's my role?   ;; Shows if user is my master. \n ".$pref."weather                   ;; ".$pref."weather [zipcode]. \n ".$pref."shorturl [url]            ;; creates bit.ly link \n ".$pref."pirate                    ;; ".$pref."pirate New Girl S01E02 \n ".$pref."rolecolor #HEX Role Name  ;; ex: ".$pref." #ff0000 server bots \n #topic [text]              ;; changes channes topic. \n----------------------------------------------\n           Type: @Paradox what's your prefix?   ;; displays the bots prefix. ```");
//	}





}
else
{
echo "Command is Disabled!! \n";
}
?>