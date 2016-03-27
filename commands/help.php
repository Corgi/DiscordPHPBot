<?php
$pref=$p[$message->full_channel->guild->id]['Prefix'];
if($pref == "")
{
$pref=$thepref;
}

$msg=str_replace($pref."help ", "", strtolower($message->content));
$opti=explode(" ", $msg);
$opt=str_replace($pref."help ", "", $msg);
$opt=str_replace($pref, "", $opt);

$theword=str_replace($pref."help ".$opti[0]." ", "", strtolower($message->content));
$word=strtolower($theword);
$result = "```ruby" . "\n";

/*
 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage("
  */

$zed=str_replace($pref."help", "", strtolower($message->content));

echo $zed.PHP_EOL;

if($zed == "")
{

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage("It seems you've typed my `help` command wrong.\nyou need to specify what command you need help with.\nfor a full list say `#commands` or `#cmd` even `#cmds` will work! than type `#help commandname` - *Note: make sure you use your servers prefix!*");
  
}




if($opt == "topstories")
{
  

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."topstories \nPermissions: [Everyone]. \nexample (1): ".$pref."topstories world \nexample (2): ".$pref."topstories home\nexample (3): ".$pref."topstories sports \nInformation: \nthis command requires a Subject. \nthis option has paradox display the top 2 or 3 stories in the section you Specifiy.\nhere is a list of sections i accept:\nhome\nworld\nnational\npolitics\nnyregion\nbusiness\nopinion\ntechnology\nscience\nhealth\nsports\narts\nfashion\ndining\ntravel\nmagazine\nrealestate```");

} // end of addmaster help







if($opt == "dm")
{
  

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."dm \nPermissions: [Everyone] \nexample (1): ".$pref."dm @user omg it works! \nInformation: \nthis command requires a User and String. \nthis command will make Paradox Direct Message a specific User.\nthis command is going to be upgraded in the future with neat tricks! ;)```");

} // end of addmaster help





if($opt == "autorole")
{
  

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."autorole \nPermissions: [Masters]\nexample (1): ".$pref."autorole Members\nInformation: \nthis command requires a Role Name that is CASE SENSITIVE. \nautorole command will automatically add new users on your server to a specific role of your choosing. This is case sensitive, do not remove the spacing if you have spaces in your role name.\nKnown Issues: Newer roles taking 15+ minutes to detect.```");

} // end of addmaster help





if($opt == "public")
{
 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."public \nPermissions: [Everyone]. \nexample (1): ".$pref."public add URL\nexample (2): ".$pref."public wtf\nexample (3): ".$pref."public\nInformation: \nthis command requires a URL or String. \nAdd your memes to our public database! Save the code and use it to show off your favorite meme!\nExample 1 shows how to add a meme to our database. make sure it's an image only!\nExample 2 Shows one way to search our database using keywords\nExample 3 shows you how to search for random memes!\n\nHow to control your memes after you've added them:\nMEMECODE-d to delete your meme\nMEMECODE-c YourCaption Here to edit the caption.\nmess the url up? You can update it by typing MEMECODE-u NewUrlHere\nThis system is currently in it's Beta. so at any time it could be subject of being disabled for updates.```");

} // end of addmaster help










if($opt == "announce")
{
  

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."announce \nPermissions: [Masters]. \nexample (1): ".$pref."announce #channel omg it works! \nInformation: \nthis command requires a channel and String. \nSends A Message to a specific channel in your server. (make sure he has permissions: to said channel)```");

} // end of addmaster help






if($opt == "giveme")
{
  

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."giveme \nPermissions: [Masters]. \nexample (1): ".$pref."giveme Role Name \nInformation: \nthis command requires a Role Name. \nGives the user a specific role. This will only work if Paradox has permissions to manage roles in the server.```");

} // end of addmaster help








if($opt == "youtube")
{
  

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."youtube \nPermissions: [Everyone]. \nexample (1): ".$pref."youtube miley cyrus \nInformation: \nthis command requires a Keyword. \nSearches youtube by keyword to find a single video result.```");

} // end of addmaster help








if($opt == "give")
{
  

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."give \nPermissions: [Masters]. \nexample (1): ".$pref."give @user Role Name \nInformation: \nthis command requires a User Mention and Role Name. \nGives the specified user a role. This will only work if Paradox has permissions to manage roles in the server.```");

} // end of addmaster help









if($opt == "take")
{
  

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."take \nPermissions: [Masters]. \nexample (1): ".$pref."take @user Role Name \nInformation: \nthis command requires a User Mention and Role Name. \nTakes the role away from a user. This will only work if Paradox has permissions to manage roles in the server.```");

} // end of addmaster help










if($opt == "setwarning")
{
  

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."setwarning \nPermissions: [Masters]. \nexample (1): ".$pref."setwarning 5\nInformation: \nthis command requires a Number. \nset's Paradox Warning Count. to turn off set to 0 and to kick people on the first offense set to 1```");

} // end of addmaster help







if($opt == "set")
{
  

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."set \nPermissions: [Masters]. \nexample (1): ".$pref."set filtermsg word filtered! \nexample (2): ".$pref."set linkmsg your link was blocked!\nexample (3): ".$pref."set greetmsg welcome to {guild}, enjoy your stay {user} !! \nInformation: \nthis command requires a Feature and String. \nthis allows users to change the messages on my systems above. Add {user} to display their name Add {guild} to display your server name!\nTURN THEM OFF: set the messages to nothing!\n the greetmsg will greet whatever channel you type the command on. ```");

} // end of addmaster help




if($opt == "spell")
{
  

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."spell \nPermissions: [Everyone]. \nexample (1): ".$pref."spell descrimination\nInformation: \nthis command requires a String. \nchecks a word. and somtimes an entire sentence for errors.```");

} // end of addmaster help





if($opt == "checkpass")
{
  

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."checkpass \nPermissions: [Everyone]. \nexample (1): ".$pref."checkpass [text] \nInformation: \nthis command requires a String. \nruns your password through a database known for capturing infected pc's passwords. \nLower the score, the more popular it is.```");

} // end of addmaster help


if($opt == "request")
{
  

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."request \nPermissions: [Everyone]. \nexample (1): ".$pref."request can you add a poll system? \nInformation: \nThis command requires a String. \nDo you want a feature? All you have to do is ask for it! \nThere is a 30 minute limit between requests.\nPlease, I stress.. a global ban will be issued to anyone who abuses this command, preventing use of future commands.```");

} // end of addmaster help


if($opt == "error")
{
  

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."error \nPermissions: [Everyone]. \nexample (1): ".$pref."error can't flush messages.. \nInformation: \nThis command requires a String. \nDo you have an error? Please report it! Using this feature will make Paradox a much beature protection / security / casual style bot!\nYou're limited to one error per 15 minutes. Make sure it's detailed!!```");

} // end of addmaster help





if($opt == "hash")
{
  

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."hash \nPermissions: [Everyone]. \nexample (1): ".$pref."checkpass sha256 \nInformation: \nThis command requires an Encryption type. \nOk well i support a lot of encryption types. sp bear with me here \n\n```");


  $user->sendMessage($result."
md2           32 a9046c73e00331af68917d3804f70655            \n
md4           32 866437cb7a794bce2b727acc0362ee27 \n
md5           32 5d41402abc4b2a76b9719d911017c592 \n
sha1          40 aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d \n
sha256        64 2cf24dba5fb0a30e26e83b2ac5b9e29e1b161e5c1fa7425e730 \n
sha384        96 59e1748777448c69de6b800d7a33bbfb9ff1b463e44354c3553 \n
sha512       128 9b71d224bd62f3785d96d46ad3ea3d73319bfbc2890caadae2d \n
ripemd128     32 789d569f08ed7055e94b4289a4195012 \n
ripemd160     40 108f07b8382412612c048d07d13f814118445acd \n
ripemd256     64 cc1d2594aece0a064b7aed75a57283d9490fd5705ed3d66bf9a \n
ripemd320     80 eb0cf45114c56a8421fbcb33430fa22e0cd607560a88bbe14ce \n
whirlpool    128 0a25f55d7308eca6b9567a7ed3bd1b46327f0f1ffdc804dd8bb \n
tiger128,3    32 a78862336f7ffd2c8a3874f89b1b74f2 \n
tiger160,3    40 a78862336f7ffd2c8a3874f89b1b74f2f27bdbca \n
tiger192,3    48 a78862336f7ffd2c8a3874f89b1b74f2f27bdbca39660254 \n
tiger128,4    32 1c2a939f230ee5e828f5d0eae5947135 \n
tiger160,4    40 1c2a939f230ee5e828f5d0eae5947135741cd0ae ```");

  $user->sendMessage($result."
tiger192,4    48 1c2a939f230ee5e828f5d0eae5947135741cd0aefeeb2adc \n
snefru        64 7c5f22b1a92d9470efea37ec6ed00b2357a4ce3c41aa6e28e3b \n
gost          64 a7eb5d08ddf2363f1ea0317a803fcef81d33863c8b2f9f6d7d1 \n
adler32        8 062c0215 \n
crc32          8 3d653119 \n
crc32b         8 3610a686 \n
haval128,3    32 85c3e4fac0ba4d85519978fdc3d1d9be \n
haval160,3    40 0e53b29ad41cea507a343cdd8b62106864f6b3fe \n
haval192,3    48 bfaf81218bbb8ee51b600f5088c4b8601558ff56e2de1c4f \n```");

    $user->sendMessage($result."
haval224,3    56 92d0e3354be5d525616f217660e0f860b5d472a9cb99d6766be \n
haval256,3    64 26718e4fb05595cb8703a672a8ae91eea071cac5e7426173d4c \n
haval128,4    32 fe10754e0b31d69d4ece9c7a46e044e5 \n
haval160,4    40 b9afd44b015f8afce44e4e02d8b908ed857afbd1 \n
haval192,4    48 ae73833a09e84691d0214f360ee5027396f12599e3618118 \n
haval224,4    56 e1ad67dc7a5901496b15dab92c2715de4b120af2baf661ecd92 \n
haval256,4    64 2d39577df3a6a63168826b2a10f07a65a676f5776a0772e0a87 \n
haval128,5    32 d20e920d5be9d9d34855accb501d1987 \n
haval160,5    40 dac5e2024bfea142e53d1422b90c9ee2c8187cc6 \n
haval192,5    48 bbb99b1e989ec3174019b20792fd92dd67175c2ff6ce5965 \n
haval224,5    56 aa6551d75e33a9c5cd4141e9a068b1fc7b6d847f85c3ab16295 \n
haval256,5    64 348298791817d5088a6de6c1b6364756d404a50bd64e645035f```");

} // end of addmaster help









if($opt == "locateip")
{
  

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."locateip \nPermissions: [Everyone]. \nexample (1): ".$pref."locateip 127.0.0.1 \nInformation: \nThis command requires an IP Address. \nGet's the geo-location of an ip. ```");

} // end of addmaster help











if($opt == "isemail")
{
  

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."isemail \nPermissions: [Everyone]. \nexample (1): ".$pref."isemail user@yahoo.com\nInformation: \nThis command requires an Email. \nChecks to see if an email is valid. ```");

} // end of addmaster help









if($opt == "addmaster")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."addmaster \nPermissions: [Masters]. \nexample (1): ".$pref."addmaster @User \nInformation: \nThis command requires a mention. \nthe addmaster command allows people to acces my master commands \nyou can find my master commands by typing ".$pref."commands in a server chat. ```");

} // end of addmaster help





if($opt == "afk")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."afk \nPermissions: [Everyone] \nexample (1): ".$pref."afk I'm going to the store! \nInformation: \nThe away message is triggered in chat if your name is mentioned \nand if private messaged. I have an anti-spam feature that will only display \nthe afk message every 2 minutes.```");

} // end of afk help





if($opt == "allowlinks")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."allowlinks \nPermissions: [Sudo Master] \nexample (1): ".$pref."allowlinks [null]\nInformation: \nThis command does not require any Parameters\nturns the channel link protection module [off]. \nall links will be allowed on your server. (this is default) ```");

} // end of afk help





if($opt == "back")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."back \nPermissions: [Everyone] \nexample (1): ".$pref."back [null]\nInformation: \nThis command does not require any Parameters \nbrings the user back from being afk.```");

} // end of afk help





if($opt == "checkurl")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."checkurl \nPermissions: [Everyone] \nexample (1): ".$pref."checkurl google \nexample (2): ".$pref."checkurl google.com \nInformation: \nChecks a set of urls, both examples will return the same results.```");

} // end of afk help








if($opt == "commands")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."commands \nPermissions: [Everyone] \nexample (1): ".$pref."commands [null]\nInformation: \nThis command does not require any Parameters\nPrivate messages user a set of all my commands.```");

} // end of afk help








if($opt == "delmaster")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."delmaster\nPermissions: [Sudo Master] \nexample (1): ".$pref."delmaster @user \nInformation:\nThis command requires a mention to work. \nThis removes one of my masters on your server.```");
} // end of afk help









if($opt == "denylinks")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."denylinks \nPermissions: [Masters] \nexample (1): ".$pref."denylinks [null]\nInformation: \nThis command does not require any Parameters\nTurns my channel link module [off]. This removes any links posted in your server.```");

} // end of afk help


//    \nThis command does not require any Parameters








if($opt == "filter")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."filter \nPermissions: [Masters] \nexample (1): ".$pref."filter add asshole\nexample(2): ".$pref."filter del asshole\nexample(3): ".$pref."filter showall \nInformation: \nThis command requires a string. \nAdds \ Removes \ Shows your filter words on your server. ```");

} // end of afk help









if($opt == "filterwords")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."filterwords \nPermissions: [Sudo Master] \nexample (1): ".$pref."filterwords [null]\nInformation: \nThis command does not require any Parameters\nTurns my word filter on in your server.\nThe bot will remove their message, filter and then display the filtered message.```");

} // end of afk help








if($opt == "flush")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."flush \nPermissions: [Masters] \nexample (1): ".$pref."flush 15\nInformation: \nThis command requires an Integer\nRemoves the selected amount of messages from the channel. ```");

} // end of afk help








if($opt == "getavatar")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."getavatar \nPermissions: [Everyone] \nexample (1): ".$pref."getavatar @user\nInformation: \nThis command requires a Mention\nGrabs the user's avatar and displays it in the server. ```");

} // end of afk help







if($opt == "getid")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."getid \nPermissions: [Everyone] \nexample (1): ".$pref."getid @user\nInformation: \nThis command requires a Mention\nGrabs the user's ID and displays it in the server. ```");

} // end of afk help







if($opt == "getstatus")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."getstatus \nPermissions: [Everyone] \nexample (1): ".$pref."getstatus @user\nInformation: \nThis command requires a Mention\nGrabs the user's game status and displays it in the server. ```");

} // end of afk help








if($opt == "getavatar")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."getavatar \nPermissions: [Everyone] \nexample (1): ".$pref."getavatar @user\nInformation: \nThis command requires a Mention\nGrabs the user's avatar and displays it in the server. ```");

} // end of afk help







if($opt == "giphy")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."giphy \nPermissions: [Everyone] \nexample (1): ".$pref."giphy text here\nInformation: \nThis command requires a String\nGrabs a gif of the text you've entered. ```");

} // end of afk help






if($opt == "ign")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."ign \nPermissions: [Everyone] \nexample (1): ".$pref."ign Call of Duty\nInformation: \nThis command requires a String\nGrabs the IGN information and displays a light copy in the server. ```");

} // end of afk help






if($opt == "info")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."info \nPermissions: [Everyone] \nexample (1): ".$pref."info [null]\nInformation: \nThis command does not require any Parameters\nDisplays my information into the server. ```");

} // end of afk help






if($opt == "kick")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."kick \nPermissions: [Masters] \nexample (1): ".$pref."kick @user\nInformation: \nThis command requires a Mention\nKicks the user from the server. ```");

} // end of afk help






if($opt == "listmasters")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."getavatar \nPermissions: [Sudo Master] \nexample (1): ".$pref."listmaster @user\nInformation: \nThis command requires a Mention\nLists all the masters in your server. \nThe public version of this command is: @Paradox what's my role?```");

} // end of afk help







if($opt == "mimic")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."mimic \nPermissions: [Everyone] \nexample (1): ".$pref."mimic text here\nInformation: \nThis command requires a String\nMakes the bot mimic your words. ```");

} // end of afk help







if($opt == "mkchan")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."mkchan \nPermissions: [Masters] \nexample (1): ".$pref."mkchan Name text \nexample (2): ".$pref."mkchan Name voice \nInformation: \nThis command requires a channel name, and a type: text or voice. \nCreates a channel in your server. copies permissions from @everyone role. ```");

} // end of afk help






if($opt == "mute")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."mute \nPermissions: [Masters] \nexample (1): ".$pref."mute @user\nInformation: \nThis command requires a Mention\nMutes the user in the server. \nAt the moment it's not by role, it deletes the users message \nThis will be updated soon!!```");

} // end of afk help





if($opt == "watch")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."watch \nPermissions: [Everyone] \nexample (1): ".$pref."watch Brooklyn Nine Nine S01E02 \nexample (2): ".$pref."watch Supergirl S01E02 host:vodlocker.com \nexample (3): ".$pref."watch Family Guy S03E12 host:allmyvideos.net #newlinks\nInformation: \nThis command requires a String\nGrabs Links of a Movie or TV Shows.\nREQUIRED: Adblock Plus on your browser. to stop the ads!\nSoon to come: ".$pref."watch showhosts to display all hoster links.```");

} // end of afk help







if($opt == "quotes")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."quotes \nPermissions: [Everyone] \nexample (1): ".$pref."quotes Movies \nexample(2): ".$pref."quotes Famous \nInformation: \nThis command requires the words Movies or Famous. \nDisplays quotes from movies or famous people in the server.```");

} // end of afk help







if($opt == "reportuser")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."reportuser \nPermissions: [Everyone] \nexample (1): ".$pref."reportuser @user [reason]\nInformation: \nThis command requires a Mention and a String.\nIf you see someone abusing the bot, trying to get him to spam..or anything suspicious \nplease report them. the bot owner will global ban the user from using commands. ```");

} // end of afk help







if($opt == "rolecolor")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."rolecolor \nPermissions: [Masters] \nexample (1): ".$pref."rolecolor #00FF00 Server Admin \nexample(2): ".$pref."rolecolor #f20c2a Mr PiCkLeS PiCkEr \nInformation: \nThis command requires a Hex color and a Role name. \nChanges the role color to a custom HTML color.\n[DO NOT] remove spacing. and it's not case sensitive. ```");

} // end of afk help








if($opt == "serverinfo")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."serverinfo \nPermissions: [Everyone] \nexample (1): ".$pref."serverinfo [null]\nInformation: \nThis command does not requires any Parameters.\nDisplays the server information, along with some other stuff.```");

} // end of afk help





if($opt == "setprefix")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."setprefix \nPermissions: [Masters] \nexample (1): ".$pref."setprefix :: \nexample (2): ".$pref."setprefix #\nInformation: \nThis command requires a Special Character.\nChanges my prefix in your server, I only allow prefixes 3 characters or less. and special characters!```");

} // end of afk help








if($opt == "shorturl")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."shorturl \nPermissions: [Everyone] \nexample (1): ".$pref."shorturl http://www.yahoo.com\nInformation: \nThis command requires a URL.\nCreates a Bit.ly short url.```");

} // end of afk help








if($opt == "sticker")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."sticker \nPermissions: [Everyone] \nexample (1): ".$pref."sticker [text]\nInformation: \nThis command requires a String.\nCreates a sticker based off your text.```");

} // end of afk help








if($opt == "stopfilter")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."stopfilter \nPermissions: [Sudo Master] \nexample (1): ".$pref."stopfilter [null]\nInformation: \nThis command does not require any Parameters.\nStops the word filter in your server.```");

} // end of afk help









if($opt == "topic")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."topic \nPermissions: [Masters] \nexample (1): ".$pref."topic [text]\nInformation: \nThis command requires a String.\nChanges the topic in your channel.```");

} // end of afk help








if($opt == "unmute")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."unmute \nPermissions: [Masters] \nexample (1): ".$pref."unmute @user \nInformation: \nThis command requires a Mention.\nUnmutes a user so they're able to talk in your server.```");

} // end of afk help









if($opt == "weather")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."weather \nPermissions: [Everyone] \nexample (1): ".$pref."weather 33540 \nexample (2): ".$pref."weather M5P2N7 \nexample (3): ".$pref."weather London,UK\nexample:(4): ".$pref."weather Leipzig, Germany\nInformation: \nThis command requires a String or Integer.\nFor US you can just add the zipcode \nFor canada just remove the space. \nEuropean users need to specify the city and country. ```");

} // end of afk help




if($opt == "create")
{
  
$resultk = "```ruby"."\n";

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($resultk."Command: ".$pref."create \nPermissions: [Everyone] \nexample (1): ".$pref."create happy msg {user} is happy!\nexample (2): ".$pref."create chanWelcome msg Welcome to {channel}\nexample (3): ".$pref."create bye msg Goodbye {user} thank for visiting {server}!\nexample (4): ".$pref."create mycmd private your text here\nexample (5): ".$pref."create myweather paradox->weather 33540\nexample (6): ".$pref."create pmuser paradox->dm {user} \nInformation: \nThis command requires a type{msg or private} and a string. \nExample 1 shows you how to create a command that requires a mention.\nExample 2 shows you how to make a command that requires a channel mention. \nExample 3 shows how to add the server name in with the mention.\nExample 4 shows you how to make a private command only you will be able to use.\nExample 5 shows you how to make custom presets with my already made commands. so example 5 will do the same as --weather 33540.\nExample 6 will show you how to use a command that requires someones name. example 6: --pmuser @User hi will do the same as -dm @User hi.```");

} // end of afk help







if($opt == "unmute")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."unmute \nPermissions: [Masters] \nexample (1): ".$pref."unmute @user \nInformation: \nThis command requires a Mention.\nUnmutes a user so they're able to talk in your server.```");

} // end of afk help








if($opt == "youtubemp3")
{
	

 $user = \Discord\Parts\User\User::find($message->author->id);
  $user->sendMessage($result."Command: ".$pref."youtubemp3 \nPermissions: [Masters] \nexample (1): ".$pref."youtubemp3 1pa1KgkuShs \nInformation: \nThis command requires a Youtube Video ID.\nConverts the youtube video to MP3. ```");

} // end of afk help


?>