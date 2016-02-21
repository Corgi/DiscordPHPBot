Created using DiscordPHP from team-reflex
======

https://github.com/teamreflex/DiscordPHP<br>
Need Help?
------
Join our Discord chat and talk with Proxy https://discord.gg/0pTKzt2BDIqDS4oW <br>
Current Issues / Change Log / Upcomming
------
**[TODO.md](https://github.com/proxikal/DiscordPHPBot/blob/master/TODO.md "TODO.md")**<br>
**Paradox Version:** 0.0.3b<br><br>
Added a bot log option. it's somewhat useless atm but works!<br>
*[ADDED]*<br>
**#log** *; adds a log to bot log channel.* <br>**#logchannel** *; adds a log channel.* <br> **#logserver** *; adds a log server*<br><br>
added **cacert.pem** and a fix below for *cURL error 60: SSL Certification error*<br>
to install:
------
**[without git]**<br>
Download the Bot Zip file & Place in a folder<br>
Download composer from: https://getcomposer.org/download/<br>
**Direct setup: https://getcomposer.org/Composer-Setup.exe** <Br>
after you install, open command prompt from the bots DIR, run command: *composer install*<br>
**expect some errors using this method**<br><br>
**[/without git]**<br><br>
**[with git]**<br>
Open your git bash or cmd and type the following:<br>
*git clone https://github.com/proxikal/DiscordPHPBot*<br>
Now download composer from the link above.<br>
after you've installed composer go back to your git bash or cmd window<br>
type: *cd DiscordPHPBot* and then type *composer install* wait till it's done<br>
**[/with git]**<br><br>

**after you've completed one of the above options:**<br>
open **config.ini** fill in your email and password and put your discord name in the owner section.<br>
under *[channels]* add: Your channel name = 1<br>
example if your server name is: Richmond Bakery Do this: <br>
**[channels]** <br>
**Richmond Bakery = 1** <br>
save, and open **StartBot.bat**. If you have any issues Join Paradox Lounge Discord Chat<br>
https://discord.gg/0pTKzt2BDIqDS4oW (NEW LINK. it will not expire this time!) <br>
Known Issues & Fixes
------
Getting a Guzzle error msg **cURL error 60** *SSL Certification*<br>
**FIX:** Download the cacert.pem file from above, place somewhere safe.<br>
Open your php.ini file and place this line somewhere:<br>
**curl.cainfo = "C:\directory here\cacert.pem"**<br>
