<?php
use Discord\Discord;
use Discord\WebSockets\Event;
use Discord\WebSockets\WebSocket;
use Discord\Parts\Guild;
use Discord\Parts\Guild\Invite;
use Discord\Parts\User;
use Discord\Parts\Permissions\ChannelPermission;
use Discord\Parts\Permissions\RolePermission;
use discord\Parts\User\Member;
use Discord\Helpers\Guzzle;
use Discord\Exceptions\DiscordRequestFailedException;
use Discord\Exceptions\InviteInvalidException;
use Discord\Exceptions\PartRequestFailedException;

Class Paradox
{

	protected $discord;
	public $ws;
	public $err=0;
	public $owner_id="";
    public $rawdat;
    public $username;
    public $password;
    public $status;

public function Initiate()
{
$_SESSION['last_run'] = 0;
$_SESSION['check_update'] = 0;
$_SESSION['check_message'] = 0;
$_SESSION['afk_bot_spam'] = 0;
$_SESSION['spam_check'] = 0; // the time a last command was used
$_SESSION['mute_warning'] = 0;
$gamecode=0;
$_SESSION['last_purge'] = 0;

$_SESSION['non_Carbon'] = "";
$_SESSION['master'] = "";

ini_set("log_errors", 1);
ini_set("error_log", "php-error.log");

date_default_timezone_set('US/Eastern');
error_reporting( error_reporting() & ~E_NOTICE );

 $units = explode(' ', 'B KB MB GB TB PB');
}


public function dirSize($directory) {
    $size = 0;
    foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory)) as $file){
        $size+=$file->getSize();
    }
    return $size;
} 



public function format_size($size) {
    global $units;

    $mod = 1024;

    for ($i = 0; $size > $mod; $i++) {
        $size /= $mod;
    }

    $endIndex = strpos($size, ".")+3;

    return substr( $size, 0, $endIndex).' '.$units[$i];
}


public function __construct($username, $password, $status)
{
$this->username = $username;
$this->password = $password;
$this->status = $status;
}



public function start()
{

$this->discord = new Discord($this->username, $this->password);
// Init the WebSocket instance.
$this->ws = new WebSocket($this->discord);

$this->ws->on('ready', function ($discord) use ($ws) {
	$this->discord->updatePresence($this->ws, $this->status, false);
	echo "            #    Login complete, Listening...    #".PHP_EOL;
	echo "            ######################################" . PHP_EOL;
});


$this->ws->on(Event::GUILD_MEMBER_REMOVE, function ($data, $discord, $new) use($ws) {
include 'events/guild_member_remove.php';
});


$this->ws->on(Event::GUILD_MEMBER_ADD, function ($data, $discord, $new) use($ws) {
include 'events/guild_member_add.php';
});


$this->ws->on(Event::MESSAGE_CREATE, function ($message, $discord, $newdiscord) use ($ws) {
$sendError=1;
$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');
$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$iniA = new INI('inis/afk.ini');
$dA = $iniA->read('inis/afk.ini');
include 'events/message_create.php';
});


$this->ws->on(Event::GUILD_CREATE, function ($guild, $discord, $new) {
include 'events/guild_create.php';
});



$this->ws->on(Event::GUILD_DELETE, function ($guild, $discord, $new) {
include 'events/guild_delete.php';
});


$this->ws->run();
}





} // end of Paradox Class.













// ######################## Some Good Notes for the future
// ##################### BAN A USER ############################
/*
try{
        \Discord\Helpers\Guzzle::put("guilds/$guildid/bans/$memberid?delete-message-days=1");
    }catch (\Discord\Exceptions\DiscordRequestFailedException $e) {
        $logger->err($e);
    }
    */


// **** Emoji cheat sheet: http://www.emoji-cheat-sheet.com/ ****

// ############## Usefull Code & Commands ###############
// Send a Invite PM
// -------------
// $invite = $channel->createInvite();
// $message->author->sendMessage("Invite: {$invite->invite_url}");
// $message->reply('Invite sent in PM.');
// Includes the Composer autoload file
// ----------------------
//
// Bot Leave voice channel
// -------------
// $bot->voice->leave();
// $message->reply('Leaving voice channel...');
//-----------------------
//
// Send message to channel
// $message->channel->sendMessage("msg")
//
// $message->author->id;

// ########## Change discord information ########
// $discord = new Discord();
// $discord->username = 'newusername';
// $discord->email = 'new@email.com';
// $discord->new_password = 'myNewPassword';
// $discord->setAvatar('/path/to/new/avatar');

// $discord->password = 'myCurrentPassword';
// $discord->save();
//#######################

// ###### Message specific user by ID & possibly user_name or just name
// $user = \Discord\Parts\User\User::find(':user_id'); //:user_id should be a value... ie:
// $user = \Discord\Parts\User\User::find('146046383726657536');
// $user->sendMessage('hello!');

// $overrides =  $channel->overwrites->getAll('type', 'member'); get's all members in channel.


// $perm = new \Discord\Parts\Permissions\RolePermission;
// $perm->create_instant_invite = true/false;

// $guild = $discord->guilds->first();
// $role = $guild->roles->first();

// $role->permissions = $perm;
// $role->save();

// get all the servers the user is in.
/*
$guildcount = 0;
        $servers = '';
        foreach ($discord->guilds as $guild) {
            foreach ($guild->members as $member) {
                if ($member->id == $user->id) {
                    $guildcount++;
                    $servers .= $guild->name . ", ";
                }
            }
        }
        $servers = rtrim($servers, ', ');
        $str .= "**Shared Servers:** {$guildcount} _({$servers})_\r\n";
*/

?>
