<?php
session_start();
$starttime = microtime(true);

require_once('../RNKS/other/config.php');
require_once('../RNKS/other/session.php');
require_once('../RNKS/other/load_addons_config.php');

$addons_config = load_addons_config($mysqlcon,$lang,$dbname,$timezone,$logpath);

if(!isset($_SESSION['tsuid'])) {
	set_session_ts3($ts['voice'], $mysqlcon, $dbname, $language, $adminuuid);
}

if ($substridle == 1) {
	$dbdata = $mysqlcon->query("SELECT s.uuid,s.count_week,s.idle_week,u.name,u.online,u.cldgroup FROM $dbname.stats_user AS s INNER JOIN $dbname.user AS u ON s.uuid = u.uuid WHERE s.removed='0' ORDER BY (s.count_week - s.idle_week) DESC");
	$texttime = $lang['sttw0013'];
} else {
	$dbdata = $mysqlcon->query("SELECT s.uuid,s.count_week,s.idle_week,u.name,u.online,u.cldgroup FROM $dbname.stats_user AS s INNER JOIN $dbname.user AS u ON s.uuid = u.uuid WHERE s.removed='0' ORDER BY s.count_week DESC");
	$texttime = $lang['sttw0003'];
}
$sumentries = $dbdata->rowCount() - 10;
$db_arr = $dbdata->fetchAll();
$count10 = 0;
$top10_sum = 0;
$top10_idle_sum = 0;


foreach ($db_arr as $client) {
	$sgroups  = explode(",", $client['cldgroup']);
	if (!in_array($client['uuid'], $exceptuuid) && !array_intersect($sgroups, $exceptgroup)) {
		if ($count10 == 10) break;
		if ($substridle == 1) {
			$hours = $client['count_week'] - $client['idle_week'];
		} else {
			$hours = $client['count_week'];
		}
		$top10_sum = round(($client['count_week']/3600)) + $top10_sum;
		$top10_idle_sum = round(($client['idle_week']/3600)) + $top10_idle_sum;
		$client_data[$count10] = array(
			'name'		=>	$client['name'],
			'count'		=>	$hours,
			'online'	=>	$client['online']
		);
		$count10++;
	}
}

for($count10 = $count10; $count10 <= 10; $count10++) {
	$client_data[$count10] = array(
		'name'		=>	"لا يوجد",
		'count'		=>	"0",
		'online'	=>	"0"
	);
}

$all_sum_data = $mysqlcon->query("SELECT SUM(count_week) FROM $dbname.stats_user");
$all_sum_data_res = $all_sum_data->fetchAll();
$others_sum = round(($all_sum_data_res[0][0]/3600)) - $top10_sum;

$all_idle_sum_data = $mysqlcon->query("SELECT SUM(idle_week) FROM $dbname.stats_user");
$all_idle_sum_data_res = $all_idle_sum_data->fetchAll();
$others_idle_sum = round(($all_idle_sum_data_res[0][0]/3600)) - $top10_idle_sum;

function get_percentage($max_value, $value) {
	return (round(($value/$max_value)*100));
}
        require_once("inc/php-header.php");
        require_once("inc/header.php");

?>
 
        <!-- start:main -->
        <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->
                <ol class="breadcrumb">
                    <li>الصفحة الرئيسية</li>
                    <li>الأعضاء</li>
                    <li class="active">أفضل الأعضاء</li>

                </ol>
                <!-- end:breadcrumb -->   

                <div class="row" id="home-content">
			<div id="page-wrapper">
				<div class="graphs">
					<center><h3 class="blank1">Top Member's | أفضل الأعضاء</h3><small>ل هذا الأسبوع </small><hr>
					 <div class="xs tabls">
						<div class="bs-example4" data-example-id="contextual-table">
						<table class="table">
						  <thead>
							<tr>
                                                           <th> الحالة </th>
							  <th>النقاط </th>
							  <th>المستوى</th>
							  <th>اسم العضو</th>
							  <th>#</th>


							</tr>
						  </thead>
						  <tbody>
							<tr class="active">
                                                          <th><?PHP echo ($client_data[0]['online'] == '1') ? ' <span class="text-success">'.$lang['stix0024'].'</span>' : ' <span class="text-danger">'.$lang['stix0025'].'</span>' ?></th>
							  <th><?PHP echo round(($client_data[0]['count']/3600)) .'&nbsp;'.$lang['']?> </th>
							  <th><?php

$response = $rnk->prepare('SELECT * FROM user WHERE name = :nm ');
$response->bindValue(':nm', $client_data[0]['name'], PDO::PARAM_STR);
$response->execute();
$member1 = $response->fetch();
$response->CloseCursor();
if($member1){
 $_SESSION['ggids'] = explode(",", $member1['cldgroup']);


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
}

                                                     ?>
                                                            </th>
	                                                  <th><?PHP echo '' .htmlspecialchars($client_data[0]['name']) .''?></th>
							  <th scope="row">1</th>

                                                        </tr>
							<tr>
                                                          <th><?PHP echo ($client_data[1]['online'] == '1') ? ' <span class="text-success">'.$lang['stix0024'].'</span>' : ' <span class="text-danger">'.$lang['stix0025'].'</span>' ?></th>
							  <th><?PHP echo round(($client_data[1]['count']/3600)) .'&nbsp;'.$lang['']?> </th>
							  <th><?php

$response = $rnk->prepare('SELECT * FROM user WHERE name = :nm ');
$response->bindValue(':nm', $client_data[1]['name'], PDO::PARAM_STR);
$response->execute();
$member1 = $response->fetch();
$response->CloseCursor();
if($member1){
 $_SESSION['ggids'] = explode(",", $member1['cldgroup']);
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
}

                                                     ?>
                                                            </th>
	                                                  <th><?PHP echo '' .htmlspecialchars($client_data[1]['name']) .''?></th>
							  <th scope="row">2</th>

                                                        </tr>
							<tr class="success">
                                                          <th><?PHP echo ($client_data[2]['online'] == '1') ? ' <span class="text-success">'.$lang['stix0024'].'</span>' : ' <span class="text-danger">'.$lang['stix0025'].'</span>' ?></th>
							  <th><?PHP echo round(($client_data[2]['count']/3600)) .'&nbsp;'.$lang['']?> </th>
							  <th><?php

$response = $rnk->prepare('SELECT * FROM user WHERE name = :nm ');
$response->bindValue(':nm', $client_data[2]['name'], PDO::PARAM_STR);
$response->execute();
$member1 = $response->fetch();
$response->CloseCursor();
if($member1){
 $_SESSION['ggids'] = explode(",", $member1['cldgroup']);
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
}

                                                     ?>
                                                            </th>
	                                                  <th><?PHP echo '' .htmlspecialchars($client_data[2]['name']) .''?></th>
							  <th scope="row">3</th>

                                                        </tr>
                                                          <th><?PHP echo ($client_data[3]['online'] == '1') ? ' <span class="text-success">'.$lang['stix0024'].'</span>' : ' <span class="text-danger">'.$lang['stix0025'].'</span>' ?></th>
							  <th><?PHP echo round(($client_data[3]['count']/3600)) .'&nbsp;'.$lang['']?> </th>
							  <th><?php

$response = $rnk->prepare('SELECT * FROM user WHERE name = :nm ');
$response->bindValue(':nm', $client_data[3]['name'], PDO::PARAM_STR);
$response->execute();
$member1 = $response->fetch();
$response->CloseCursor();
if($member1){
 $_SESSION['ggids'] = explode(",", $member1['cldgroup']);
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
                                    }

                                                     ?>
                                                            </th>
	                                                  <th><?PHP echo '' .htmlspecialchars($client_data[3]['name']).''?></th>
							  <th scope="row">4</th>

                                                        </tr>
							<tr class="info">
                                                          <th><?PHP echo ($client_data[4]['online'] == '1') ? ' <span class="text-success">'.$lang['stix0024'].'</span>' : ' <span class="text-danger">'.$lang['stix0025'].'</span>' ?></th>
							  <th><?PHP echo round(($client_data[4]['count']/3600)) .'&nbsp;'.$lang['']?> </th>
							  <th><?php

$response = $rnk->prepare('SELECT * FROM user WHERE name = :nm ');
$response->bindValue(':nm', $client_data[4]['name'], PDO::PARAM_STR);
$response->execute();
$member1 = $response->fetch();
$response->CloseCursor();
if($member1){
 $_SESSION['ggids'] = explode(",", $member1['cldgroup']);
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
                                }

                                                     ?>
                                                            </th>
	                                                  <th><?PHP echo '' .htmlspecialchars($client_data[4]['name']) .''?></th>
							  <th scope="row">5</th>

                                                        </tr>
							<tr>
                                                          <th><?PHP echo ($client_data[5]['online'] == '1') ? ' <span class="text-success">'.$lang['stix0024'].'</span>' : ' <span class="text-danger">'.$lang['stix0025'].'</span>' ?></th>
							  <th><?PHP echo round(($client_data[5]['count']/3600)) .'&nbsp;'.$lang['']?> </th>
							  <th><?php

$response = $rnk->prepare('SELECT * FROM user WHERE name = :nm ');
$response->bindValue(':nm', $client_data[5]['name'], PDO::PARAM_STR);
$response->execute();
$member1 = $response->fetch();
$response->CloseCursor();
if($member1){
 $_SESSION['ggids'] = explode(",", $member1['cldgroup']);
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
}

                                                     ?>
                                                            </th>
	                                                  <th><?PHP echo '' .htmlspecialchars($client_data[5]['name']) .''?></th>
							  <th scope="row">6</th>

                                                        </tr>

							</tr>
							<tr class="warning">

                                                          <th><?PHP echo ($client_data[6]['online'] == '1') ? ' <span class="text-success">'.$lang['stix0024'].'</span>' : ' <span class="text-danger">'.$lang['stix0025'].'</span>' ?></th>
							  <th><?PHP echo round(($client_data[6]['count']/3600)) .'&nbsp;'.$lang['']?> </th>
							  <th><?php

$response = $rnk->prepare('SELECT * FROM user WHERE name = :nm ');
$response->bindValue(':nm', $client_data[6]['name'], PDO::PARAM_STR);
$response->execute();
$member1 = $response->fetch();
$response->CloseCursor();
if($member1){
 $_SESSION['ggids'] = explode(",", $member1['cldgroup']);
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

}
                                                     ?>
                                                            </th>
	                                                  <th><?PHP echo '' .htmlspecialchars($client_data[6]['name']) .''?></th>
							  <th scope="row">7</th>

                                                        </tr>
                                                          <th><?PHP echo ($client_data[7]['online'] == '1') ? ' <span class="text-success">'.$lang['stix0024'].'</span>' : ' <span class="text-danger">'.$lang['stix0025'].'</span>' ?></th>
							  <th><?PHP echo round(($client_data[7]['count']/3600)) .'&nbsp;'.$lang['']?> </th>
							  <th><?php

$response = $rnk->prepare('SELECT * FROM user WHERE name = :nm ');
$response->bindValue(':nm', $client_data[7]['name'], PDO::PARAM_STR);
$response->execute();
$member1 = $response->fetch();
$response->CloseCursor();
if($member1){
 $_SESSION['ggids'] = explode(",", $member1['cldgroup']);
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
}

                                                     ?>
                                                            </th>
	                                                  <th><?PHP echo '' .htmlspecialchars($client_data[7]['name'] ).''?></th>
							  <th scope="row">8</th>

                                                        </tr>
							<tr class="info">
                                                          <th><?PHP echo ($client_data[8]['online'] == '1') ? ' <span class="text-success">'.$lang['stix0024'].'</span>' : ' <span class="text-danger">'.$lang['stix0025'].'</span>' ?></th>
							  <th><?PHP echo round(($client_data[8]['count']/3600)) .'&nbsp;'.$lang['']?> </th>
							  <th><?php

$response = $rnk->prepare('SELECT * FROM user WHERE name = :nm ');
$response->bindValue(':nm', $client_data[8]['name'], PDO::PARAM_STR);
$response->execute();
$member1 = $response->fetch();
$response->CloseCursor();
if($member1){
 $_SESSION['ggids'] = explode(",", $member1['cldgroup']);
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
}

                                                     ?>
                                                            </th>
	                                                  <th><?PHP echo '' .htmlspecialchars($client_data[8]['name']) .''?></th>
							  <th scope="row">9</th>

                                                        </tr>
                                                          <th><?PHP echo ($client_data[9]['online'] == '1') ? ' <span class="text-success">'.$lang['stix0024'].'</span>' : ' <span class="text-danger">'.$lang['stix0025'].'</span>' ?></th>
							  <th><?PHP echo round(($client_data[9]['count']/3600)) .'&nbsp;'.$lang['']?> </th>
							  <th><?php

$response = $rnk->prepare('SELECT * FROM user WHERE name = :nm ');
$response->bindValue(':nm', $client_data[9]['name'], PDO::PARAM_STR);
$response->execute();
$member1 = $response->fetch();
$response->CloseCursor();
if($member1){
 $_SESSION['ggids'] = explode(",", $member1['cldgroup']);
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

}
                                                     ?>
                                                            </th>
	                                                  <th><?PHP echo '' .htmlspecialchars($client_data[9]['name']) .''?></th>
							  <th scope="row">10</th>

                                                        </tr>


						  </tbody>
						</table>
					   </div>







        </div>
        </div>
        </div>

        <!-- end:main -->

		<?php
        require_once("inc/footer.php");
?>

</body>

</html>	
