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
                    <li>الغرف</li>
                    <li class="active">إنشاء غرفة دائمة</li>

                </ol>

                <div class="row" id="home-content">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            إنشاء الغرف الدائمة 
                        </h2>
                    </div>
                </div>
<?php
if (isset($_POST['del'])){

$response = $db->prepare('SELECT * FROM rooms');
    $response->execute();
 $rooms = $response->fetchAll();
    $response->CloseCursor();
    foreach($rooms as $check) {
        if ($check['cdb'] == $client_db) {   
                           $room = (int)$check['chid'];   
}
}


$hisname = '[B][COLOR=red][URL=client://82/'.$client_info["client_unique_identifier"].']'.$client_info["client_nickname"].'[/URL][/COLOR][/B]';
$ts3_VirtualServer->channelGetById($room)->message("[B] ". $hisname." تم حذف الغرفة من قبل المالك : ");
$ts3_VirtualServer->channelDelete($room, $force=TRUE);

    $stmt = $db->prepare('DELETE FROM rooms WHERE chid = :rom');
    $stmt->bindValue(':rom',$room,PDO::PARAM_INT);
    $stmt->execute();
    $stmt->CloseCursor(); 
$ts3_VirtualServer->clientGetByDbid($client_db)->poke("[B]تم حذف غرفتك الشخصية بنجاح !");

echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>        <strong>تم حذف رومك بنجاح ! </strong></center> 
                                </div>
';
	$_SESSION['room'] = microtime(true)+600;


}
if (isset($_POST['submit'])){
	if(!isset($_SESSION['room']))
    $_SESSION['room'] = microtime(true);
	
	if($_SESSION['room'] >= microtime(true)){
	echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>          <strong>لقد قمت بحذف غرفتك مؤخرآ , فضلآ قم بالمحاولة في وقت لاحق </strong></center> 
                                </div>
';
        require_once("inc/footer.php");
die;
}
$RoomName = secure($_POST['RoomName']);
if (empty($RoomName)){
echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>         الرجاء وضع إسم  <strong>الغرفة  ! </strong></center> 
                                </div>
';
}else{
try{
$channels = $ts3_VirtualServer->channelList();
foreach($channels as $channel){
if ($channel == $RoomName){
echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>         لقد تم إستخدام هذا الإسم   <strong>من قبل  ! </strong></center> 
                                </div>
';
        require_once("inc/footer.php");
die;
}
}
$icon = 1053239599;

$top_cid = $ts3_VirtualServer->channelCreate(array(
  "channel_name"          => "$RoomName",
  "channel_topic"          => "$nickname",
  "channel_codec"          => TeamSpeak3::CODEC_OPUS_VOICE,
  "channel_codec_quality"  => 0x05,
  "channel_flag_permanent" => TRUE,
  "channel_password" => "",
  "cpid"                  => "$RoomsPlace",
));
$ts3->channelGetById($top_cid)->modify(array("channel_icon_id" => $icon));

$ts3_VirtualServer->clientGetByDbid($client_db)->move($top_cid);
$ts3_VirtualServer->clientGetByDbid($client_db)->poke("[B]تم إنشاء غرفة شخصية لك");
$ts3_VirtualServer->clientSetChannelGroup($client_db,$top_cid,$channelowner);
        $stmt= $db->prepare('INSERT INTO rooms ( name, cdb, creation_date, chid) 
                             VALUES (:nem, :cdb, NOW(), :ch)
                           ');
        $stmt->bindValue(':nem',"$nickname",PDO::PARAM_STR);
        $stmt->bindValue(':cdb', "$client_db", PDO::PARAM_INT);
        $stmt->bindValue(':ch', "$top_cid", PDO::PARAM_INT);


        $stmt->execute();        
        $stmt->CloseCursor();








           }     catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }




}
}



?>
                <section class="panel">
                    <header class="panel-heading">
                      <center> <h2> مافائدة الغرفة الشخصية ؟</h2>
                    </header>
                    <div class="panel-body"> 
                        <div class="row">
                               <center> <p>تمكنك الغرفة الشخصيه من الحصول على الخصوصية التامه  والراحة. <br>
                                    و إبعاد الغير مرغوبين فيهم (النشبات) وتقدر تعزم احد لها وتفلها طال عمرك ^_^. </p><br>
<?php
    $response = $db->prepare('SELECT * FROM rooms');
    $response->execute();
    $rooms = $response->fetchAll();
    $response->CloseCursor();
		
    foreach($rooms as $check) {

        if ($check['cdb'] == $client_db) {

$room = (int)$check['chid'];
$channels = $ts3->channelList();
foreach($channels as $channel){
$ch = $channel->cid;
if($ch == $room ){
$hisroom = $channel["channel_name"];

echo' <center>
<form method="post">
          

<button type="submit" name="del" class="btn btn-danger delete" title="'.$hisroom.' "><i class="glyphicon glyphicon-trash"></i> حذف غرفتي</button></form>
';
$hisroom = 1;
}
}
}
}
if(in_array($rank7,$ggids) || in_array($rank8,$ggids) || in_array($rank9,$ggids) || in_array($rank10,$ggids) || in_array($rank11,$ggids) || in_array($rank12,$ggids) || in_array($rank13,$ggids) || in_array($rank14,$ggids) || in_array($rank15,$ggids) || in_array($rank16,$ggids) || in_array($rank17,$ggids) || in_array($rank18,$ggids) || in_array($rank19,$ggids)|| in_array($rank20,$ggids)|| in_array($rank21,$ggids)|| in_array($rank22,$ggids)|| in_array($rank23,$ggids)|| in_array($rank24,$ggids)|| in_array($rank25,$ggids)|| in_array($rank26,$ggids)|| in_array($rank27,$ggids)|| in_array($rank28,$ggids)|| in_array($rank29,$ggids)|| in_array($rank30,$ggids) and !in_array($NoRoom,$ggids) and empty($hisroom))
{		 
echo'
     <form method="post">
                                            <center><input type="text" class="form-control" placeholder="إسم الغرفة" name="RoomName"><br>


                                       
                            <center><button type="submit" name="submit" class="btn btn-primary start"><i class="glyphicon glyphicon-upload"></i> إنشاء الغرفة</button>

                                <br></center>';
}elseif(!empty($hisroom)){	
}else{
echo '                         <div class="panel panel-warning">
                            <div class="panel-heading">
                                <header class="panel-title">
                                    <strong><center>للأسف </center></strong>
                                </header>
                            </div>
                            <div class="panel-body">
                                لا يمكنك إنشاء غرفة شخصية الرجاء مراجعة شروط الإنشاء في الاسفل وتطبيقها
                            </div>
                        </div>
';

}
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
                                        <center><h3 class="panel-title">شروط إنشاء غرفة شخصية</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li>عدم وجود أي سوابق تمنعك من إنشاء روم <strong> .حظر إنشاء الغرف.</strong></li>
                                            <li><strong>( Level 7+)</strong> يجب توفر لفل 7 وما فوق</li>
                                            <li>* ! تتطبق على شروط الغرف الشخصية جميعها ‬‎<strong> قوانين السيرفر</strong> </li>
                                            <li>There are no precedents preventing you from <strong>creating a room.</strong></li>
                                            <li><strong>( Level 7+)</strong> Must be available for <strong>Level 7+</strong></li>
                                            <li><strong>Server Rules</strong> apply to all personal Room conditions ! *</li>
                                        </ul>
                                    </div>
                                </div>
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
