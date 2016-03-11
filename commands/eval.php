<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$pref=$p[$message->full_channel->guild->id]['Prefix'];
$msg=str_replace($pref."eval ", "", $message->content);
if($pref == "")
{
$pref=$thepref;
}


if($d['settings']['owner'] == $message->author->username)
{
	if (!isset($msg)) {
 // empty params
		}
		set_error_handler(function ($errno, $errstr) {
			if (!(error_reporting() & $errno)) {
				// it worked!
			}
			echo "[Eval Error] {$errno} {$errstr}\r\n";
			throw new \Exception($errstr, $errno);
		}, E_ALL);
		
		try {
			eval('$response = '.implode(' ', $params).';');
			if (is_string($response)) {
				$response = str_replace(DISCORD_TOKEN, 'TOKEN-HIDDEN', $response);
				$response = str_replace($config['password'], 'PASSWORD-HIDDEN', $response);
				$response = str_replace($config['sudo_pass'], 'SUDO-HIDDEN', $response);
			}
			$global->sendMessage("`{$response}`");
		} catch (\Exception $e) {
			$global->sendMessage("Eval failed. {$e->getMessage()}");
		}
		restore_error_handler();
}


		?>
