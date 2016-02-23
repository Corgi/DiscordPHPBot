<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];
if($d['commands']['kick'] == "1")
{
$guild = $discord->guilds->get('name', $message->full_channel->guild->name);
$members = $guild->members; // Returns a collection of members
$msg=str_replace($pref."kick ", "", $message->content);
// echo "Guild Vardump: <pre>" . var_dump($guild) . "</pre>";
// echo "<br>";
// echo "Members Vardump: " . var_dump($members);

$memberToKick = $members->get('username', $msg);
$memberToKick->kick();
}
else
{
$message->reply("This command is disabled.");
}

?>