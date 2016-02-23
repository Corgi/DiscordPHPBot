<?php
$ini = new INI('config.ini');
$d = $ini->read('config.ini');

if($d['commands']['weather'] == "1")
{


$pref=$d['settings']['Prefix'];
$msg=str_replace($pref."weather ", "", $message->content);
 $msg=str_replace(" ", "", $msg);
if($d['apis']['weather'] != "")
{
  $json_string = file_get_contents("http://api.wunderground.com/api/".$d['apis']['weather']."/geolookup/conditions/q/".$msg.".json");
  $json = json_decode($json_string);
  $city= $json->{'location'}->{'city'};
  $temp = $json->{'current_observation'}->{'temperature_string'};
  $weather = " " . $json->{'current_observation'}->{'weather'};
  $humidity = $json->{'current_observation'}->{'relative_humidity'};
  $wind = $json->{'current_observation'}->{'wind_string'};

$error = $json->{'response'}->{'error'}->{'type'};

//	echo $city . " <br> " . $temp . "<BR>" . $weather . "<BR>".$humidity."<BR>".$wind;
	
// 	echo var_dump($json) . "<BR><BR>";
	if (date('H') < 19) { $status = "day"; } else { $status = "night"; }
	
	if($weather == " Clear") { if($status == "day") { $icon=":sunny:"; } if($status == "night") { $icon=":crescent_moon:"; } }
	if(strpos($weather, "Cloudy") > 0) { $icon=":cloud:"; }
	if($weather == " Scattered Clouds") { $icon=":cloud:"; }
	if($weather == " Overcast") { $icon=":cloud:"; }
	if(strpos($weather, "Rain") > 0) { $icon=":umbrella:"; }
	if(strpos($weather, "Fog") > 0) { $icon=":foggy:"; }
	if(strpos($weather, "Snow") > 0) { $icon=":showflake:"; }
	if(strpos($weather, "Hail") > 0) { $icon=":umbrella:"; }
	
	if($error != "")
	{
	$message->channel->sendMessage("Oops, Something happened. Try this: \n ```#weather 33540 ;; using us zip code \n #weather Zephyrhills,FL  ;; using city and state. \n for canada try: #weather M5P2N7```");
	}
	else
	{
	$message->channel->sendMessage($icon . "   **" . $city . " Weather:** \n          Currently it's: ".$weather." \n          Temperature: *" . $temp . "* \n          Humidity: *" . $humidity . "* \n          Winds *" . $wind . "*");
	}
	
}
else
{
$message->channel->sendMessage(":exclamation: You need to setup a **Weather Underground API Key** in your config.ini \n You can get your free key here: http://www.wunderground.com/weather/api/d/docs?d=index");
}

}
else
{
$message->reply("This command is disabled. ");
}
	?>