<?php
    session_start();
    
    if (empty($_SESSION['pin'])) {
        require_once('../libraries/TeamSpeak3/TeamSpeak3.php');
        require_once("RF-Data.php");
        try {
            TeamSpeak3::init();
                $ts3_VirtualServer = TeamSpeak3::factory("serverquery://". $config['teamspeak']['loginname'] .":". $config['teamspeak']['loginpass'] ."@". $config['teamspeak']['ip'] .":". $config['teamspeak']['queryport'] ."/?server_port=". $config['teamspeak']['serverport'] ."&nickname=". urlencode($config['teamspeak']['displayname']) ."");
$ts3 = $ts3_VirtualServer;
        } catch(Exception $e) {
            exit();
        };
        $_SESSION['pin'] = generateRandomString();
        $ts3->clientGetByUid($_SESSION['uid'])->poke("Verification Pin: [b]". $_SESSION['pin'] ."[/b]");
    }
    
    
    function generateRandomString() {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 4; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
?>