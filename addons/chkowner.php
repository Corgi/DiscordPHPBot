<?php
$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');

foreach( $dD[$message->full_channel->guild->id] as $key=>$data )
{
if($message->author->id == $key)
{
$ad = $ad + 1;
}
}

if($message->author->id == $datas['settings']['owner'])
{
$ow = $ow + 1;
$ad = $ad + 1;
}
?>