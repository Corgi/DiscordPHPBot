<?php
use Discord\Exceptions\PartRequestFailedException;

$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');
$did=0;
$canWork="False";

if($pref == "")
{
$global->sendMessage("You can't use this command in `private message`");
}
else
{


$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
$channel = $guild->channels->get('id', $message->channel_id);


if($d['commands']['rolecolor'] == "1")
{
echo "## COMMAND TRIGGERED ".PHP_EOL;
$dem=0;

$msg=str_replace($pref."rolecolor ", "", $message->content);
$msg=explode(" ", $msg);
$newmsg=str_replace($pref."rolecolor ".$msg[0]." ", "", $message->content);
$color=$msg[0];
$raw_color=$msg[0];
$grole=$newmsg;
$ismaster="yes";
$color=str_replace("#", "", $color);

if (!preg_match("/#([a-fA-F0-9]{3}){1,2}\b/", $color)) {
    echo "A match was found.";

echo "## PREG MATCH CHECKED OUT !!! ".PHP_EOL;
$sudo_color = hexdec( strtolower($color) );


$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
// $channel = $guild->channels->get('id', $message->channel_id);
// $overwrites=$guild->overwrites->getAll('type', 'role'); 


// $test = $overwrites->get('name', $grole);
// $overwrites->color = $color;
// $overwrites->save();
echo "### HERE IS ROLE COLOR =>".$sudo_color.PHP_EOL;
if($dD[$message->full_channel->guild->id][$message->author->id] == "1")
{

// ############################################
foreach ( $guild->roles as $rc )
{
echo "##LOOKING FOR THE ROLE::".$grole.PHP_EOL;

if(strtolower($grole) == strtolower($rc->name))
{
	echo "####!~ FOUND THE ROLE " . $rc->name . PHP_EOL;
try {

	
$rc->color = $sudo_color;
$rc->save();
$did=$did+1;
$message->channel->sendMessage("I have changed the color to `".$raw_color."` on role `".$grole."`");
} catch (PartRequestFailedException $e) {
	if($did < 1)
	{
$message->channel->sendMessage("I don't have permissions to edit roles in `" . $message->full_channel->guild->name . "`");
$did=$did+1;
$dem=$dem+1;
}
continue;
} // end of try
} // found the role.
//##########################################
} // end of foreach loop





if($dem > 0)
{

// ############################################
foreach ( $guild->roles as $rc )
{
echo "##LOOKING FOR THE ROLE::".$grole.PHP_EOL;

if(strtolower($grole) == strtolower($rc->name))
{
	echo "####!~ FOUND THE ROLE " . $rc->name . PHP_EOL;
try {

	
$rc->color = $sudo_color;
$rc->save();
$did=$did+1;
$message->channel->sendMessage("I have changed the color to `".$raw_color."` on role `".$grole."`");
} catch (PartRequestFailedException $e) {

	$req="```ruby"."\n";
$guild = $discord->guilds->get('name', $d['settings']['server']);
$channel = $guild->channels->get('name', "error_reports"); // you can change 'name' to any other attribute if you want
$channel->sendMessage("`Automatic Error Report:` Someone ran into an error!\n ".$req."User: " . $message->author->username . " Guild: ".$message->full_channel->guild->name."\nError Message:\n".$e->getMessage()."```");


	if($did < 1)
	{
$did=$did+1;
$dem=$dem+1;
}
continue;
} // end of try
} // found the role.
//##########################################
} // end of foreach loop


} // double check if you can do it





}
else
{
	$did=$did+1;

	try
	{
	$message->channel->sendMessage("You're not one of my masters on `".$message->full_channel->guild->name."`");
} catch (PartRequestFailedException $e) {
}


} //ismaster on server


}
else
{
	$did=$did+1;

	try
	{
$message->channel->sendMessage("You typed an invaled Hex. example: `".$pref."rolecolor #FF0000 ".$grole . "`"); 
} catch (PartRequestFailedException $e) {
}


} // end of preg_match to make sure its a valid html color not a mistake or intentional spam.










if($did == 0)
{

	try
	{
$message->channel->sendMessage("I couldn't find the role `".$grole."` check the spelling, make sure not to remove spacing. and it's not case sensitive `new roles or renamed roles may take up to 30 minutes to register into the api. `");
} catch (PartRequestFailedException $e) {
}


}



}
else
{
echo "This command is disabled. \n";
}


} //command only works in server.
?>