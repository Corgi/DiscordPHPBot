<?php
session_start();
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$server=$d['settings']['server'];
$prefix=$d[$server]['Prefix'];
$owner=$d['settings']['owner'];
$wthr=$d['apis']['weather'];
$bitly=$d['apis']['bitly'];

if($d['settings']['firstTime'] == "No")
{
// if($wthr == "") { echo "### Your Weather API isn't setup! the #weather command won't work \n"; }
// if($prefix == "") { echo "### My Prefix isn't setup in config.ini. No commands will work \n"; }
// if($bitly == "") { echo "### Your Bit.ly API isn't setup! the #shorturl command won't work \n"; }
}


if($d['settings']['owner'] == "")
{
echo "OWNER NOT SET: Open config.ini and under [settings] \n find owner and put owner = \"Your Discord Name\" \n\n";
} // end of checking is owner is set in config file.




?>