<?php
session_start();
ini_set('memory_limit', '-1');
header('Content-type: text/html; charset=utf-8');

// ########### Let's load the INI files. We're do the entire process right here from now on.
include 'include/INI.class.php';
$masters  = parse_ini_string(file_get_contents( 'inis/masters.ini' ), true);
// ####################################################################################
echo "            ######################################" . PHP_EOL;
echo "            #     Paradox Bot Command Center     #" . PHP_EOL;
echo "            #         Created by: Proxy          #" . PHP_EOL;
echo "            #           Version: 3.0.0           #" . PHP_EOL;
echo "            #          Framework: DiscordPHP     #" . PHP_EOL;

$ini = new INI('config.ini');
$d = $ini->read('config.ini');
$ini->data['settings']['uptime'] = time();
$ini->write('config.ini');

include 'bot.class.php';

include 'vendor/autoload.php';


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

$bot = new Paradox($d['settings']['email'], $d['settings']['password'], $d['settings']['status']);

// Initiate bot settings & includes.
$bot->Initiate();


// Starts the websocket, listens for commands!
$bot->start();

?>