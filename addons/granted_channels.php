<?php
$c=0;
// ############## Channel restrictions ###################
$servers  = parse_ini_string(file_get_contents( 'inis/masters.ini' ), true);

foreach ($servers as $section)
{
if ($message->full_channel->guild->name == $section['Name'])
{
$c = $c + 1;
}

}

// ################## End channels #####################
?>