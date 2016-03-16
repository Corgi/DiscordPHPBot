<?php

$ws->on(Event::GUILD_MEMBER_ADD, function ($data, $discord, $new) use($ws) {
    $greetmsg="";
    $found=0;
$isguild=$data->guild_id;
 // $masters  = parse_ini_string(file_get_contents( 'inis/masters.ini' ), true);
$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');
if($dD[$isguild]['GreetMsg'] != "")
{
    $guild = $discord->guilds->get('id', $data->guild_id);
    $new_member = $guild->members->last();
    $newguild=$data->guild_id;
    $guild_name=$guild->name;

    $res="The Message didn't work";
    $r=0;
echo "NEW USER: " . $new_member->username . " GUILD: " . $guild->name.PHP_EOL;
$channel = $guild->channels->first();
$greetmsg = $dD[$newguild]['GreetMsg'];
$res="The Message didn't work";
$r=rand(0,12);
if($r == 1) { $res="Guess what I'm wearing? The smile you gave me, **{user}**."; }
if($r == 2) { $res="Do you believe in love at first sight {user}, or should I walk by again?"; }
if($r == 3) { $res="Know what's on the menu? {user}, Me-**n**-u."; }
if($r == 4) { $res="Why, Hello {user} :heart: Can I borrow a kiss? I promise I'll give it back."; }
if($r == 5) { $res="{user}, I'll be Burger King and you be McDonald's. I'll have it my way, and you'll be lovin' it."; }
if($r == 6) { $res="{user}, Do I know you? Cause you look a lot like my next girlfriend."; }
if($r == 7) { $res="You know {user}, I want to die peacefully in my sleep, like my grandfather.. Not screaming and yelling like the passengers in his car."; }
if($r == 8) { $res="If i had a dollar for every girl that found me unattractive {user}, they would eventually find me attractive."; }
if($r == 9) { $res="Isn't it great to live in the 21st century {user}? Where deleting history has become more important than making it."; }
if($r == 10) { $res="Hey {user}, I read that 4,153,237 people got married last year, not to cause any trouble but shouldn't that be an even number?"; }
if($r == 11) { $res="Ya know {user}, I find it ironic that the colors red, white, and blue stand for freedom until they are flashing behind you."; }
if($r == 12) { $res="I think {user}'s stalking me as they've been googling my name on their computer. I saw it through my telescope last night."; }
$greetmsg=str_replace("{rf}", $res, $greetmsg);
$greetmsg=str_replace("{user}", $new_member->username, $greetmsg);
$greetmsg=str_replace("{guild}", $guild->name, $greetmsg);

$channel->sendMessage($greetmsg);

}


  });


