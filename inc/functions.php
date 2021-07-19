<?php
function GetIP()
{
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key)
    {
        if (array_key_exists($key, $_SERVER) === true)
        {
            foreach (array_map('trim', explode(',', $_SERVER[$key])) as $ip)
            {
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false)
                {
                    return $ip;
                }
            }
        }
    }
}
function secure($str){

         return htmlspecialchars(addslashes(trim($str)));
         
}

		function CountClientsGroup($sgroup) {
		global $ts3_VirtualServer;
    $group = $ts3_VirtualServer->serverGroupGetById($sgroup);
    $count = 0;
    foreach($group->clientList() as $client)
    {
        $count = $count +1;
    }
return $count;
}

	function sgicon($sgid) {
		global $ts3_VirtualServer;

        try {


    $pergroup = $ts3_VirtualServer->serverGroupPermList($sgid,'i_icon_id');
    foreach($pergroup as $per => $key)
    {
if($per == 'i_icon_id'){

return $key['permvalue'];

}
}
                }      
                catch (Exception $e) { 
                        echo '<p>لا يوجد أيقونة ل هذا الشعار</p>';
                        }
}
		function OnlineOf($sgid) {
		global $ts3_VirtualServer;
$online = 0; 
foreach($ts3_VirtualServer->serverGroupGetById($sgid)->clientList() as $ct) { 
if($ts3_VirtualServer->clientList($ct)) {
 $online++; 
}
}
return $online;
}

 ?>