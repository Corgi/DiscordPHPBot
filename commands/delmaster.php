<?php
use Discord\Exceptions\PartRequestFailedException;

$ini = new INI('config.ini');
$d = $ini->read('config.ini');

$iniM = new INI('inis/masters.ini');
$dM = $iniM->read('inis/masters.ini');

$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
$msg=str_replace($pref."delmaster ", "", $message->content);
$goid=str_replace("<@", "", $msg);
$goid=str_replace(">", "", $goid);
$user = \Discord\Parts\User\User::find($goid);
$opt_user=$user->username;
$opt_id=$user->id;
$did=0;
// Paradox Lounge = "Proxy€False"
$inviter=$d['servers'][$message->full_channel->guild->name];
$inviter=explode("€", $inviter);
$the_inviter=$dm[$message->guild->full_channel->guild->id]['Master'];
$isMaster="no";
$opt_guild=$message->full_channel->guild->id;
$actualuser=$message->author->username;
if($pref == "")
{
$global->sendMessage("You can't use this command in `private message`");
}
else
{



if($d['commands']['delmaster'] == "1")
{
echo "## SERVER: " . $message->full_channel->guild->name . " INVITER: " . $the_inviter . PHP_EOL;

	if(strpos($msg, "@") > 0)
		{

$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');

echo "########## FOUND THE @ SYNBOL".PHP_EOL;
$ini_array = parse_ini_file("inis/masters.ini");


		if($dD[$opt_guild]['Master'] == $actualuser)
		{

			unset($iniD->data[$opt_guild][$opt_id]);
			$iniD->write('inis/masters.ini');
			$did=$did+1;

			try
			{
			$global->sendMessage(":exclamation: `" . $opt_user . "` has been removed from **masters list** on `".$opt_guild."`");
			} catch (PartRequestFailedException $e) {
			}


		}
		else
		{
			$did=1;
			
			try
			{
			$global->sendMessage(":exclamation: I'm sorry, only the Bot master can delete other masters on this server. \n The main bot master is the person who invited me. Talk to `".$dD[$opt_guild]['Master']."`");
			} catch (PartRequestFailedException $e) {
			}


		}

			if($did == 0)
			{

				try
				{
				$global->sendMessage(":exclamation: Can't find `" . $opt_user . "` on my **masters list**");
				} catch (PartRequestFailedException $e) {
				}

			}

		}
		else
		{

			try
			{
			$global->sendMessage("You need to mention the user by using `@`");
			} catch (PartRequestFailedException $e) {
			}
			
		}
}
else
{
echo "This command is disabled. \n";
}


} // check if it's server only.
?>