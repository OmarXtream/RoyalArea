<?php
        require_once("inc/php-header.php");
        require_once("inc/header.php");

/*if(!in_array($clansmanager,$ggids))
{		 
echo'<meta http-equiv="refresh" content="0; url=./" />';
die;

}*/
?>
 
        <!-- start:main -->
        <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->
                <ol class="breadcrumb">
                    <li>الصفحة الرئيسية</li>
                    <li>خيارات التحكم</li>
                    <li class="active">إنشاء الكلانات</li>

                </ol>

                <div class="row" id="home-content">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                      <center><strong>      انشااء الكلانات 
                        </h2>
                    </div>
                </div>
<?php
	if(isset($_POST['submit'])){
		$cl_name = secure($_POST['ClanName']);
		$clanowner = secure($_POST['ClanOwner']);
                $sClanName = secure($_POST['sClanName']);
		                foreach ($ts3_VirtualServer->clientList() as $cln) {
                                        if ($cln['client_unique_identifier'] == $clanowner) {
$owner_db = $cln['client_database_id'];
$owner_name = $cln['client_nickname'];

}
}
if(!$owner_db){
echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>        <strong>Wrong UID Given ! | خطأ الرجاء التحقق من الأيدي </strong></center> 
                                </div>
';
echo'<meta http-equiv="refresh" content="2; url=ClanCreate.php" />';

die;		
		}

if($uid == $clanowner){
echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>        <strong>أنت مسؤول اوكيه لكن ماتقدر تسوي لنفسك كلان إلا بإذن الأونر ^_^ </strong></center> 
                                </div>
';
echo'<meta http-equiv="refresh" content="2; url=ClanCreate.php" />';

die;		
		}


		if(empty($cl_name)){
		echo '<div class="alert dark alert-alt alert-warning alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  الحقل الاول<a class="alert-link" href="javascript:void(0)"> لم يتم كتابة شيء به</a>.
                </div>';
		} else {
		
				if (!preg_match("/^[a-zA-Z0-9]*$/",$cl_name)) {
					echo '<div class="alert dark alert-alt alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
					لايسمح الا <a class="alert-link" href="javascript:void(0)"> بالحروف الانجليزية و الارقام في الخيار الاول</a>.
					</div>';
			} else {
			
				if(empty($clanowner) || empty($cl_name) || empty($sClanName) ){
					echo '<div class="alert dark alert-alt alert-warning alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
					هناك حقل<a class="alert-link" href="javascript:void(0)"> مفقود</a>.
					</div>';
				} else {
					if (!preg_match("/^[a-zA-Z0-9]*$/",$sClanName)) {
						  $already = true;
						  echo '<div class="alert dark alert-alt alert-danger alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						  </button>
						   لايسمح الا <a class="alert-link" href="javascript:void(0)"> بالحروف الانجليزية و الارقام في الخيار الثاني</a>.
						</div>';
					} else {




	
try{


$icon = $defulticon;
$specer1 = $ts3_VirtualServer->channelCreate(array(
		"channel_name" => "[cspacerRA*$random]________________________",
	        "channel_maxclients" => "0",
	        "channel_codec" => TeamSpeak3::CODEC_SPEEX_NARROWBAND,
		"channel_flag_permanent" => TRUE,
		"channel_order" => $ClansPlace,
			 ));

$top_cid = $ts3_VirtualServer->channelCreate(array(
  "channel_name"          => "[cspacerclan1]﹝ • ".$sClanName." CLAN • ﹞",
  "channel_topic"          => "$cl_name",
  "channel_codec"          => TeamSpeak3::CODEC_OPUS_VOICE,
  "channel_codec_quality"  => 0x05,
  "channel_flag_permanent" => TRUE,
  "channel_password" => "",
));
$ts3_VirtualServer->channelGetById($top_cid)->channel_order="$specer1";

			$sub_cid1 = $ts3_VirtualServer->channelCreate(array(
			 "channel_name" => "Welcome | New Clan | 1 | كلان جديد",
			 "channel_codec" => TeamSpeak3::CODEC_SPEEX_NARROWBAND,
			 "channel_flag_permanent" => TRUE,
			 "cpid" => $top_cid,
			));
			$sub_cid2 = $ts3_VirtualServer->channelCreate(array(
			 "channel_name" => "New Clan | 2 | كلان جديد",
			 "channel_codec" => TeamSpeak3::CODEC_SPEEX_NARROWBAND,
			 "channel_flag_permanent" => TRUE,
			 "cpid" => $top_cid,
			));
			$sub_cid3 = $ts3_VirtualServer->channelCreate(array(
			 "channel_name" => "New Clan | 3 | كلان جديد",
			 "channel_codec" => TeamSpeak3::CODEC_SPEEX_NARROWBAND,
			 "channel_flag_permanent" => TRUE,
			 "cpid" => $top_cid,
			));
			$sub_cid4 = $ts3_VirtualServer->channelCreate(array(
			 "channel_name" => "New Clan | 4 | كلان جديد",
			 "channel_codec" => TeamSpeak3::CODEC_SPEEX_NARROWBAND,
			 "channel_flag_permanent" => TRUE,
			 "cpid" => $top_cid,
			));
			$sub_cid5 = $ts3_VirtualServer->channelCreate(array(
			 "channel_name" => "New Clan | 5 | كلان جديد",
			 "channel_codec" => TeamSpeak3::CODEC_SPEEX_NARROWBAND,
			 "channel_flag_permanent" => TRUE,
			 "cpid" => $top_cid,
			));
			 $sub_cid6 = $ts3_VirtualServer->channelCreate(array(
			 "channel_name" => "New Clan | 6 | كلان جديد",
			 "channel_codec" => TeamSpeak3::CODEC_SPEEX_NARROWBAND,
			 "channel_flag_permanent" => TRUE,
			 "cpid" => $top_cid,
			));
			$sub_cid7 = $ts3_VirtualServer->channelCreate(array(
			 "channel_name" => "AFK",
			 "channel_topic" => "AFK room[".$cl_name."] for clan",
			 "channel_description" => "غير مفعل",
			 "channel_needed_talk_power" => "75",
			 "channel_codec" => TeamSpeak3::CODEC_SPEEX_NARROWBAND,
			 "channel_flag_permanent" => TRUE,
			 "cpid" => $top_cid,
			 ));

$ts3->channelGetById($top_cid)->modify(array("channel_icon_id" => $icon));
$ts3->channelGetById($sub_cid1)->modify(array("channel_icon_id" => $icon));
$ts3->channelGetById($sub_cid2)->modify(array("channel_icon_id" => $icon));
$ts3->channelGetById($sub_cid3)->modify(array("channel_icon_id" => $icon));
$ts3->channelGetById($sub_cid4)->modify(array("channel_icon_id" => $icon));
$ts3->channelGetById($sub_cid5)->modify(array("channel_icon_id" => $icon));
$ts3->channelGetById($sub_cid6)->modify(array("channel_icon_id" => $icon));
$ts3->channelGetById($sub_cid7)->modify(array("channel_icon_id" => $icon));


$ts3->serverGroupListReset();
$type = 1;
$sgid = $ts3->execute("servergroupadd", array("name" => $sClanName, "type" => $type))->toList();

$permid = 'i_group_sort_id';
$permid2 = 'i_icon_id';

$permvalue = $ClansSort;
$permvalue2 = $icon;

$ts3->serverGroupPermAssign($sgid,
 	$permid,
 	$permvalue,
 	$permnegated = FALSE,
 	$permskip = FALSE 
);
$ts3->serverGroupPermAssign($sgid,
 	$permid2,
 	$permvalue2,
 	$permnegated = FALSE,
 	$permskip = FALSE 
);
$ts3->serverGroupClientAdd($sgid, $owner_db);

$ts3_VirtualServer->clientGetByDbid($owner_db)->move($top_cid);
$ts3_VirtualServer->clientGetByDbid($owner_db)->poke("[B]تم إنشاء الكلان");
$ts3_VirtualServer->clientSetChannelGroup($owner_db,$top_cid,$ownerclan);

$status = 1;
$sgidd = $ts3_VirtualServer->serverGroupGetByName($sClanName)->sgid;
        $stmt= $db->prepare('INSERT INTO clans ( clanname, smallname, owdb, creation_date, specer, afk, wlc, sgroup, status) 
                             VALUES (:nem, :snem, :odb, NOW(), :sr , :af, :wl, :gp, :stu)
                           ');
        $stmt->bindValue(':nem',"$cl_name",PDO::PARAM_STR);
        $stmt->bindValue(':snem',"$sClanName",PDO::PARAM_STR);
        $stmt->bindValue(':odb', "$owner_db", PDO::PARAM_INT);
        $stmt->bindValue(':sr', "$top_cid", PDO::PARAM_INT);
        $stmt->bindValue(':af', "$sub_cid7", PDO::PARAM_INT);
        $stmt->bindValue(':wl', "$sub_cid1", PDO::PARAM_INT);
        $stmt->bindValue(':gp', "$sgidd", PDO::PARAM_INT);
        $stmt->bindValue(':stu', "$status", PDO::PARAM_INT);


        $stmt->execute();        
        $stmt->CloseCursor();

echo '<script language="javascript">';
echo "toastr.success('تم إضافة الكلان بنجاح !');";
echo '</script>';





           }     catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }






					}
				}	
			}
		}
	}

?>
                <section class="panel">
                    <header class="panel-heading">
                      <center> <h2> مافائدة الكلان ؟</h2>
                    </header>
                    <div class="panel-body">
                        <div class="row">
                               <center> <p>تجمع اخوياك في كلان واحد تحت سقف واحد  <br> وتقدر تنافس الكلانات الثانيه وتكسر خشومهم وتسوي فعاليات وتتألق في السيرفر  ^_^</p><br>
<?php

echo'
     <form method="post">
                                            <center><input type="text" class="form-control" placeholder="إسم الكلان" name="ClanName"><br>
                                            <center><input type="text" class="form-control" placeholder="إختصار الإسم" name="sClanName"><br>


                                        <center><input type="text" class="form-control" placeholder="أيدي أونر الكلان" name="ClanOwner"><br>

                                       
                            <center><button type="submit" name="submit" class="btn btn-primary start"><i class="glyphicon glyphicon-upload"></i> إنشاء الكلان</button>

                                <br></center>';
	
         ?>                
 <br>
                                    <div class="row fileupload-buttonbar">




                                        </div>

</form>
                                        </div>    
                                        </div>
                                    </table>
                                </form>
                                <br>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <center><strong><h3 class="panel-title">شروط إنشاء كلان</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li>عدم وجود أي سوابق تمنعك من إنشاء كلان <strong> .حظر إنشاء الكلانات.</strong></li>
                                            <li><strong>( Level 7+)</strong> يجب توفر لفل 7 وما فوق</li>
                                            <li>* ! تتطبق على شروط الكلانات جميعها ‬‎<strong> قوانين السيرفر</strong> </li>
                                            <li>There are no precedents preventing you from <strong>creating a clan.</strong></li>
                                            <li><strong>( Level 7+)</strong> Must be available for <strong>Level 7+</strong></li>
                                            <li><strong>Server Rules</strong> apply to all Clan conditions ! *</li>
                                        </ul>
                                    </div>
                                </div>
<center><strong><span class="label label-warning">تنويه :</span> يمكن إستخدام هذه الخاصية فقط ل مسؤول الكلانات </center>

                        </div>
                    </div>
                </section>               
                <!-- end:multiple file upload -->

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
