<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$pref=$d['settings']['Prefix'];

if($d['commands']['pirate'] == "1")
{

$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
); 

$msg=str_replace($pref."pirate ", "", $message->content);
$msg=str_replace(" ", "+", $msg);

$res = file_get_contents("https://www.alluc.ee/api/search/stream/?apikey=632c46664ef2f01b7cc0720dd79bae4f&count=3&from=0&query=".$msg, false, stream_context_create($arrContextOptions));
$json = json_decode($res);
$respond="``` ";
$k=0;

if(strpos($msg, "host:") > 0)
{
$hdr=" From `" . explode("host:", $msg)[1] . "`";
}

foreach($json->result as $mydata)
    {
         $respond .= $mydata->hosterurls['0']->url . "\n";
		 $k=$k+1;

    }
$respond .= "```";

if($mydata->hosterurls['0']->url != "")
{
$message->channel->sendMessage("I found **" . $k . " Results!".$hdr."** \n " . $respond); 

}
else
{
$message->channel->sendMessage("**No Results** Or something went wrong."); 
}

  }
  else
  {
  $message->reply("This command is disabled.");
  }
  
  
  ?>