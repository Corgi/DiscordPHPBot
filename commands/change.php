<?php
// ########## Change discord information ########
// $discord = new Discord();
// $discord->username = 'newusername';
// $discord->email = 'new@email.com';
// $discord->new_password = 'myNewPassword';
// $discord->setAvatar('/path/to/new/avatar');

// $discord->password = 'myCurrentPassword';
// $discord->save();
//#######################

$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
$msg=str_replace($pref."change ", "", $message->content);
$mom=explode(" ", $msg);
$category = $mom[0];
$mom_msg=str_replace($category . " ", "", $msg);

if($message->author->username == $d['settings']['owner'])
{

if($category == "name")
{
//  $discord = new Discord();
 $discord->username = $mom_msg;
 $ini->data['settings']['Name'] = $mom_msg;
 $discord->email = $d['settings']['email'];
 // $discord->new_password = 'myNewPassword';
$discord->setAvatar($d['settings']['Avatar']);
$discord->password = $d['settings']['password'];

$ini->write('config.ini');
$discord->save();

$message->channel->sendMessage(":exclamation:  I have changed my name to " . $mom_msg); 
} // end of category = name


if($category == "avatar")
{
//  $discord = new Discord();

 // $discord->new_password = 'myNewPassword';
if(file_exists($mom_msg))
{
$discord->username = $d['settings']['Name'];
$discord->email = $d['settings']['email'];
$discord->setAvatar($mom_msg);
 $ini->data['settings']['Avatar'] = $mom_msg;
$discord->password = $d['settings']['password'];
$ini->write('config.ini');
$discord->save();
$message->channel->sendMessage(":exclamation:  I have changed my avatar to " . $mom_msg); 
}
else
{
$message->channel->sendMessage(":exclamation: File doesn't exist..");
}

} // end of category = Avatar ## MAKE SURE YOU HAVE IT IN THE AVATAR FOLDER!




}
else
{

	$message->channel->sendMessage(":exclamation:  Only Proxy can use this command."); 
}



?>
