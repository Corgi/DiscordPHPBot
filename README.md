Created using DiscordPHP from team-reflex
======

https://github.com/teamreflex/DiscordPHP<br>
Need Help?
------
Join our Discord chat and talk with Proxy https://discord.gg/0pTKzt2BDIqDS4oW <br>
Current Issues / Change Log / Upcomming
------
**Paradox Version:** 0.0.5b - **[TODO.md](https://github.com/proxikal/DiscordPHPBot/blob/master/TODO.md "TODO.md")**<br><br>
Preparing for a big update. should be ready tomorrow.
<br>
added **cacert.pem** and a fix below!
to install:
------
**[without git]**<br>
After you download the bot to your C:\<yourpath>\Paradox\ folder.<Br>
It should look like this: C:\<yourpath>\Paradox\DiscordPHPBot\<Br>
Now, install composer @ https://getcomposer.org/Composer-Setup.exe<br><br>
-once completed:
Browse to your **C:\<your path>\Paradox\DiscordPHPBot** Directory.<br>
In windows 7, 8 and I think 10 as well: you can Hold down SHIFT and right click in the folder.<br>
You will see a context menu with a new item - > **open command window here** (click it)<br>
*(or in a command prompt type: cd C:\<your path>\Paradox\DiscordPHPBot)* <br>
Now that the command line is opened in our Work DIR. We can type: `composer install` <br>
*Disregard the errors using this method, the bot still works.*<br>
This bot does not run in a web browser. **ONLY COMMAND PROMPT**.<br>
Any problems, just join our discord server by clicking the link above!<br>
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
example if your server name is: Richmond Bakery<br>
**[channels]** <br>
**Richmond Bakery = 1** <br><Br>
save, and open **StartBot.bat**. If you have any issues Join Paradox Lounge Discord Chat<br>
https://discord.gg/0pTKzt2BDIqDS4oW (NEW LINK. it will not expire this time!) <br>
**if you choose not to use these api's. just comment out the commands in Paradox.php.**<br><br>
Setting up #weather command
------
First off you need to visit Weather underground api:<Br>
http://www.wunderground.com/weather/api/d/docs?d=index <Br>
You need to sign up to get an apiKey.<br>

Once you've signed up Click "Key Settings" to obtain your key! <br>
Place that key in your **config.ini** under *[apis]* in the weather spot.<br>
it should look like this:<br>
*[apis]*<br>
weather = "your api key"<br>
**And your done with the weather!** use: `#weather <zipcode>` <br><br>
Setting up #shorturl command
------
First you need to visit bit.ly and signup (not with facebook or anything else)<br>
make sure you sign up through **bit.ly** or you will have issues getting your **OAUTH code** <br>
Onced signed in visit: https://bitly.com/a/oauth_apps type your password and click **Generate**<br>
Once you've generated an OAUTH key copy and place it under *[apis]* in the bitly spot
it should look like this:<br>
*[apis]*<br>
bitly = "your OAUTH code"<br><br>
Now, you need to browse to **commands/shorturl.php** open in an editor.<br>
on `line 15` you need to add your bit.ly username and password information.<br>
change  `&login=USERNAME:PASSWORD` to your credentials.<br><br>
**And you're done! use #shorturl http://url.com**<br><br>
Setting up mashape key
------
First of, visit mashape and signup: https://market.mashape.com<br>
Once your logged in click your applications, you should see a blue button **"Get the keys"**<br>
Copy your Mashape key to your config.ini under *[apis]* mashape = "<yourkey>"<Br>
and you're done!<br>

cURL error 60: SSL Certification error
------
**FIX:** Download the cacert.pem file from above, place somewhere safe.<br>
Open your php.ini file and place this line somewhere:<br>
**curl.cainfo = "C:\directory here\cacert.pem"**<br>

Documentation
------
More coming soon.
