<?php
foreach( $datas['owners'] as $key=>$data )
{
if(($message->author->username == $key) && ($data == 1))
{
$ad = $ad + 1;
}
}
?>