<?php
//screen -S codssystem php codssystem.php
set_time_limit(0);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);

require('libraries/TeamSpeak3/TeamSpeak3.php');
require("data.php");
require("functions.php");
require("db-connect.php");

$con = new mysqli($host, $user, $pass, $db1);
if($con->connect_error){
	die("Database Error: ".$con->connect_error);
}
  $pdo = new PDO('mysql:host='.$host.';dbname='.$db1.';charset=utf8', ''.$user.'', ''.$pass.'');

while(true){


	$sql = "SELECT * FROM cods";
	$res = $con->query($sql);	
	$num = $res->num_rows;
	
	if($num > 0){
		$nowt = date('Y-m-d H:i:s');
		while($datax = $res->fetch_assoc()){
			$ti = $datax["endtime"];
			$user = $datax["dbid"];
			$sgid = $datax["sgid"];
			$id = $datax["id"];
			if($nowt == $ti){
				try{
					$Coodes =  'Panel-TaskS['. mt_rand(0, 99999).']';					
                $ts3 = TeamSpeak3::factory("serverquery://". $config['teamspeak']['loginname'] .":". $config['teamspeak']['loginpass'] ."@". $config['teamspeak']['ip'] .":". $config['teamspeak']['queryport'] ."/?server_port=". $config['teamspeak']['serverport'] ."&nickname=". urlencode($config['teamspeak']['displayname']) ."");
					$ts3->serverGroupClientDel($sgid, $user);

    $stmt = $pdo->prepare('DELETE FROM cods WHERE dbid= :db');
    $stmt->bindValue(':db', $user, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->CloseCursor(); 

					$ts3->logout();
					unset($ts3);
				}catch (TeamSpeak3_Exception $e) { 
					
				}
			  
			}
			
		}
	}


	sleep(1);
}

?>