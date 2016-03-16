<?php
// require_once(__DIR__ . '/github-php-client/client/GitHubClient.php');
$_SESSION['first_run'] = 0;
$ini = new INI('config.ini');
$x = $ini->read('config.ini');

$guild = $discord->guilds->get('name', "Paradox Lounge");
$channel = $guild->channels->get('name', "lobby"); // you can change 'name' to any other attribute if you want


$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
		'header'=>"User-Agent: proxikal"
			  
    ),
); 



 if(time() >= $_SESSION['first_run'] + (60 * 2)) { // 60 * 2 is 2 minutes
 // include 'addons/github.php';
$n=0;

$client = new GitHubClient();
	$client->setPage();
	$client->setPageSize(2);
	$commits = $client->repos->commits->listCommitsOnRepository('proxikal', 'DiscordPHPBot');

	foreach($commits as $commit)
	{
	
	if($n < 1)
	{
	
		/* @var $commit GitHubCommit */
	$curl=$commit->getUrl();
	$sha=$commit->getSha();
	
	// $test = $tar->message[0];
	
// 	echo get_class($commit) . " - Sha: " . $sha . " - URL: " . $curl . " <br>";
	
//	$var1 = $info->url;
//	echo "TEST URL : " . $var1 . "<BR>";

		$c = curl_init();
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_USERAGENT, "proxikal");
		curl_setopt($c, CURLOPT_HEADER, false);
		curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($c, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
		curl_setopt($c, CURLOPT_USERPWD, "proxikal:Joshua(1)");
//		curl_setopt($c, CURLOPT_USERPWD, "e72e16c7e42f292c6912e7710c838347ae178b4a:x-oauth-basic");
		curl_setopt($c, CURLOPT_URL, $curl);
		curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
		$res = curl_exec($c);
		curl_close($c);
		$json = json_decode($res);
		
//		echo "VAR_DUMP: " . var_dump($json) . "<BR><BR>-----<BR><BR>";
// 	$res = file_get_contents($curl, false, stream_context_create($arrContextOptions));
$getsha=$json->sha;
$author=$json->author->login;
$message=$json->commit->message;
$file=$json->files['0']->filename;
$code=substr($getsha, 0, 7);
// $file="";
// echo "<BR>----<br> " . var_dump($file) . "<br>----<br>";

// € = alt 1028
if($code != "")
{
if($x['lastCommit']['code'] != $code)
{
 $channel->sendMessage("**proxikal/DiscordPHPBot** - `" . $code . "` \n File: `".$file."` *pushed by: *".str_replace("proxikal", "Proxy", $author)."* \n `" . $message . "`");
$ini->data['lastCommit']['code'] = $code;
$ini->write('config.ini');

} // end of new code check
}
else
{
  $channel->sendMessage("Something went wrong. I'll try again later.");
// echo something is wrong! 
}

// echo $getsha . "-" . $author . "-" . $file . "-" . $message." Code: " .$code."<BR>";


$n=$n+1;
}
	} // end of foreach loop
		


 $_SESSION['last_run'] = time();
 } // end of last_run check

// echo "<pre>" . var_dump($tar) . "</pre><br>";	
// echo "<BR><BR><BR>--------<BR><BR> VAR_DUMP <pre>" . var_dump($commits->commit) . "</pre>";

?>
