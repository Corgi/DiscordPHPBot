Created using DiscordPHP from team-reflex
======

https://github.com/teamreflex/DiscordPHP<br>
Changes log
------
Fixed AFK bot not responding when user mention string position = 1<br>
However I've not completed the fix for the non-mention trigger at position 1<br>
added **cacert.pem** and a fix below for *cURL error 60: SSL Certification error*<br>
to install:
------
Download the Bot Zip file & Place in a folder<br>
Download composer from: https://getcomposer.org/download/<br>
**Direct setup: https://getcomposer.org/Composer-Setup.exe** <Br>
after you install, open command prompt from the bots DIR, run command: *composer install*<br>
**expect some errors using this method**<br><br>
open **config.ini** fill in your email and password and put your discord name in the owner section.<br>
<br>
under *[channels]* add: Your channel name = 1<br>
example if your server name is: Richmond Bakery Do this: <br>
**[channels]** <br>
**Richmond Bakery = 1** <br>
save, and open **StartBot.bat**. If you have any issues Join Paradox Lounge Discord Chat<br>
https://discord.gg/0pTKzt2BDIoA9uix<br><br>
Known Issues & Fixes
------
Getting a Guzzle error msg **cURL error 60** *SSL Certification*<br>
**FIX:** Download the cacert.pem file from above, place somewhere safe.<br>
Open your php.ini file and place this line somewhere:<br>
**curl.cainfo = "(cacert.pem directory here)\cacert.pem"**<br>
