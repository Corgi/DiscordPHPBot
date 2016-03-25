<?php
$pref=$p[$message->full_channel->guild->id]['Prefix'];
$msg=str_replace($pref."eval ", "", $message->content);
if($pref == "")
{
$pref=$thepref;
}


if($d['settings']['owner'] == $message->author->id)
{




		set_error_handler(function ($errno, $errstr) {
			if (!(error_reporting() & $errno)) {
				return;
			}
			echo "[Eval Error] {$errno} {$errstr}\r\n";
			throw new \Exception($errstr, $errno);
		}, E_ALL);
		
		try {
			$params = implode(' ', $msg);
			$params = str_replace('```', '', $params);
			$params = "<?php\r\n".$params;
			dump($params);
			$fileName = BOT_DIR.'/eval/'.Str::random();
			file_put_contents($fileName, $params);
			// lint
			$lint = shell_exec('php -l '.$fileName);
			if (strpos($lint, 'Errors parsing') !== false) {
				$global->sendMessage("Erorrs linting the file: ```{$lint}```");
				restore_error_handler();
				return;
			}
			$response = require_once $fileName;
			if (is_string($response)) {
				$response = str_replace(DISCORD_TOKEN, 'TOKEN-HIDDEN', $response);
				$response = str_replace($config['token'], 'TOKEN-HIDDEN', $response);
			}
			$global->sendMessage("```\r\n{$response}\r\n```");

		} catch (\Exception $e) {
			$global->sendMessage("Eval failed. {$e->getMessage()}");
		}
		restore_error_handler();




} // make sure it's my owner.


		?>
