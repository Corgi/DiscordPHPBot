<?php

if(($rawdat == "setprefix") && ($ad > 0)) { include 'commands/setprefix.php'; } // sets the command prefix. Default is #
if(($rawdat == "restart") && ($ad > 0)) { include 'commands/restart.php'; } // Restarts the bot.
if($rawdat == "mimic") { include 'commands/mimic.php'; } // returns the text you've typed.
if($rawdat == "afk") { include 'commands/afk.php'; } // adds an afk message, if someone mentions you it will reply for you.
if($rawdat == "back") { include 'commands/back.php'; } // deletes your afk message.
if($rawdat == "commands") { include 'commands/commands.php'; } // Shows a list of commands
if($rawdat == "status") { include 'commands/status.php'; } // changes Paradox bot status
if($rawdat == "getstatus") { include 'commands/getstatus.php'; } // gets user status
if($rawdat == "getid") { include 'commands/getid.php'; } // gets user id
if($rawdat == "getavatar") { include 'commands/getavatar.php'; } // gets user avatar.
if(($rawdat == "purge") && ($ad > 0)) { include 'commands/purge.php'; } // deletes x amount of messages from channel.
if($rawdat == "info") { include 'commands/info.php'; } // displays bot information
if(($rawdat == "kick") && ($ad > 0)) { include 'commands/kick.php'; } // kicks a user from server.
if(($rawdat == "addmaster") && ($ad > 0)) { include 'commands/addmaster.php'; } // adds a user to my masters list.
if(($rawdat == "delmaster") && ($ad > 0)) { include 'commands/delmaster.php'; } // removes a user from my masters list.
if($rawdat == "role") { include 'commands/role.php'; } // This command is still in the making.
if(($rawdat == "mkchan") && ($ad > 0)) { include 'commands/mkchan.php'; } // Creates channel in server.
if(($rawdat == "grantchannel") && ($ad > 0)) { include 'commands/grantchannel.php'; } // Allows the bot to moderate on your channel
if(($rawdat == "stopchannel") && ($ad > 0)) { include 'commands/stopchannel.php'; } // Stops the bot from moderating on channel.
if(($rawdat == "allowlinks") && ($ad > 0)) { include 'commands/allowlinks.php'; } // Allows links on server
if(($rawdat == "denylinks") && ($ad > 0)) { include 'commands/denylinks.php'; } // Removes links on server unless the user is on my masters list.
if(($rawdat == "log") && ($ad > 0)) { include 'commands/log.php'; } // posts a log into the bot_log channel.
if(($rawdat == "logserver") && ($ad > 0)) { include 'commands/logserver.php'; } // sets a server for your bot log.
if(($rawdat == "logchannel") && ($ad > 0)) { include 'commands/logchannel.php'; } // sets a channel for your bot log.
if($rawdat == "reportuser") { include 'commands/reportuser.php'; } // reports a user.
if($rawdat == "listreports") { include 'commands/listreports.php'; } // lists reported users.
if($rawdat == "delreport") { include 'commands/delreport.php'; } // deletes a report on a user usage: #delreport <username>
if($rawdat == "mute") { include 'commands/mute.php'; } // deletes user's text in chat. #mute <user>
if($rawdat == "unmute") { include 'commands/unmute.php'; } // deletes a report on a user usage: #delreport <username>
if($rawdat == "giphy") { include 'commands/giphy.php'; } // posts a random giphy img #giphy <keyword>
if($rawdat == "sticker") { include 'commands/sticker.php'; } // posts a random giphy sticker #sticker <keyword>
if($rawdat == "weather") { include 'commands/weather.php'; } // get's the weather from a zip code #weather <ZIPCODE> or <CITYNAME>
if($rawdat == "shorturl") { include 'commands/shorturl.php'; } // uses bit.ly #shorturl <url> you have to setup a OAUTH key from bit.ly then place in config.ini under [apis].
if($rawdat == "quotes") { include 'commands/quotes.php'; } // returns a random famous quote #quotes
if(($rawdat == "enable") && ($ad > 0)) { include 'commands/enable.php'; } // enable a command: #enable restart, #enable shorturl etc..
if(($rawdat == "disable") && ($ad > 0)) { include 'commands/disable.php'; } // disable a command: #disable restart, #disable shorturl etc..
if($rawdat == "ign") { include 'commands/ign.php'; } // gets a game from ign: #ign Call of duty Black ops.
if($rawdat == "youtubemp3") { include 'commands/youtubemp3.php'; } // gets a MP3 download link for youtube video. example: #youtubemp3 <id>
if($rawdat == "pirate") { include 'commands/pirate.php'; } // gets a vide from alluc.to: #pirate New Girl S02E03
if($rawdat == "chkupdate") { include 'commands/chkupdate.php'; } // Checks if the bot is up to date or not.
if(($rawdat == "shutdown") && ($ad > 0)) { include 'commands/shutdown.php'; } // Shuts the bot down. Only the Bot Owner can use this.



?>