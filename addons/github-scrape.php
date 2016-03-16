<?php


/* build json */
// if($github_json) {
	
	//get markdown
//	include($_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/walshbook3/PHP-Markdown-Extra-1.2.4/markdown.php');
	
	//build content
//	$content = '<p>'.$github_json['repo']['repository']['description'].'</p>';
//	$content.= '<h2>MooTools JavaScript Class</h2><pre class="js">'.$github_json['js']['blob']['data'].'</pre><br />';
//	$content.= trim(str_replace(array('<code>','</code>'),'', $github_json['readme']['blob']['data']));
// }


 if(time() >= $_SESSION['first_run'] + (60 * 2)) { // 60 * 2 is 2 minutes



$data = get_content_from_github("https://github.com/proxikal/DiscordPHPBot");
$newdat=explode("tooltipped-n new-pull-request-btn", $data);
$newdat=str_replace($newdat[0], "", $data);
// -- step 2
$dat = explode('<span class="right">', $newdat);
$dat = str_replace($dat[0], "", $newdat);
// -- step 3
$status = explode('<div class="file-wrap">', $dat);
$status = str_replace($status[1], "", $dat);

// echo strip_tags($status);

$mt=strip_tags($status);
$string=preg_replace("/[\n\r]/","",$mt);
$string = trim(preg_replace('/\s+/', ':', $string));
// echo "<BR><BR>----test---<BR>";
$fk=explode(":", $string);
$omg=str_replace($fk[0].":".$fk[1].":".$fk[2].":".$fk[3].":".$fk[4].":".$fk[5].":".$fk[6].":".$fk[7].":", "", $string);
$omg=str_replace(":", " ", $omg);
// echo "Last commit: " . $fk[3] . " By: " . $fk[7] . " msg " . $omg;


$ini = new INI('config.ini');
$x = $ini->read('config.ini');

if(isset($fk[3]))
{
if($fk[3] != $x['lastCommit']['code'])
{
$ini->data['lastCommit']['code'] = $fk[3];
$ini->write('config.ini');
$guild = $discord->guilds->get('name', "Paradox Lounge");
$channel = $guild->channels->get('name', "lobby"); // you can change 'name' to any other attribute if you want
$channel->sendMessage("**proxikal/DiscordPHPBot** *(master)* \n `" . $fk[3] . "` *" . $omg . "*[" . str_replace("proxikal", "Proxy", $fk[7]) . "]*");
}
}
else
{
// $channel->sendMessage("**proxikal/DiscordPHPBot** *(master)* \n `[FAILED]` *will try again in 5 minutes.*");
}
// echo $string;

}

?>