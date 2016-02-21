<?php
$mkallow=false;
$mkdat=str_replace("#mkchan ", "", $message->content);
$sp=explode(" ", $mkdat);

foreach( $datas['channels'] as $key=>$data )
{
if(($message->full_channel->guild->name == $key) && ($data == 1))
{
$mkallow=true;
}
}

if($mkallow == "true")
{

$guild = $discord->guilds->get('name', $message->full_channel->guild->name); // 
$g2 = $guild->id; // 

    $everyone_role = $guild->roles->get('name', '@everyone');

$allow = new \Discord\Parts\Permissions\ChannelPermission;
$allow->create_instant_invite = true;
$deny = new \Discord\Parts\Permissions\ChannelPermission;

$channel = new \Discord\Parts\Channel\Channel();
$channel->name = $sp[0];
$channel->type = $sp[1];
$channel->guild_id = $g2;    
$channel->save();

$channel->setPermissions($everyone_role, $allow, $deny);
// $channel->save();

}
?>
