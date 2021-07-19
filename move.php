<?php
if(isset($_GET['sp']) and !empty($_GET['sp']) and ctype_digit($_GET['sp'])) {

        require_once("inc/RF-Data.php");


require_once("libraries/TeamSpeak3/TeamSpeak3.php");
                $ts3_VirtualServer = TeamSpeak3::factory("serverquery://". $config['teamspeak']['loginname'] .":". $config['teamspeak']['loginpass'] ."@". $config['teamspeak']['ip'] .":". $config['teamspeak']['queryport'] ."/?server_port=". $config['teamspeak']['serverport'] ."&nickname=". urlencode($config['teamspeak']['displayname']) ."");

try{
$ts3_VirtualServer->clientListReset();
$ts3_VirtualServer->channelListReset();
foreach ($ts3_VirtualServer->clientList() as $chl) {
$ggids = explode(",", $chl["client_servergroups"]);
if(in_array($SupportAccess,$ggids)){
$status = $chl->getIcon();
echo'<img src="client_status/'.$status.'.png" style="width:20px;height:20px;"/>';
echo $chl;
echo"<br>";
}
}
                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }



}



?>
