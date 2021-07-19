<?php

session_start();

error_reporting(-1);
        require_once("inc/db-connection.php");
        require_once("inc/RF-Data.php");
        require_once("inc/functions.php");


        //framework
        require_once("../libraries/TeamSpeak3/TeamSpeak3.php");
                $ts3_VirtualServer = TeamSpeak3::factory("serverquery://". $config['teamspeak']['loginname'] .":". $config['teamspeak']['loginpass'] ."@". $config['teamspeak']['ip'] .":". $config['teamspeak']['queryport'] ."/?server_port=". $config['teamspeak']['serverport'] ."&nickname=". urlencode($config['teamspeak']['displayname']) ."");
$ts3 = $ts3_VirtualServer;
        $result = array();
        $_SESSION['verfied'] = "0";




        try {

if(isset($_SESSION['userone']) == 1){
foreach($ts3->clientList() as $client) {
if($client['client_unique_identifier'] == $_SESSION['ci']) {

$client_verified = $client;
$client_info = $client_verified;
$cl = $client_verified;
$nicknames[] = $client["client_nickname"];
$nickname = $client["client_nickname"];
$description = $client["client_description"];
$totalconnections = $client["client_totalconnections"];
$platform = $client["client_platform"];
$country = strtolower($client["client_country"]);
$dbid = $client["client_database_id"];
$_SESSION ['ggids'] = explode(",", $client_verified["client_servergroups"]);
$uid = $client["client_unique_identifier"];
 $ts3_Client = $ts3_VirtualServer->ClientGetByUid($uid);
$ggids = explode(",", $client["client_servergroups"]);
		$unid = $client_info["client_unique_identifier"];
                $_SESSION['client_uid'] = $unid;
        $client_uid = $unid;
$client_db = $client_info["client_database_id"];
$nickname = $cl->client_nickname;
$_SESSION['ggids'] = explode(",", $client_info["client_servergroups"]);
$client_verified = $client_info;
$ggids = explode(",", $client_info["client_servergroups"]);


                                                $_SESSION['verfied']++;

}
}
}else{

                foreach ($ts3_VirtualServer->clientList() as $cl) {
                                        if ($cl->getProperty('connection_client_ip') == GetIP()) {
                                                $result[] = $cl->client_nickname;
                                                $client_info = $cl;
                                                $_SESSION['verfied']++;
	                                            $uid = $client_info->client_unique_identifier;
                                                $ts3_Client = $ts3_VirtualServer->ClientGetByUid($uid);

												$unid = $client_info["client_unique_identifier"];
                $_SESSION['client_uid'] = $unid;
        $client_uid = $unid;
$client_db = $client_info["client_database_id"];
$nickname = $cl->client_nickname;
$_SESSION['ggids'] = explode(",", $client_info["client_servergroups"]);
$client_verified = $client_info;
                $_SESSION['client_uid'] = $unid;
        $client_uid = $unid;
$client = $client_info;
$client_verified = $client;
$nicknames[] = $client["client_nickname"];
$nickname = $client["client_nickname"];
$description = $client["client_description"];
$totalconnections = $client["client_totalconnections"];
$platform = $client["client_platform"];
$country = strtolower($client["client_country"]);
$dbid = $client["client_database_id"];
$_SESSION ['ggids'] = explode(",", $client_verified["client_servergroups"]);
$uid = $client["client_unique_identifier"];
$ggids = explode(",", $client["client_servergroups"]);
$ggids = explode(",", $client_info["client_servergroups"]);


}
                                }
                        }
                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }
                if($_SESSION['verfied'] == "0"){
                //not in ts
{
        require_once("Disconnect.php");
echo'<meta http-equiv="refresh" content="5;>';
die;
}	;
                echo "</div>";
                }

                if($_SESSION['verfied'] == "1"){   }
                if($_SESSION['verfied'] > "1" and empty($_SESSION['userone']) || empty($_SESSION['ip']) and !$usertow){
            header('location: ./usertow.php');
                }      
if(in_array($BanWeb,$ggids))
{
echo'
<title> RA - Banned </title>
<style>
html, body{
background-color:#D3D3D3;
}
</style>

<center>
<h2> #Royal Area </h2>
<h1 style="color:red"> لقد تم حظرك من دخول الموقع ! قم بمراجعة الإدارة  </h1> </center>
';
die;
}
if(in_array($NotAct,$ggids))
{
echo'
<title> RA - NotAct </title>
<style>
html, body{
background-color:#D3D3D3;
}
</style>

<center>
<h2> #Royal Area </h2>
<h1 style="color:red"> لم يتم تفعيلك بعد !   </h1> </center>
';
die;


}



?>

