<?php

        require_once("inc/RF-Data.php");


require_once("libraries/TeamSpeak3/TeamSpeak3.php");
                $ts3_VirtualServer = TeamSpeak3::factory("serverquery://". $config['teamspeak']['loginname'] .":". $config['teamspeak']['loginpass'] ."@". $config['teamspeak']['ip'] .":". $config['teamspeak']['queryport'] ."/?server_port=". $config['teamspeak']['serverport'] ."&nickname=". urlencode($config['teamspeak']['displayname']) ."");
try{
//echo $ts3_VirtualServer->serverGroupGetByName('TS')->sgid;

//$ts3->serverGroupClientAdd(10, 1236);



echo' <br> <br>';
$ts3_VirtualServer->clientListReset();
$ts3_VirtualServer->channelListReset();
                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }

foreach($ts3_VirtualServer->channelList() as $channels){
if($channels['cid'] == 1923){
//echo '<pre>'.print_r($channels).'</pre>';
echo '<br>';
}
}

?>
