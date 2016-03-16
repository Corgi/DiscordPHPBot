<?php


    echo "Kicked From {$guild->name}\r\n";
        $newguild=$guild->id;

$iniP = new INI('inis/Prefix.ini');
$p = $iniP->read('inis/Prefix.ini');
$iniD = new INI('inis/masters.ini');
$dD = $iniD->read('inis/masters.ini');

unset($iniD->data[$newguild]);
$iniD->write('inis/masters.ini');


unset($iniP->data[$newguild]);
$iniP->write('inis/Prefix.ini');



