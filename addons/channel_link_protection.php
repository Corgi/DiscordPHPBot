<?php

// ################## Link protection Removal ###################
// print_r($datas);
foreach( $datas['owners'] as $key=>$data )
{
// echo htmlspecialchars( $data["name"] );
// htmlspecialchars( $section );
// echo "OWNER: " . htmlspecialchars( $key . " - " . $data );

if(($message->author->username == $key) && ($data == 1))
{
$l = $l + 1;
}

} // end of foreach loop

foreach( $datas['linkProtect'] as $key=>$data )
{
if (($message->full_channel->guild->name == $key) && ($data > 0))
{
$r = $r + 1;
}
} // end of foreach loop

if($r == 1)
{
if(($l == 0) || ($allow == false))
{
if((strpos($message->content, ".com") > 0) || (strpos($message->content, "www.") > 0) || (strpos($message->content, ".org") > 0))
{
// if($message->full_channel->guild->name == "Paradox Lounge") // ## Channel Restrictions
// {
$den=$message->author->username;

if($message->author->username != "Paradox")
{

		$rmmessages = 0;
		$channel = $message->channel;
		$num = 0;
		$channel->message_count = $rmmessages + 1;

		foreach ($channel->messages as $key => $message) {
			try {
				$message->delete();
			} catch (PartRequestFailedException $e) {
				continue;
			}
			$num++;
		}
		$message->channel->sendMessage(":no_entry_sign: " . $den . " your link was removed due to our policy."); 
		}
// } // End of channel restrictions #######
}

} // end of owner check

} // end of $r [room check]

// ############### end of link protection #####################

?>