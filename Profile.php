<?php
session_start();

        require_once("inc/db-connection.php");
        require_once("inc/RF-Data.php");
        require_once("inc/functions.php");


        //framework
        require_once("../libraries/TeamSpeak3/TeamSpeak3.php");
                $ts3_VirtualServer = TeamSpeak3::factory("serverquery://". $config['teamspeak']['loginname'] .":". $config['teamspeak']['loginpass'] ."@". $config['teamspeak']['ip'] .":". $config['teamspeak']['queryport'] ."/?server_port=". $config['teamspeak']['serverport'] ."&nickname=". urlencode($config['teamspeak']['displayname']) ."");
$ts3 = $ts3_VirtualServer;
        $_SESSION['verfied'] = "0";

if(isset($_GET['id'])){
foreach($ts3->clientList() as $client) {
if($client['client_unique_identifier'] == $_GET['id']) {
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
}
                if($_SESSION['verfied'] == "0"){
echo'
<title> RA - Error </title>
<style>
html, body{
background-color:#D3D3D3;
}
</style>

<center>
<h2> #Royal Area </h2>
<h1 style="color:red"> لم يتم العثور على ملف العضو المطلوب  </h1> </center>
';
sleep(2);
            header('location: ./');

}

$pagename = ''.$client_info["client_nickname"].'';
 $firstconnected = gmdate("Y-m-d\ h:i:s\ ",$client_info['client_created']);
 $lastconnect = gmdate("Y-m-d\ h:i:s\ ",$client_info['client_lastconnected']);
$profile = true;
        require_once("inc/header.php");

?>

        <!-- start:main -->
        <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->
                <ol class="breadcrumb">
                    <li><a href="./">الصفحة الرئيسية</a></li>
                    <li class="active">مشاركة ملف شخصي</li>
                </ol>
                <!-- end:breadcrumb -->   

                <div class="row" id="home-content">
                        <!--work progress start-->

                            </div>
<center>
<h1 class="page-header"><?php echo $nickname; ?>  الملف الشخصي الخاص ب </h1>
<hr>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="image">
                                <img src="img/Profile.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                  <img class="avatar border-white" src="<?php 
			  
			  if($client_info["client_flag_avatar"])
		{
			try{
				$download = $ts3_VirtualServer->transferInitDownload($client_info->getId(), 0, $client_info->avatarGetName());
				echo "avatar.php?ftdata=" . base64_encode(serialize($download)) ."";
			}catch (Exception $e) {	
				echo 'img/co.png';
			}
		}else{
			echo 'img/co.png';
		}
			  
			  ?>" alt="..."/>

                                <h4 class="title"><?php 
$status = $client_info->getIcon();
echo'<img src="client_status/'.$status.'.png" style="width:20px;height:20px;"/>';

echo $client_info["client_nickname"];
?>

<br />
                                     <small>
<?php
$ggids = explode(",", $client_info["client_servergroups"]);
if(in_array($RAadmin,$ggids))
{
echo '<strong><p style="color:#151B54">إداري</p></strong>';
}
elseif(in_array($vipid,$ggids))
{
echo '<p style="color:#E8A317">VIP</p>';

}
else{
echo 'عضو';

}

?>



</small>
                                  </h4>
                                </div>
                                <p class="description text-center">
                               <?php
							   $_SESSION['ggids'] = $ggids;
				  if(in_array($rank0,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank0 . '">';
				  echo "<h style='color:#ff0000'</h>0";
				  }
				  if(in_array($rank1,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank1 . '">';
				  echo "<h style='color:#ff0000'</h>1";

				  }
				  if(in_array($rank2,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank2 . '">';
				  echo "<h style='color:#ff0000'</h>2";

				  }
				  if(in_array($rank3,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank3 . '">';
				  echo "<h style='color:#ff0000'</h>3";

				  }
				  if(in_array($rank4,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank4 . '">';
				  echo "<h style='color:#ff0000'</h>4";

				  }
				  if(in_array($rank5,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank5 . '">';
				  echo "<h style='color:#ff0000'</h>5";
				  }
				  if(in_array($rank6,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank6 . '">';
				  echo "<h style='color:#ff0000'</h>6";
				  }
				  if(in_array($rank7,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank7 . '">';
				  echo "<h style='color:#ff0000'</h>7";
				  }
				  if(in_array($rank8,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank8 . '">';
				  echo "<h style='color:#ff0000'</h>8";
				  }
				  if(in_array($rank9,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank9 . '">';
				  echo "<h style='color:#ff0000'</h>9";
				  }
				  if(in_array($rank10,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank10 . '">';
				  echo "<h style='color:#ff0000'</h>10";
				  }
				  if(in_array($rank11,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank11 . '">';
				  echo "<h style='color:#ff0000'</h>11";
				  }
				  if(in_array($rank12,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank12 . '">';
				  echo "<h style='color:#ff0000'</h>12";
				  }
				  if(in_array($rank13,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank13 . '">';
				  echo "<h style='color:#ff0000'</h>13";
				  }
				  if(in_array($rank14,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank14 . '">';
				  echo "<h style='color:#ff0000'</h>14";
				  }
				  if(in_array($rank15,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank15 . '">';
				  echo "<h style='color:#ff0000'</h>15";
				  }
				  if(in_array($rank16,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank16 . '">';
				  echo "<h style='color:#ff0000'</h>16";
				  }
				  if(in_array($rank17,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank17 . '">';
				  echo "<h style='color:#ff0000'</h>17";
				  }
				  if(in_array($rank18,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank18 . '">';
				  echo "<h style='color:#ff0000'</h>18";
				  }
				  if(in_array($rank19,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank19 . '">';
				  echo "<h style='color:#ff0000'</h>19";
				  }
				  if(in_array($rank20,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank20 . '">';
				  echo "<h style='color:#ff0000'</h>20";
				  }
				  if(in_array($rank21,$_SESSION['ggids'])){
				  echo "<h style='color:#ff0000'</h>21";
				  }
				  if(in_array($rank22,$_SESSION['ggids'])){
				  echo "<h style='color:#ff0000'</h>22";
				  }
				  if(in_array($rank23,$_SESSION['ggids'])){
				  echo "<h style='color:#ff0000'</h>23";
				  }
				  if(in_array($rank24,$_SESSION['ggids'])){
				  echo "<h style='color:#ff0000'</h>24";
				  }
				  if(in_array($rank25,$_SESSION['ggids'])){
				  echo "<h style='color:#ff0000'</h>25";
				  }
				  if(in_array($rank26,$_SESSION['ggids'])){
				  echo "<h style='color:#ff0000'</h>26";
				  }
				  if(in_array($rank27,$_SESSION['ggids'])){
				  echo "<h style='color:#ff0000'</h>27";
				  }
				  if(in_array($rank28,$_SESSION['ggids'])){
				  echo "<h style='color:#ff0000'</h>28";
				  }
				  if(in_array($rank29,$_SESSION['ggids'])){
				  echo "<h style='color:#ff0000'</h>29";
				  }
				  if(in_array($rank30,$_SESSION['ggids'])){
				  echo "<h style='color:red'</h>MAX";
				  }

                    ?>    :  المستوى الحالي <br>
                         <?php
				  if(in_array($rank0,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank1 . '">';
				  echo "<h style='color:#ff0000'</h>1";
				  }
				  if(in_array($rank1,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank2 . '">';
				  echo "<h style='color:#ff0000'</h>2";
				  }
				  if(in_array($rank2,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank3 . '">';
				  echo "<h style='color:#ff0000'</h>3";
				  }
				  if(in_array($rank3,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank4 . '">';
				  echo "<h style='color:#ff0000'</h>4";
				  }
				  if(in_array($rank4,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank5 . '">';
				  echo "<h style='color:#ff0000'</h>5";
				  }
				  if(in_array($rank5,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank6 . '">';
				  echo "<h style='color:#ff0000'</h>6";
				  }
				  if(in_array($rank6,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank7 . '">';
				  echo "<h style='color:#ff0000'</h>7";
				  }
				  if(in_array($rank7,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank8 . '">';
				  echo "<h style='color:#ff0000'</h>8";
				  }
				  if(in_array($rank8,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank9 . '">';
				  echo "<h style='color:#ff0000'</h>9";
				  }
				  if(in_array($rank9,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank10. '">';
				  echo "<h style='color:#ff0000'</h>10";
				  }
				  if(in_array($rank10,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank11 . '">';
				  echo "<h style='color:#ff0000'</h>11";
				  }
				  if(in_array($rank11,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank12 . '">';
				  echo "<h style='color:#ff0000'</h>12";
				  }
				  if(in_array($rank12,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank13 . '">';
				  echo "<h style='color:#ff0000'</h>13";
				  }
				  if(in_array($rank13,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank14 . '">';
				  echo "<h style='color:#ff0000'</h>14";
				  }
				  if(in_array($rank14,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank15 . '">';
				  echo "<h style='color:#ff0000'</h>15";
				  }
				  if(in_array($rank15,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank16 . '">';
				  echo "<h style='color:#ff0000'</h>16";
				  }
				  if(in_array($rank16,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank17 . '">';
				  echo "<h style='color:#ff0000'</h>17";
				  }
				  if(in_array($rank17,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank18 . '">';
				  echo "<h style='color:#ff0000'</h>18";
				  }
				  if(in_array($rank18,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank19 . '">';
				  echo "<h style='color:#ff0000'</h>19";
				  }
				  if(in_array($rank19,$_SESSION['ggids'])){
                                  echo'<img src="icon.php?id='. $rank20 . '">';
				  echo "<h style='color:#ff0000'</h>20";
				  }
				  if(in_array($rank20,$_SESSION['ggids'])){
				  echo "<h style='color:#ff0000'</h>21";
				  }
				  if(in_array($rank21,$_SESSION['ggids'])){
				  echo "<h style='color:#ff0000'</h>22";
				  }
				  if(in_array($rank22,$_SESSION['ggids'])){
				  echo "<h style='color:#ff0000'</h>23";
				  }
				  if(in_array($rank23,$_SESSION['ggids'])){
				  echo "<h style='color:#ff0000'</h>24";
				  }
				  if(in_array($rank24,$_SESSION['ggids'])){
				  echo "<h style='color:#ff0000'</h>25";
				  }
				  if(in_array($rank25,$_SESSION['ggids'])){
				  echo "<h style='color:#ff0000'</h>26";
				  }
				  if(in_array($rank26,$_SESSION['ggids'])){
				  echo "<h style='color:#ff0000'</h>27";
				  }
				  if(in_array($rank27,$_SESSION['ggids'])){
				  echo "<h style='color:#ff0000'</h>28";
				  }
				  if(in_array($rank28,$_SESSION['ggids'])){
				  echo "<h style='color:#ff0000'</h>29";
				  }
				  if(in_array($rank29,$_SESSION['ggids'])){
				  echo "<h style='color:#ff0000'</h>30";
				  }
				  if(in_array($rank30,$_SESSION['ggids'])){
				  echo "<h style='color:red'</h>MAX";
				  }

                    ?>   : المستوى القادم   <br>

								  
                                </p>
                            </div>
                            <hr>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">ServerGroups | الشعارات</h4>
                            </div>
                            <div class="content">
                                <ul class="list-unstyled team-members">
                                            <li>
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <div class="avatar">
                                              </div>
                                                        
                                                    </div>
                                                    <div class="col-xs-6">

                        <?php


            $server_groups = $ts3->serverGroupList();
            $servergroups = array();
 
            foreach($server_groups as $group) {
                if($group->type != 1) { continue; }
                    $servergroups[] = array('name' => (string)$group, 'id' => $group->sgid, 'type' => $group->type);
                
            } 
			$_SESSION['grupos'] = $servergroups;
        
            foreach($servergroups as $group) {      
                
                $miembros = $ts3->serverGroupClientList($group["id"]);
                $estaengrupo = False;
                foreach($miembros as $m) {
                    if($m["client_unique_identifier"] == $client_uid) { 
                        $estaengrupo = True; 
                    }                                   
                }
                
                if($estaengrupo) {
$icon = $ts3_VirtualServer->serverGroupGetById($group["id"])->iconDownload();
if (!empty($icon)){
                        echo'


             <img src="icon.php?id='. $group["id"] . '">'.$group["name"].'
                                                        <br />';
}else{
echo ''.$group["name"].'<br>';
}

}
}
 ?>
                                                    </div>
                                                      </div> 
                                                </div>
                                            </li>
											</div>
											</div>
                       
                        <div class="col-lg-8 col-md-7">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Profile | ملف شخصي </h4>
                                </div>
                                <div class="content">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>الكلان </label>
                                                    <input type="text" class="form-control border-input" disabled placeholder="ClanName" value="ClanName">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>الإسم</label>
                                                    <input type="text" class="form-control border-input" disabled placeholder="UserName" value="<?php echo $client_info["client_nickname"];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">البلد</label>
                                                    <input type="text" class="form-control border-input" disabled placeholder="Country" value="<?php echo $client_info["client_country"];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>النظام</label>
                                                    <input type="text" class="form-control border-input" disabled placeholder="OS" value="<?php echo $client_info["client_platform"];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>الرقم</label>
                                                    <input type="text" class="form-control border-input" disabled placeholder="Cdib" value="<?php echo $client_info["client_database_id"];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>الأيدي</label>

                                                    <input type="text" class="form-control border-input" disabled  placeholder="UID" value="<?php echo $client_info["client_unique_identifier"];?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>الأيبي</label>
                                                    <input type="text" class="form-control border-input" disabled placeholder="IP" value="*************">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>عدد مرات الدخول</label>
                                                    <input type="text" class="form-control border-input" disabled placeholder="JT" value="<?php echo $client_info["client_totalconnections"];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>اول دخول </label>
                                                    <input type="text" class="form-control border-input" disabled placeholder="DJC" value="<?php echo $firstconnected; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                 <center>   <label>الوصف</label></center>
                                                    <textarea rows="5" class="form-control border-input" disabled placeholder="Here can his your description"><?php echo $client_info["client_description"];?></textarea>
                                                												<?php echo '<center><p>: آخر دخول له  </p>'.$lastconnect.'</center>';?>

                                        </div>
                                    <div class="clearfix"></div>
                                
                            </div>
                        </div>
                    </div>


                </div>
        </div>






</center>
                        <!--work progress end-->

                    </div>
					
                        <!-- end:user info table -->
                    </div>
                </div>

            </div>
        </div>
        <!-- end:main -->
<?php include 'inc/footer.php';?>

</body>

</html>	