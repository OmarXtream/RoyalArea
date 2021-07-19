<?php

        require_once("inc/php-header.php");
        require_once("inc/header.php");

?>

        <!-- start:main -->
        <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->
                <ol class="breadcrumb">
                    <li>الصفحة الرئيسية</li>
                    <li>سوشل ميديا</li>
                    <li class="active">اليوتيوبر</li>

                </ol>
                <!-- end:breadcrumb -->   

                <div class="row" id="home-content">
<?php
if (isset($_POST['rem'])){

    $response = $db->prepare('SELECT * FROM youtube');
    $response->execute();
    $yt = $response->fetchAll();
    $response->CloseCursor();
		
    foreach($yt as $check) {

        if ($check['cdb'] == $client_db) {
$room = $check['CID'];
$ytrank = $check['sgroup'];

$hisname = '[B][COLOR=red][URL=client://82/'.$client_info["client_unique_identifier"].']'.$client_info["client_nickname"].'[/URL][/COLOR][/B]';
$ts3_VirtualServer->channelGetById($room)->message("[B] ". $hisname." تم حذف الغرفة من قبل المالك : ");
$ts3_VirtualServer->channelDelete($room, $force=TRUE);
$ts3->serverGroupClientDel($ytrank, $client_db);
    $stmt = $db->prepare('DELETE FROM youtube WHERE cdb = :cb');
    $stmt->bindValue(':cb',$client_db,PDO::PARAM_INT);
    $stmt->execute();
    $stmt->CloseCursor(); 
$ts3_VirtualServer->clientGetByDbid($client_db)->poke("[B]تم الغاء ربط حسابك في اليوتيوب !");

echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>        <strong>تم الغاء ربط حسابك في اليوتيوب ! </strong></center> 
                                </div>
';
	$_SESSION['yt'] = microtime(true)+600;
        require_once("inc/footer.php");
die;
}
}
}
if (isset($_POST['send']))
{
$IDChannel = secure($_POST['IDChannel']);
if (empty($IDChannel)){
echo'
                                <div class="alert alert-info alert-bordered alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                    <center><strong>الرجاء وضع إسم حسابك في الخانة</strong>   </center>
                                </div>
';
}else{
    $response = $db->prepare('SELECT * FROM youtube');
    $response->execute();
    $yt = $response->fetchAll();
    $response->CloseCursor();
		
    foreach($yt as $check) {

        if ($check['YTID'] == $IDChannel) {

echo'
                                <div class="alert alert-danger alert-bordered alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                    <center><strong>لقد تم ربط هذه القناة سابقا من قبل احد الأعضاء !</strong>   </center>
                                </div>
';
        require_once("inc/footer.php");
die;
}
}
echo '<br>' ;
$url_yt = "https://www.googleapis.com/youtube/v3/channels?part=statistics&id=$IDChannel&key=AIzaSyBGXgUQTzO_KqDJ0bcqN3h-Ao9xDRMoKIA";
    $yt_array = file_get_contents($url_yt);
    $ytcount = json_decode($yt_array, true);
    $followed_by = $ytcount['items'][0]['statistics']['subscriberCount'];
$sub = $followed_by;
    $view = $ytcount['items'][0]['statistics']['viewCount'];
    $videoCount = $ytcount['items'][0]['statistics']['videoCount'];
$vid = $videoCount;

    $url_yt = "https://www.googleapis.com/youtube/v3/channels?part=snippet%2CcontentDetails&id=$IDChannel&key=AIzaSyBGXgUQTzO_KqDJ0bcqN3h-Ao9xDRMoKIA";
    $yt_array = file_get_contents($url_yt);
    $ytcount = json_decode($yt_array, true);
    $des = $ytcount['items'][0]['snippet']['description'];
    $user = $ytcount['items'][0]['snippet']['title'];
    $publishedAt = $ytcount['items'][0]['snippet']['publishedAt'];
    $img = $ytcount['items'][0]['snippet']['thumbnails']["high"]["url"];
$yticon1k = sgicon($yt1k);
$yticon5k = sgicon($yt5k);
$yticon10k = sgicon($yt10k);
$yticon20k = sgicon($yt20k);
$yticon30k = sgicon($yt30k);
$yticon50k = sgicon($yt50k);
$yticon80k = sgicon($yt80k);
$yticon100k = sgicon($yt100k);
$yticon300k = sgicon($yt300k);
$yticon500k = sgicon($yt500k);
$yticon600k = sgicon($yt600k);
$yticon800k = sgicon($yt800k);
$yticon1m = sgicon($yt1m);
$ts3_VirtualServer->clientListReset();
$ts3_VirtualServer->channelListReset();
  if(stristr($des, "$uid") == FALSE) { 

echo'
                                <div class="alert alert-danger alert-bordered alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                    <center><strong>الرجاء التأكد من وضع رقم التحقق الخاص بك في وصف القناة</strong>   </center>
                                </div>
';
}else{

if($followed_by < 5000 && $followed_by >= 1000){
$ts3->serverGroupClientAdd($yt1k, $client_db);
$rankname = $ts3->serverGroupGetById($yt1k);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم ربط القناة <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $yt1k . '"> '.$rankname.'  

                                </div>
</center>
';

$cid = $ts3_VirtualServer->channelCreate(array(
	"channel_name" =>  ''.$nickname.''.$smallrand.'',
	"channel_topic" => "YouTuber |Sub $followed_by +",
	"channel_codec" => TeamSpeak3::CODEC_OPUS_VOICE,
	"channel_flag_permanent" => TRUE,
	"cpid"                   => "$ytrooms",
	));
	$ts3_VirtualServer->clientGetByUid($uid)->move($cid);
	$ts3_VirtualServer->clientGetByUid($uid)->setChannelGroup($cid , $chytowner);
try{
$ts3->channelGetById($cid)->modify(array("channel_icon_id" => $yticon1k));
                }      
                catch (Exception $e) { 
                        }

        $stmt= $db->prepare('INSERT INTO youtube ( name, img, cdb, creation_date, publishedAt, sub, views, videos, sgroup, CID, YTID) 
                             VALUES (:nem, :img, :cdb, NOW(), :At, :sb, :view, :vid, :group, :cid, :ytid)
                           ');
        $stmt->bindValue(':nem',"$user",PDO::PARAM_STR);
        $stmt->bindValue(':img',"$img",PDO::PARAM_STR);
        $stmt->bindValue(':cdb', "$client_db", PDO::PARAM_INT);
        $stmt->bindValue(':At',"$publishedAt",PDO::PARAM_STR);
        $stmt->bindValue(':sb',"$followed_by", PDO::PARAM_INT);
        $stmt->bindValue(':view',"$view", PDO::PARAM_INT);
        $stmt->bindValue(':vid',"$videoCount", PDO::PARAM_INT);
        $stmt->bindValue(':group',"$yt1k", PDO::PARAM_INT);
        $stmt->bindValue(':cid',"$cid", PDO::PARAM_INT);
        $stmt->bindValue(':ytid',"$IDChannel", PDO::PARAM_STR);
        $stmt->execute();        
        $stmt->CloseCursor();



}elseif($followed_by < 10000 && $followed_by >= 5000){
$ts3->serverGroupClientAdd($yt5k, $client_db);
$rankname = $ts3->serverGroupGetById($yt5k);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم ربط القناة <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $yt5k . '"> '.$rankname.'  

                                </div>
</center>
';
$cid = $ts3_VirtualServer->channelCreate(array(
	"channel_name" =>  ''.$nickname.''.$smallrand.'',
	"channel_topic" => "YouTuber |Sub $followed_by +",
	"channel_codec" => TeamSpeak3::CODEC_OPUS_VOICE,
	"channel_flag_permanent" => TRUE,
	"cpid"                   => "$ytrooms",
	));
	$ts3_VirtualServer->clientGetByUid($uid)->move($cid);
	$ts3_VirtualServer->clientGetByUid($uid)->setChannelGroup($cid , $chytowner);
try{
$ts3->channelGetById($cid)->modify(array("channel_icon_id" => $yticon5k));
                }      
                catch (Exception $e) { 
                        }

        $stmt= $db->prepare('INSERT INTO youtube ( name, img, cdb, creation_date, publishedAt, sub, views, videos, sgroup, CID, YTID) 
                             VALUES (:nem, :img, :cdb, NOW(), :At, :sb, :view, :vid, :group, :cid, :ytid)
                           ');
        $stmt->bindValue(':nem',"$user",PDO::PARAM_STR);
        $stmt->bindValue(':img',"$img",PDO::PARAM_STR);
        $stmt->bindValue(':cdb', "$client_db", PDO::PARAM_INT);
        $stmt->bindValue(':At',"$publishedAt",PDO::PARAM_STR);
        $stmt->bindValue(':sb',"$followed_by", PDO::PARAM_INT);
        $stmt->bindValue(':view',"$view", PDO::PARAM_INT);
        $stmt->bindValue(':vid',"$videoCount", PDO::PARAM_INT);
        $stmt->bindValue(':group',"$yt5k", PDO::PARAM_INT);
        $stmt->bindValue(':cid',"$cid", PDO::PARAM_INT);
        $stmt->bindValue(':ytid',"$IDChannel", PDO::PARAM_STR);
        $stmt->execute();        
        $stmt->CloseCursor();


}elseif($followed_by < 20000 && $followed_by >= 10000){
$ts3->serverGroupClientAdd($yt10k, $client_db);
$rankname = $ts3->serverGroupGetById($yt10k);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم ربط القناة <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $yt10k . '"> '.$rankname.'  

                                </div>
</center>
';
$cid = $ts3_VirtualServer->channelCreate(array(
	"channel_name" =>  ''.$nickname.''.$smallrand.'',
	"channel_topic" => "YouTuber |Sub $followed_by +",
	"channel_codec" => TeamSpeak3::CODEC_OPUS_VOICE,
	"channel_flag_permanent" => TRUE,
	"cpid"                   => "$ytrooms",
	));
	$ts3_VirtualServer->clientGetByUid($uid)->move($cid);
	$ts3_VirtualServer->clientGetByUid($uid)->setChannelGroup($cid , $chytowner);
try{
$ts3->channelGetById($cid)->modify(array("channel_icon_id" => $yticon10k));
                }      
                catch (Exception $e) { 
                        }

        $stmt= $db->prepare('INSERT INTO youtube ( name, img, cdb, creation_date, publishedAt, sub, views, videos, sgroup, CID, YTID) 
                             VALUES (:nem, :img, :cdb, NOW(), :At, :sb, :view, :vid, :group, :cid, :ytid)
                           ');
        $stmt->bindValue(':nem',"$user",PDO::PARAM_STR);
        $stmt->bindValue(':img',"$img",PDO::PARAM_STR);
        $stmt->bindValue(':cdb', "$client_db", PDO::PARAM_INT);
        $stmt->bindValue(':At',"$publishedAt",PDO::PARAM_STR);
        $stmt->bindValue(':sb',"$followed_by", PDO::PARAM_INT);
        $stmt->bindValue(':view',"$view", PDO::PARAM_INT);
        $stmt->bindValue(':vid',"$videoCount", PDO::PARAM_INT);
        $stmt->bindValue(':group',"$yt10k", PDO::PARAM_INT);
        $stmt->bindValue(':cid',"$cid", PDO::PARAM_INT);
        $stmt->bindValue(':ytid',"$IDChannel", PDO::PARAM_STR);
        $stmt->execute();        
        $stmt->CloseCursor();

}elseif($followed_by < 30000 && $followed_by >= 20000){
$ts3->serverGroupClientAdd($yt20k, $client_db);
$rankname = $ts3->serverGroupGetById($yt20k);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم ربط القناة <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $yt20k . '"> '.$rankname.'  

                                </div>
</center>
';
$cid = $ts3_VirtualServer->channelCreate(array(
	"channel_name" =>  ''.$nickname.''.$smallrand.'',
	"channel_topic" => "YouTuber |Sub $followed_by +",
	"channel_codec" => TeamSpeak3::CODEC_OPUS_VOICE,
	"channel_flag_permanent" => TRUE,
	"cpid"                   => "$ytrooms",
	));
	$ts3_client->clientGetByUid($uid)->move($cid);
	$ts3_client->clientGetByUid($uid)->setChannelGroup($cid , $chytowner);
try{
$ts3->channelGetById($cid)->modify(array("channel_icon_id" => $yticon20k));
                }      
                catch (Exception $e) { 
                        }

        $stmt= $db->prepare('INSERT INTO youtube ( name, img, cdb, creation_date, publishedAt, sub, views, videos, sgroup, CID, YTID) 
                             VALUES (:nem, :img, :cdb, NOW(), :At, :sb, :view, :vid, :group, :cid, :ytid)
                           ');
        $stmt->bindValue(':nem',"$user",PDO::PARAM_STR);
        $stmt->bindValue(':img',"$img",PDO::PARAM_STR);
        $stmt->bindValue(':cdb', "$client_db", PDO::PARAM_INT);
        $stmt->bindValue(':At',"$publishedAt",PDO::PARAM_STR);
        $stmt->bindValue(':sb',"$followed_by", PDO::PARAM_INT);
        $stmt->bindValue(':view',"$view", PDO::PARAM_INT);
        $stmt->bindValue(':vid',"$videoCount", PDO::PARAM_INT);
        $stmt->bindValue(':group',"$yt20k", PDO::PARAM_INT);
        $stmt->bindValue(':cid',"$cid", PDO::PARAM_INT);
        $stmt->bindValue(':ytid',"$IDChannel", PDO::PARAM_STR);
        $stmt->execute();        
        $stmt->CloseCursor();

}elseif($followed_by < 50000 && $followed_by >= 30000){
$ts3->serverGroupClientAdd($yt30k, $client_db);
$rankname = $ts3->serverGroupGetById($yt30k);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم ربط القناة <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $yt30k . '"> '.$rankname.'  

                                </div>
</center>
';
$cid = $ts3_VirtualServer->channelCreate(array(
	"channel_name" =>  ''.$nickname.''.$smallrand.'',
	"channel_topic" => "YouTuber |Sub $followed_by +",
	"channel_codec" => TeamSpeak3::CODEC_OPUS_VOICE,
	"channel_flag_permanent" => TRUE,
	"cpid"                   => "$ytrooms",
	));
	$ts3_client->clientGetByUid($uid)->move($cid);
	$ts3_client->clientGetByUid($uid)->setChannelGroup($cid , $chytowner);
try{
$ts3->channelGetById($cid)->modify(array("channel_icon_id" => $yticon30k));
                }      
                catch (Exception $e) { 
                        }

        $stmt= $db->prepare('INSERT INTO youtube ( name, img, cdb, creation_date, publishedAt, sub, views, videos, sgroup, CID, YTID) 
                             VALUES (:nem, :img, :cdb, NOW(), :At, :sb, :view, :vid, :group, :cid, :ytid)
                           ');
        $stmt->bindValue(':nem',"$user",PDO::PARAM_STR);
        $stmt->bindValue(':img',"$img",PDO::PARAM_STR);
        $stmt->bindValue(':cdb', "$client_db", PDO::PARAM_INT);
        $stmt->bindValue(':At',"$publishedAt",PDO::PARAM_STR);
        $stmt->bindValue(':sb',"$followed_by", PDO::PARAM_INT);
        $stmt->bindValue(':view',"$view", PDO::PARAM_INT);
        $stmt->bindValue(':vid',"$videoCount", PDO::PARAM_INT);
        $stmt->bindValue(':group',"$yt30k", PDO::PARAM_INT);
        $stmt->bindValue(':cid',"$cid", PDO::PARAM_INT);
        $stmt->bindValue(':ytid',"$IDChannel", PDO::PARAM_STR);
        $stmt->execute();        
        $stmt->CloseCursor();

}elseif($followed_by < 100000 && $followed_by >= 50000){
$ts3->serverGroupClientAdd($yt50k, $client_db);
try{
$rankname = $ts3->serverGroupGetById($yt50k);
                }      
                catch (Exception $e) { 
                        }

echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم ربط القناة <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $yt50k . '"> '.$rankname.'  

                                </div>
</center>
';
$cid = $ts3_VirtualServer->channelCreate(array(
	"channel_name" =>  ''.$nickname.''.$smallrand.'',
	"channel_topic" => "YouTuber |Sub $followed_by +",
	"channel_codec" => TeamSpeak3::CODEC_OPUS_VOICE,
	"channel_flag_permanent" => TRUE,
	"cpid"                   => "$ytrooms",
	));
	$ts3_client->clientGetByUid($uid)->move($cid);
	$ts3_client->clientGetByUid($uid)->setChannelGroup($cid , $chytowner);
try{
$ts3->channelGetById($cid)->modify(array("channel_icon_id" => $yticon50k));
                }      
                catch (Exception $e) { 
                        }

        $stmt= $db->prepare('INSERT INTO youtube ( name, img, cdb, creation_date, publishedAt, sub, views, videos, sgroup, CID, YTID) 
                             VALUES (:nem, :img, :cdb, NOW(), :At, :sb, :view, :vid, :group, :cid, :ytid)
                           ');
        $stmt->bindValue(':nem',"$user",PDO::PARAM_STR);
        $stmt->bindValue(':img',"$img",PDO::PARAM_STR);
        $stmt->bindValue(':cdb', "$client_db", PDO::PARAM_INT);
        $stmt->bindValue(':At',"$publishedAt",PDO::PARAM_STR);
        $stmt->bindValue(':sb',"$followed_by", PDO::PARAM_INT);
        $stmt->bindValue(':view',"$view", PDO::PARAM_INT);
        $stmt->bindValue(':vid',"$videoCount", PDO::PARAM_INT);
        $stmt->bindValue(':group',"$yt50k", PDO::PARAM_INT);
        $stmt->bindValue(':cid',"$cid", PDO::PARAM_INT);
        $stmt->bindValue(':ytid',"$IDChannel", PDO::PARAM_STR);
        $stmt->execute();        
        $stmt->CloseCursor();

}elseif($followed_by < 100000 && $followed_by >= 50000){
$ts3->serverGroupClientAdd($yt80k, $client_db);
$rankname = $ts3->serverGroupGetById($yt80k);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم ربط القناة <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $yt80k . '"> '.$rankname.'  

                                </div>
</center>
';
$cid = $ts3_VirtualServer->channelCreate(array(
	"channel_name" =>  ''.$nickname.''.$smallrand.'',
	"channel_topic" => "YouTuber |Sub $followed_by +",
	"channel_codec" => TeamSpeak3::CODEC_OPUS_VOICE,
	"channel_flag_permanent" => TRUE,
	"cpid"                   => "$ytrooms",
	));
	$ts3_client->clientGetByUid($uid)->move($cid);
	$ts3_client->clientGetByUid($uid)->setChannelGroup($cid , $chytowner);
try{
$ts3->channelGetById($cid)->modify(array("channel_icon_id" => $yticon80k));
                }      
                catch (Exception $e) { 
                        }

        $stmt= $db->prepare('INSERT INTO youtube ( name, img, cdb, creation_date, publishedAt, sub, views, videos, sgroup, CID, YTID) 
                             VALUES (:nem, :img, :cdb, NOW(), :At, :sb, :view, :vid, :group, :cid, :ytid)
                           ');
        $stmt->bindValue(':nem',"$user",PDO::PARAM_STR);
        $stmt->bindValue(':img',"$img",PDO::PARAM_STR);
        $stmt->bindValue(':cdb', "$client_db", PDO::PARAM_INT);
        $stmt->bindValue(':At',"$publishedAt",PDO::PARAM_STR);
        $stmt->bindValue(':sb',"$followed_by", PDO::PARAM_INT);
        $stmt->bindValue(':view',"$view", PDO::PARAM_INT);
        $stmt->bindValue(':vid',"$videoCount", PDO::PARAM_INT);
        $stmt->bindValue(':group',"$yt80k", PDO::PARAM_INT);
        $stmt->bindValue(':cid',"$cid", PDO::PARAM_INT);
        $stmt->bindValue(':ytid',"$IDChannel", PDO::PARAM_STR);
        $stmt->execute();        
        $stmt->CloseCursor();

}elseif($followed_by < 200000 && $followed_by >= 100000){
$ts3->serverGroupClientAdd($yt100k, $client_db);
$rankname = $ts3->serverGroupGetById($yt100k);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم ربط القناة <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $yt250k . '"> '.$rankname.'  

                                </div>
</center>
';
$cid = $ts3_VirtualServer->channelCreate(array(
	"channel_name" =>  ''.$nickname.''.$smallrand.'',
	"channel_topic" => "YouTuber |Sub $followed_by +",
	"channel_codec" => TeamSpeak3::CODEC_OPUS_VOICE,
	"channel_flag_permanent" => TRUE,
	"cpid"                   => "$ytrooms",
	));
	$ts3_client->clientGetByUid($uid)->move($cid);
	$ts3_client->clientGetByUid($uid)->setChannelGroup($cid , $chytowner);
try{
$ts3->channelGetById($cid)->modify(array("channel_icon_id" => $yticon100k));
                }      
                catch (Exception $e) { 
                        }

        $stmt= $db->prepare('INSERT INTO youtube ( name, img, cdb, creation_date, publishedAt, sub, views, videos, sgroup, CID, YTID) 
                             VALUES (:nem, :img, :cdb, NOW(), :At, :sb, :view, :vid, :group, :cid, :ytid)
                           ');
        $stmt->bindValue(':nem',"$user",PDO::PARAM_STR);
        $stmt->bindValue(':img',"$img",PDO::PARAM_STR);
        $stmt->bindValue(':cdb', "$client_db", PDO::PARAM_INT);
        $stmt->bindValue(':At',"$publishedAt",PDO::PARAM_STR);
        $stmt->bindValue(':sb',"$followed_by", PDO::PARAM_INT);
        $stmt->bindValue(':view',"$view", PDO::PARAM_INT);
        $stmt->bindValue(':vid',"$videoCount", PDO::PARAM_INT);
        $stmt->bindValue(':group',"$yt100k", PDO::PARAM_INT);
        $stmt->bindValue(':cid',"$cid", PDO::PARAM_INT);
        $stmt->bindValue(':ytid',"$IDChannel", PDO::PARAM_STR);
        $stmt->execute();        
        $stmt->CloseCursor();

}elseif($followed_by < 500000 && $followed_by >= 300000){
$ts3->serverGroupClientAdd($yt300k, $client_db);
$rankname = $ts3->serverGroupGetById($yt300k);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم ربط القناة <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $yt300k . '"> '.$rankname.'  

                                </div>
</center>
';
$cid = $ts3_VirtualServer->channelCreate(array(
	"channel_name" =>  ''.$nickname.''.$smallrand.'',
	"channel_topic" => "YouTuber |Sub $followed_by +",
	"channel_codec" => TeamSpeak3::CODEC_OPUS_VOICE,
	"channel_flag_permanent" => TRUE,
	"cpid"                   => "$ytrooms",
	));
	$ts3_client->clientGetByUid($uid)->move($cid);
	$ts3_client->clientGetByUid($uid)->setChannelGroup($cid , $chytowner);
try{
$ts3->channelGetById($cid)->modify(array("channel_icon_id" => $yticon300k));
                }      
                catch (Exception $e) { 
                        }

        $stmt= $db->prepare('INSERT INTO youtube ( name, img, cdb, creation_date, publishedAt, sub, views, videos, sgroup, CID, YTID) 
                             VALUES (:nem, :img, :cdb, NOW(), :At, :sb, :view, :vid, :group, :cid, :ytid)
                           ');
        $stmt->bindValue(':nem',"$user",PDO::PARAM_STR);
        $stmt->bindValue(':img',"$img",PDO::PARAM_STR);
        $stmt->bindValue(':cdb', "$client_db", PDO::PARAM_INT);
        $stmt->bindValue(':At',"$publishedAt",PDO::PARAM_STR);
        $stmt->bindValue(':sb',"$followed_by", PDO::PARAM_INT);
        $stmt->bindValue(':view',"$view", PDO::PARAM_INT);
        $stmt->bindValue(':vid',"$videoCount", PDO::PARAM_INT);
        $stmt->bindValue(':group',"$yt300k", PDO::PARAM_INT);
        $stmt->bindValue(':cid',"$cid", PDO::PARAM_INT);
        $stmt->bindValue(':ytid',"$IDChannel", PDO::PARAM_STR);
        $stmt->execute();        
        $stmt->CloseCursor();
}elseif($followed_by < 600000 && $followed_by >= 500000){
$ts3->serverGroupClientAdd($yt500k, $client_db);
$rankname = $ts3->serverGroupGetById($yt500k);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم ربط القناة <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $yt500k . '"> '.$rankname.'  

                                </div>
</center>
';
$cid = $ts3_VirtualServer->channelCreate(array(
	"channel_name" =>  ''.$nickname.''.$smallrand.'',
	"channel_topic" => "YouTuber |Sub $followed_by +",
	"channel_codec" => TeamSpeak3::CODEC_OPUS_VOICE,
	"channel_flag_permanent" => TRUE,
	"cpid"                   => "$ytrooms",
	));
	$ts3_client->clientGetByUid($uid)->move($cid);
	$ts3_client->clientGetByUid($uid)->setChannelGroup($cid , $chytowner);
try{
$ts3->channelGetById($cid)->modify(array("channel_icon_id" => $yticon500k));
                }      
                catch (Exception $e) { 
                        }

        $stmt= $db->prepare('INSERT INTO youtube ( name, img, cdb, creation_date, publishedAt, sub, views, videos, sgroup, CID, YTID) 
                             VALUES (:nem, :img, :cdb, NOW(), :At, :sb, :view, :vid, :group, :cid, :ytid)
                           ');
        $stmt->bindValue(':nem',"$user",PDO::PARAM_STR);
        $stmt->bindValue(':img',"$img",PDO::PARAM_STR);
        $stmt->bindValue(':cdb', "$client_db", PDO::PARAM_INT);
        $stmt->bindValue(':At',"$publishedAt",PDO::PARAM_STR);
        $stmt->bindValue(':sb',"$followed_by", PDO::PARAM_INT);
        $stmt->bindValue(':view',"$view", PDO::PARAM_INT);
        $stmt->bindValue(':vid',"$videoCount", PDO::PARAM_INT);
        $stmt->bindValue(':group',"$yt500k", PDO::PARAM_INT);
        $stmt->bindValue(':cid',"$cid", PDO::PARAM_INT);
        $stmt->bindValue(':ytid',"$IDChannel", PDO::PARAM_STR);
        $stmt->execute();        
        $stmt->CloseCursor();
}elseif($followed_by < 800000 && $followed_by >= 600000){
$ts3->serverGroupClientAdd($yt800k, $client_db);
$rankname = $ts3->serverGroupGetById($yt800k);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم ربط القناة <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $yt800k . '"> '.$rankname.'  

                                </div>
</center>
';
$cid = $ts3_VirtualServer->channelCreate(array(
	"channel_name" =>  ''.$nickname.''.$smallrand.'',
	"channel_topic" => "YouTuber |Sub $followed_by +",
	"channel_codec" => TeamSpeak3::CODEC_OPUS_VOICE,
	"channel_flag_permanent" => TRUE,
	"channel_flag_permanent" => TRUE,
	"cpid"                   => "$ytrooms",
	));
	$ts3_client->clientGetByUid($uid)->move($cid);
	$ts3_client->clientGetByUid($uid)->setChannelGroup($cid , $chytowner);
try{
$ts3->channelGetById($cid)->modify(array("channel_icon_id" => $yticon800k));
                }      
                catch (Exception $e) { 
                        }

        $stmt= $db->prepare('INSERT INTO youtube ( name, img, cdb, creation_date, publishedAt, sub, views, videos, sgroup, CID, YTID) 
                             VALUES (:nem, :img, :cdb, NOW(), :At, :sb, :view, :vid, :group, :cid, :ytid)
                           ');
        $stmt->bindValue(':nem',"$user",PDO::PARAM_STR);
        $stmt->bindValue(':img',"$img",PDO::PARAM_STR);
        $stmt->bindValue(':cdb', "$client_db", PDO::PARAM_INT);
        $stmt->bindValue(':At',"$publishedAt",PDO::PARAM_STR);
        $stmt->bindValue(':sb',"$followed_by", PDO::PARAM_INT);
        $stmt->bindValue(':view',"$view", PDO::PARAM_INT);
        $stmt->bindValue(':vid',"$videoCount", PDO::PARAM_INT);
        $stmt->bindValue(':group',"$yt800k", PDO::PARAM_INT);
        $stmt->bindValue(':cid',"$cid", PDO::PARAM_INT);
        $stmt->bindValue(':ytid',"$IDChannel", PDO::PARAM_STR);
        $stmt->execute();        
        $stmt->CloseCursor();

}elseif($followed_by >= 1000000){
$ts3->serverGroupClientAdd($yt1m, $client_db);
$rankname = $ts3->serverGroupGetById($yt1m);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم ربط القناة بنجاح <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $yt1m . '"> '.$rankname.'  

                                </div>
</center>
';
$cid = $ts3_VirtualServer->channelCreate(array(
	"channel_name" =>  ''.$nickname.''.$smallrand.'',
	"channel_topic" => "YouTuber |Sub $followed_by +",
	"channel_codec" => TeamSpeak3::CODEC_OPUS_VOICE,
	"channel_flag_permanent" => TRUE,
	"cpid"                   => "$ytrooms",
	));
	$ts3_client->clientGetByUid($uid)->move($cid);
	$ts3_client->clientGetByUid($uid)->setChannelGroup($cid , $chytowner);
try{
$ts3->channelGetById($cid)->modify(array("channel_icon_id" => $yticon1m));
                }      
                catch (Exception $e) { 
                        }

        $stmt= $db->prepare('INSERT INTO youtube ( name, img, cdb, creation_date, publishedAt, sub, views, videos, sgroup, CID, YTID) 
                             VALUES (:nem, :img, :cdb, NOW(), :At, :sb, :view, :vid, :group, :cid, :ytid)
                           ');
        $stmt->bindValue(':nem',"$user",PDO::PARAM_STR);
        $stmt->bindValue(':img',"$img",PDO::PARAM_STR);
        $stmt->bindValue(':cdb', "$client_db", PDO::PARAM_INT);
        $stmt->bindValue(':At',"$publishedAt",PDO::PARAM_STR);
        $stmt->bindValue(':sb',"$followed_by", PDO::PARAM_INT);
        $stmt->bindValue(':view',"$view", PDO::PARAM_INT);
        $stmt->bindValue(':vid',"$videoCount", PDO::PARAM_INT);
        $stmt->bindValue(':group',"$yt1m", PDO::PARAM_INT);
        $stmt->bindValue(':cid',"$cid", PDO::PARAM_INT);
        $stmt->bindValue(':ytid',"$IDChannel", PDO::PARAM_STR);
        $stmt->execute();        
        $stmt->CloseCursor();


}elseif($followed_by < 1000){
echo'
                                <div class="alert alert-danger alert-bordered alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                   <center> <strong>للأسف!</strong> لا يوجد عدد كافي من المشتركين الحد الأدنى  ألف مشترك.</center>
                                </div>
';
        require_once("inc/footer.php");
die;
}


echo'<div class="col-lg-4">
              
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <header class="panel-title">
                                    <div class="text-center">
                                        <strong>معلومات حسابك</strong> 
                                    </div>
                                </header>
                            </div>
                            <div class="panel-body">
                                <div class="text-center" id="author">
                                    <img src="'.$img.'">
                                    <h3>'.$user.'</h3>
                                    <small class="label label-primary">  '.$sub.' </small> عدد المتابعين 
                                  <p style="background-color:white"> <strong>عدد مقاطع الفيديو :'.$vid.'</p> 
                                  <p style="background-color:white"> <strong>عدد مشاهدات القناة : '.$view.'</p> 
                                    <div class="text-center">
                                    <p style="background-color:white">'.$des.'</p>
</div>
                                </div>
                            </div>
                        </div>
</div><div class="col-lg-4">
                        <div class="well well-success">
                            <h3>تم التنفيذ بنجاح</h3>
                            تم ربط حسابك بنجاح <br> يمكنك إرجاع الوصف الخاص بك كما كان 
                        </div>
</div>
</div>

';

        require_once("inc/footer.php");
die;
}
}
}

    $response = $db->prepare('SELECT * FROM youtube');
    $response->execute();
    $yt = $response->fetchAll();
    $response->CloseCursor();
		
    foreach($yt as $check) {

        if ($check['cdb'] == $client_db) {
$sub = $check['sub'];
$user = secure($check['name']);
$img = $check['img'];
$vid = $check['videos'];
$view = $check['views'];
$publishedAt = $check['publishedAt'];
$IDChannel = $check['YTID'];
$sgroup = $check['sgroup'];

    $url_yt = "https://www.googleapis.com/youtube/v3/channels?part=snippet%2CcontentDetails&id=$IDChannel&key=AIzaSyBGXgUQTzO_KqDJ0bcqN3h-Ao9xDRMoKIA";
    $yt_array = file_get_contents($url_yt);
    $ytcount = json_decode($yt_array, true);
    $des = $ytcount['items'][0]['snippet']['description'];

echo'<div class="col-lg-4">
              
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <header class="panel-title">
                                    <div class="text-center">
                                        <strong>معلومات حسابك</strong> 
                                    </div>
                                </header>
                            </div>
                            <div class="panel-body">
                                <div class="text-center" id="author">
                                    <img src="'.$img.'">
                                    <h3>'.$user.'</h3>
                                    <small class="label label-primary">  '.$sub.' </small> عدد المتابعين 
                                  <p style="background-color:white"> <strong>عدد مقاطع الفيديو :'.$vid.'</p> 
                                  <p style="background-color:white"> <strong>عدد مشاهدات القناة : '.$view.'</p> 
                                    <div class="text-center">
                                    <p style="background-color:white">'.$des.'</p>
</div>
                                </div>
                            </div>
                        </div>
</div><div class="col-lg-4">
                        <div class="well well-info">
                            <strong><h3>تم ربط حسابك بالفعل !</h3>
                        </div>
</div>
</div>
';
echo' <center>
<form method="post">

<button type="submit" name="rem" class="btn btn-danger delete" title="'.$user.' "><i class="glyphicon glyphicon-remove"></i> إلغاء ربط قناتي</button></form>
';

        require_once("inc/footer.php");
die;

        }
    }
?>

                    <div class="col-lg-6">
<center>=================================================
<font face="VIP" size="4"> <font color="#d22d2d"><?php echo $client_info["client_unique_identifier"];?></font>  : رقم التحقق الخاص بك</font>
<br>
=================================================
<h4>
<br>
( قم&#8236;&#8236; بوضع كود التحقق فقط في وصف قناتك&#8236;.)<br>
( Channel-&gt;About-&gt;Description-&gt;Edit-&gt;<?php echo $unid ;?> )<br>
(2) قم بكتابه معرف حسابك في اليوتيوب في الحقل.<br>
( Channel ID = https://www.youtube.com/channel/(Your Channel ID Here)/about )<br>
(3) قم بالضغط على الزر "ربط الحساب" لربط الحساب الخاص بك في اليوتيوب.<br><br><br><br>

</h4>

</div>
</center>

<center>
<form method="post">

                    <div class="col-lg-6">
                        <section class="panel">
                            <header class="panel-heading">
<h1 class="page-header">RA# Youtuber Script </h1>
<center><img src="img/YT.png" /></center>

<hr>
                            </header>

                        <section class="panel">
                            <div class="panel-body">
                                    <div class="form-group">

                                <form class="form-horizontal" role="form">
                                        <div class="col-lg-9">



                                        <label class="col-lg-3 col-sm-3 control-label">نموذج الربط</label>
                                        <div class="col-lg-9">
                                <form role="form">
                                    <div class="form-group">
                                        <div class="iconic-input">
                                            <i class="fa fa-user"></i>
<center>
     <form method='post'>

                                            <input type="text" class="form-control" placeholder="أيدي القناة" name='IDChannel'><br>


                                        </div>
                            <button type="submit" name="send" class="btn btn-default"><i class="fa fa-search"></i> ربط القناة</button>

</form>

                                    </div>
                                    </div>
                                        <div class="col-lg-9">



                                        </div>

</div>

</div>

                                        </div>

                        </section>

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
