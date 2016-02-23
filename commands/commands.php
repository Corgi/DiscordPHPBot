<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

if($d['commands']['commands'] == "1")
{
// $msg=str_replace("#allowlinks ", "", $message->content);
// unset($ini->data['linkProtect'][$message->full_channel->guild->name]);
// $ini->write('config.ini');
$message->channel->sendMessage(":exclamation:Here's my **master** commands! \n ```---------------------------------------------- \n ".$pref."restart              ;; Restarts Paradox bot.  \n ".$pref."log [msg]            ;; adds log to bot_log channel  \n ".$pref."logserver [server]   ;; sets a server for the bot log.  \n ".$pref."logchannel [channel] ;; sets a log channel.  \n ".$pref."purge [number]       ;; removes msgs from chat  \n ".$pref."kick [user]          ;; kicks someone from server.  \n ".$pref."addmaster [user]     ;; makes user my master.  \n ".$pref."delmaster [user]     ;; remove user from master.  \n ".$pref."mkchan [name] [type] ;; creates channel. type=text or voice.  \n ".$pref."grantchannel         ;; turns bot on in channel.  \n ".$pref."stopchannel          ;; stops bot on channel.  \n ".$pref."allowlinks           ;; Allows links on your server  \n ".$pref."denylinks            ;; prevents links on server. \n #enable               ;; enables a command: #enable shorturl. \n #disable              ;; disables a command: #disable mimic. \n----------------------------------------------\n```");
$message->channel->sendMessage(":negative_squared_cross_mark:Here's my user commands! \n ```---------------------------------------------- \n ".$pref."info                      ;; posts bot information. \n ".$pref."mimic [text]              ;; mimics last message \n ".$pref."afk [text]                ;; sets an away message \n ".$pref."back                      ;; stops away message \n ".$pref."status [text]             ;; changes the bots status \n ".$pref."giphy <keyword>           ;; posts random giphy img. \n ".$pref."sticker <keyword>         ;; posts randomy sticker. \n ".$pref."reportuser [user] [msg]   ;; report user with msg. \n @Paradox what's my role?   ;; Shows if user is my master. \n ".$pref."weather                   ;; ".$pref."weather [zipcode]. \n ".$pref."shorturl [url]            ;; creates bit.ly link ".$pref."shorturl <link> #pirate                    ;; #pirate New Girl S01E02 \n----------------------------------------------\n                   More commands coming soon!```");
}
else
{
$message->reply("This command is disabled.");
}
?>