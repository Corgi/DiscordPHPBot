<?php
$c=0;
// ############## Channel restrictions ###################
foreach( $datas['channels'] as $key=>$data )
{
if (($message->full_channel->guild->name == $key) && ($data > 0))
{
$c = $c + 1;
}
} // end of foreach loop

// ################## End channels #####################
?>