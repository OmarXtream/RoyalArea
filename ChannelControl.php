<?php
        require_once("inc/php-header.php");
        require_once("inc/header.php");
?>



        <!-- start:main -->
        <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->
                <ol class="breadcrumb">
                    <li><a href="index.php">الصفحة الرئيسية</a></li>
                    <li>الغرف</li>
                    <li class="active">التحكم بالغرف</li>

                </ol>
                <!-- end:breadcrumb -->   

                <div class="row" id="home-content">
                        <!--work progress end-->
			<center>
<h1 class="page-header">RA# ChannelControl | بوت التحكم بروم </h1>


<?php
if(isset($_POST['change'])){
$name = $_POST['name'];
$pass = $_POST['pass'];
$ch = $ts3_Client->cid;
$channel = $ts3->channelGetById($ch);
if(!$channel->isSpacer()){
try{
if($name =! $ts3_VirtualServer->channelGetById($ch)->channel_name){
$ts3->channelGetById($ch)->modify(array("channel_name" => $name));
}
if(!empty($pass)){
$ts3->channelGetById($ch)->modify(array("channel_password" => $pass));
}
                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }

}else{

echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>         <strong>لا يمكنك تعديل معلومات هذه الغرفة !</strong></center> 
                                </div>
';

}
}
global $chid;
$trtr = $ts3_VirtualServer->channelGroupGetById($ts3_Client->client_channel_group_id)->name;
			if (in_array ($ts3_Client->client_channel_group_id, $chid)){

			   }else{
				echo "<br><br><br><br><br><div class='error'><center><i class='fa fa-times'></i> لا يمكنك التحكم بروم غير رومك</center></div>";
				echo "<div class='warning'><center><i class='fa fa-exclamation-triangle'></i>  لتحكم بالروم الخاص بك عليك دخول رومك</center></a></div>";
				echo "<div class='warning'><center><i class='fa fa-exclamation-triangle'></i> $trtr رتبتك الحالية داخل الروم المتواجد به </center></a></div>";
echo'</div>';
        require_once("inc/footer.php");
die;
}
if ($_POST['openc'])
{
	if(!isset($_SESSION['ts3_last_query']))
    $_SESSION['ts3_last_query'] = microtime(true);
	
	if($_SESSION['ts3_last_query'] >= microtime(true)){
	echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>          <strong>عذراً! يرجى الانتظار بين محاولاتك‬‎ </strong></center> 
                                </div>
';

}else{
	$_SESSION['ts3_last_query'] = microtime(true)+5.0;

try{

$ts3_VirtualServer->channelGetById($ts3_Client->cid)->permRemove("b_client_channel_textmessage_send");		
$ts3_VirtualServer->channelGetById($ts3_Client->cid)->message("[B] تم فتح الشات من قبل    ". $client_info["client_nickname"]." ");

                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }
}
}
if ($_POST['closec'])
{
	if(!isset($_SESSION['ts3_last_query']))
    $_SESSION['ts3_last_query'] = microtime(true);
	
	if($_SESSION['ts3_last_query'] >= microtime(true)){
	echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>          <strong>عذراً! يرجى الانتظار بين محاولاتك‬‎ </strong></center> 
                                </div>
';

}else{
	$_SESSION['ts3_last_query'] = microtime(true)+5.0;

try{

$ts3_VirtualServer->channelGetById($ts3_Client->cid)->permAssign("b_client_channel_textmessage_send", 0);			
$ts3_VirtualServer->channelGetById($ts3_Client->cid)->message("[B]". $client_info["client_nickname"]." تم إغلاق الشات من قبل  ");
				
			

                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }
}
}
if ($_POST['closek'])
{
	if(!isset($_SESSION['ts3_last_query']))
    $_SESSION['ts3_last_query'] = microtime(true);
	
	if($_SESSION['ts3_last_query'] >= microtime(true)){
	echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>          <strong>عذراً! يرجى الانتظار بين محاولاتك‬‎ </strong></center> 
                                </div>
';

}else{
	$_SESSION['ts3_last_query'] = microtime(true)+5.0;

try{

$ts3_VirtualServer->channelGetById($ts3_Client->cid)->permAssign('i_client_needed_talk_power',999999999);			
$ts3_VirtualServer->channelGetById($ts3_Client->cid)->message("[B] ". $client_info["client_nickname"]." تم إغلاق المايكات من قبل ");
				
			

                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }
}
}
if ($_POST['openk'])
{
	if(!isset($_SESSION['ts3_last_query']))
    $_SESSION['ts3_last_query'] = microtime(true);
	
	if($_SESSION['ts3_last_query'] >= microtime(true)){
	echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>          <strong>عذراً! يرجى الانتظار بين محاولاتك‬‎ </strong></center> 
                                </div>
';

}else{
	$_SESSION['ts3_last_query'] = microtime(true)+5.0;

try{

$ts3_VirtualServer->channelGetById($ts3_Client->cid)->permRemove("i_client_needed_talk_power");		
$ts3_VirtualServer->channelGetById($ts3_Client->cid)->message("[B] تم فتح المايكات من قبل ". $client_info["client_nickname"]." ");
				
			

                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }
}
}
if ($_POST['openr'])
{
	if(!isset($_SESSION['ts3_last_query']))
    $_SESSION['ts3_last_query'] = microtime(true);
	
	if($_SESSION['ts3_last_query'] >= microtime(true)){
	echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>          <strong>عذراً! يرجى الانتظار بين محاولاتك‬‎ </strong></center> 
                                </div>
';

}else{
	$_SESSION['ts3_last_query'] = microtime(true)+5.0;

try{
$hiss = $ts3_VirtualServer->channelGetById($ts3_Client->cid); 
if($hiss->getProperty('channel_flag_permanent') == 1){

$ts3_VirtualServer->channelGetById($ts3_Client->cid)->modify(array("channel_maxclients=99999"));
$ts3_VirtualServer->channelGetById($ts3_Client->cid)->message("[B] تم فتح الروم من قبل ". $client_info["client_nickname"]." ");
}else{
	echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>          <strong>لا يمكنك تفعيل هذه الخاصية في غرفة غير مثبته </strong></center> 
                                </div>
';

}	
			

                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }
}
}
if ($_POST['closer'])
{
	if(!isset($_SESSION['ts3_last_query']))
    $_SESSION['ts3_last_query'] = microtime(true);
	
	if($_SESSION['ts3_last_query'] >= microtime(true)){
	echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>          <strong>عذراً! يرجى الانتظار بين محاولاتك‬‎ </strong></center> 
                                </div>
';

}else{
	$_SESSION['ts3_last_query'] = microtime(true)+5.0;

try{
$hiss = $ts3_VirtualServer->channelGetById($ts3_Client->cid); 
if($hiss->getProperty('channel_flag_permanent') == 1){


$ts3_VirtualServer->channelGetById($ts3_Client->cid)->modify(array("channel_maxclients=0"));
$ts3_VirtualServer->channelGetById($ts3_Client->cid)->message("[B] تم إغلاق الروم من قبل ". $client_info["client_nickname"]." ");
		}else{
	echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>          <strong>لا يمكنك تفعيل هذه الخاصية في غرفة غير مثبته </strong></center> 
                                </div>
';

}	
		
			

                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }
}
}
if(isset($_POST['music'])){
	if(!isset($_SESSION['ts3_last_query']))
    $_SESSION['ts3_last_query'] = microtime(true);
	
	if($_SESSION['ts3_last_query'] >= microtime(true)){
	echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>          <strong>عذراً! يرجى الانتظار بين محاولاتك‬‎ </strong></center> 
                                </div>
';

}else{
	$_SESSION['ts3_last_query'] = microtime(true)+5.0;

try{
$hiss = $ts3_VirtualServer->channelGetById($ts3_Client->cid); 
if($hiss->getProperty('channel_codec') == 5){
$hiss["channel_codec"] = 4;
}else{
$hiss["channel_codec"] = 5;
}
$ts3_VirtualServer->channelGetById($ts3_Client->cid)->message("[B] تم تغيير نوع الروم من قبل ". $client_info["client_nickname"]." ");
                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }
}
}
$cg = $_POST['cg'];
$cid = $_POST['cid'];
if (isset($_POST['submit'])){
	if(!isset($_SESSION['ts3_last_query']))
    $_SESSION['form'] = microtime(true);
	
	if($_SESSION['form'] >= microtime(true)){
	echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>          <strong>عذراً! يرجى الانتظار بين محاولاتك‬‎ </strong></center> 
                                </div>
';

}else{
	$_SESSION['form'] = microtime(true)+5.0;
	
	date_default_timezone_set('Asia/Riyadh'); //Change Here!

	if(empty($_POST['cid'])) {
				header("refresh: 1; url = ChannelControl.php"); 
echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>        <strong>You have to put the uid ! | عليك وضع الايدنتي المراد التعامل معه </strong></center> 
                                </div>
';
echo'<meta http-equiv="refresh" content="2; url=ChannelControl.php" />';
die;		
		}

                foreach ($ts3_VirtualServer->clientList() as $cl) {
                                        if ($cl['client_unique_identifier'] == $_POST['cid']) {
                                        $found = 1;

}else{
				header("refresh: 1; url = ChannelControl.php"); 
echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>        <strong>Wrong UID Given ! | خطأ الرجاء التحقق من الأيدي </strong></center> 
                                </div>
';
echo'<meta http-equiv="refresh" content="2; url=ChannelControl.php" />';

die;		
		}
}
				if($ts3_Client['client_unique_identifier'] == $cid ) {
				header("refresh: 1; url = ChannelControl.php"); 
echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>        <strong>You can not control your self !! | لا يمكنك التعامل مع نفسك !!  </strong></center> 
                                </div>
';
echo'<meta http-equiv="refresh" content="2; url=ChannelControl.php" />';

die;		

		}
					   		    if(isset($_POST['cid'])) {
			$get = $ts3_VirtualServer->ClientGetByUid($_POST['cid']);
            if($ts3_VirtualServer->channelGroupGetById($ts3_Client->client_channel_group_id)->sortid >= $ts3_VirtualServer->channelGroupGetById($get->client_channel_group_id)->sortid) {
	        				header("refresh: 2; url = ChannelControl.php"); 
echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>        <strong>You can not remove the rank of like your rank or higher you !! | لا يمكنك ازالة رتبة مثل الرتبة الخاصة بك او الاعلى منك  </strong></center> 
                                </div>
';
echo'<meta http-equiv="refresh" content="2; url=ChannelControl.php" />';

die;		


}
$channelid = ($ts3_Client->cid);
$ChannelName = $ts3_VirtualServer->channelGetById($ts3_Client->cid)->channel_name;

	if($cg == "clear"){
try{


$ts3_VirtualServer->clientGetByUid($cid)->setChannelGroup($channelid, "$normal");
$ts3_VirtualServer->clientGetByUid($cid)->message("تم سحب جميع رتبك في روم    ".$ChannelName." من قبل| ". $client_info["client_nickname"]." ");
//echo '<div class="sweet-alert showSweetAlert visible" tabindex="-1" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-ouside-click="false" data-has-done-function="false" data-timer="null" style="display: block; margin-top: -182px;margin-left: -19%;"><div class="icon error" style="display: none;"><span class="x-mark"><span class="line left"></span><span class="line right"></span></span></div><div class="icon warning" style="display: none;"> <span class="body"></span> <span class="dot"></span> </div> <div class="icon info" style="display: none;"></div> <div class="icon success animate" style="display: block;"> <span class="line tip animateSuccessTip"></span> <span class="line long animateSuccessLong"></span> <div class="placeholder"></div> <div class="fix"></div> </div> <div class="icon custom" style="display: none;"></div> <h2>تم سحبك إلى روم الشكاوي والإقتراحات</h2><p class="lead text-muted" style="display: block;"></p><p><button class="cancel btn btn-lg btn-default" tabindex="2" style="display: none;">Cancel</button></p></div>';
//echo '<br>' ;
                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }
}
	elseif($cg == "mod"){
try{


$ts3_VirtualServer->clientGetByUid($cid)->setChannelGroup($channelid, "$mod");
$ts3_VirtualServer->clientGetByUid($cid)->message("[B] تم اعطائك مود في روم    ".$ChannelName." من قبل| ". $client_info["client_nickname"]." ");
//echo '<div class="sweet-alert showSweetAlert visible" tabindex="-1" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-ouside-click="false" data-has-done-function="false" data-timer="null" style="display: block; margin-top: -182px;margin-left: -19%;"><div class="icon error" style="display: none;"><span class="x-mark"><span class="line left"></span><span class="line right"></span></span></div><div class="icon warning" style="display: none;"> <span class="body"></span> <span class="dot"></span> </div> <div class="icon info" style="display: none;"></div> <div class="icon success animate" style="display: block;"> <span class="line tip animateSuccessTip"></span> <span class="line long animateSuccessLong"></span> <div class="placeholder"></div> <div class="fix"></div> </div> <div class="icon custom" style="display: none;"></div> <h2>تم سحبك إلى روم الشكاوي والإقتراحات</h2><p class="lead text-muted" style="display: block;"></p><p><button class="cancel btn btn-lg btn-default" tabindex="2" style="display: none;">Cancel</button></p></div>';
//echo '<br>' ;
                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }
}

	elseif($cg == "mute"){
try{


$ts3_VirtualServer->clientGetByUid($cid)->setChannelGroup($channelid, "$mute");
$ts3_VirtualServer->clientGetByUid($cid)->message("[B] تم اعطائك حظر صوتي في روم    ".$ChannelName." من قبل| ". $client_info["client_nickname"]." ");
//echo '<div class="sweet-alert showSweetAlert visible" tabindex="-1" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-ouside-click="false" data-has-done-function="false" data-timer="null" style="display: block; margin-top: -182px;margin-left: -19%;"><div class="icon error" style="display: none;"><span class="x-mark"><span class="line left"></span><span class="line right"></span></span></div><div class="icon warning" style="display: none;"> <span class="body"></span> <span class="dot"></span> </div> <div class="icon info" style="display: none;"></div> <div class="icon success animate" style="display: block;"> <span class="line tip animateSuccessTip"></span> <span class="line long animateSuccessLong"></span> <div class="placeholder"></div> <div class="fix"></div> </div> <div class="icon custom" style="display: none;"></div> <h2>تم سحبك إلى روم الشكاوي والإقتراحات</h2><p class="lead text-muted" style="display: block;"></p><p><button class="cancel btn btn-lg btn-default" tabindex="2" style="display: none;">Cancel</button></p></div>';
//echo '<br>' ;
                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }
}

	elseif($cg == "mute2"){
try{


$ts3_VirtualServer->clientGetByUid($cid)->setChannelGroup($channelid, "$nochat");
$ts3_VirtualServer->clientGetByUid($cid)->message("[B]تم اعطائك حظر نصي في روم    ".$ChannelName." من قبل| ". $client_info["client_nickname"]." ");
//echo '<div class="sweet-alert showSweetAlert visible" tabindex="-1" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-ouside-click="false" data-has-done-function="false" data-timer="null" style="display: block; margin-top: -182px;margin-left: -19%;"><div class="icon error" style="display: none;"><span class="x-mark"><span class="line left"></span><span class="line right"></span></span></div><div class="icon warning" style="display: none;"> <span class="body"></span> <span class="dot"></span> </div> <div class="icon info" style="display: none;"></div> <div class="icon success animate" style="display: block;"> <span class="line tip animateSuccessTip"></span> <span class="line long animateSuccessLong"></span> <div class="placeholder"></div> <div class="fix"></div> </div> <div class="icon custom" style="display: none;"></div> <h2>تم سحبك إلى روم الشكاوي والإقتراحات</h2><p class="lead text-muted" style="display: block;"></p><p><button class="cancel btn btn-lg btn-default" tabindex="2" style="display: none;">Cancel</button></p></div>';
//echo '<br>' ;
                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }
}

	elseif($cg == "mute+"){
try{


$ts3_VirtualServer->clientGetByUid($cid)->setChannelGroup($channelid, "$muteplus");
$ts3_VirtualServer->clientGetByUid($cid)->message("[B]تم اعطائك حظر من الدرجة الأولى  في روم    ".$ChannelName." من قبل| ". $client_info["client_nickname"]." ");
                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }
}

	elseif($cg == "ban"){
try{


$ts3_VirtualServer->clientGetByUid($cid)->setChannelGroup($channelid, "$cban");
$ts3_VirtualServer->clientGetByUid($cid)->message("[B]تم  حظرك من دخول روم    ".$ChannelName." من قبل| ". $client_info["client_nickname"]." ");
                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }
}

	elseif($cg == "skip"){
try{


$ts3_VirtualServer->clientGetByUid($cid)->setChannelGroup($channelid, "$skipjoin");
$ts3_VirtualServer->clientGetByUid($cid)->message("[B]تم اعطائك  خاصية الدخول الحر في روم    ".$ChannelName." من قبل| ". $client_info["client_nickname"]." ");
//echo '<div class="sweet-alert showSweetAlert visible" tabindex="-1" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-ouside-click="false" data-has-done-function="false" data-timer="null" style="display: block; margin-top: -182px;margin-left: -19%;"><div class="icon error" style="display: none;"><span class="x-mark"><span class="line left"></span><span class="line right"></span></span></div><div class="icon warning" style="display: none;"> <span class="body"></span> <span class="dot"></span> </div> <div class="icon info" style="display: none;"></div> <div class="icon success animate" style="display: block;"> <span class="line tip animateSuccessTip"></span> <span class="line long animateSuccessLong"></span> <div class="placeholder"></div> <div class="fix"></div> </div> <div class="icon custom" style="display: none;"></div> <h2>تم سحبك إلى روم الشكاوي والإقتراحات</h2><p class="lead text-muted" style="display: block;"></p><p><button class="cancel btn btn-lg btn-default" tabindex="2" style="display: none;">Cancel</button></p></div>';
//echo '<br>' ;
                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }
}
	elseif($cg == "mike-"){
try{


$ts3_VirtualServer->clientGetByUid($cid)->channelClientPermRemove($channelid,b_client_is_priority_speaker);		
$ts3_VirtualServer->clientGetByUid($cid)->message("[B] تم إزالة خاصية أفضلية الصوت لك في روم".$ChannelName." من قبل| ". $client_info["client_nickname"]." ");
//echo '<div class="sweet-alert showSweetAlert visible" tabindex="-1" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-ouside-click="false" data-has-done-function="false" data-timer="null" style="display: block; margin-top: -182px;margin-left: -19%;"><div class="icon error" style="display: none;"><span class="x-mark"><span class="line left"></span><span class="line right"></span></span></div><div class="icon warning" style="display: none;"> <span class="body"></span> <span class="dot"></span> </div> <div class="icon info" style="display: none;"></div> <div class="icon success animate" style="display: block;"> <span class="line tip animateSuccessTip"></span> <span class="line long animateSuccessLong"></span> <div class="placeholder"></div> <div class="fix"></div> </div> <div class="icon custom" style="display: none;"></div> <h2>تم سحبك إلى روم الشكاوي والإقتراحات</h2><p class="lead text-muted" style="display: block;"></p><p><button class="cancel btn btn-lg btn-default" tabindex="2" style="display: none;">Cancel</button></p></div>';
//echo '<br>' ;
                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }
}

	elseif($cg == "mike+"){
try{
 foreach($ts3_VirtualServer->clientList() as $Clientt){
 if($Clientt['client_unique_identifier'] == $cid) {
 $dbinfo = $Clientt->infoDb();
 $cluid = $dbinfo['client_unique_identifier'];
 $cldb = $dbinfo['client_database_id'];

$ts3_VirtualServer->channelClientPermAssign($channelid,$cldb,b_client_is_priority_speaker);		
}
}
$ts3_VirtualServer->clientGetByUid($cid)->message("تم  اضافة خاصية أفضلية الصوت لك في روم    ".$ChannelName." من قبل| ". $client_info["client_nickname"]." ");
//echo '<div class="sweet-alert showSweetAlert visible" tabindex="-1" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-ouside-click="false" data-has-done-function="false" data-timer="null" style="display: block; margin-top: -182px;margin-left: -19%;"><div class="icon error" style="display: none;"><span class="x-mark"><span class="line left"></span><span class="line right"></span></span></div><div class="icon warning" style="display: none;"> <span class="body"></span> <span class="dot"></span> </div> <div class="icon info" style="display: none;"></div> <div class="icon success animate" style="display: block;"> <span class="line tip animateSuccessTip"></span> <span class="line long animateSuccessLong"></span> <div class="placeholder"></div> <div class="fix"></div> </div> <div class="icon custom" style="display: none;"></div> <h2>تم سحبك إلى روم الشكاوي والإقتراحات</h2><p class="lead text-muted" style="display: block;"></p><p><button class="cancel btn btn-lg btn-default" tabindex="2" style="display: none;">Cancel</button></p></div>';
//echo '<br>' ;
                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }
}
}
}
}
?>

                    <div class="col-lg-6">

<h2>:  قائمة الأعضاء المتصلين في الروم </h2>
<?php 
$icon = $ts3_VirtualServer->channelGetById($ts3_Client->cid)->iconDownload();
if (!empty($icon)){


echo '<h4>   <img src="icon.php?chn='. $ts3_Client->cid . '">'.$ts3_VirtualServer->channelGetById($ts3_Client->cid)->channel_name.' :</h4>';
}else{
echo '<h4>  '.$ts3_VirtualServer->channelGetById($ts3_Client->cid)->channel_name.' :</h4>';
}
?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>ID</th>
                                        <th>Rank</th>
                                    </tr>
                                </thead>

                                <tbody>

<?php
try{
$ts3_VirtualServer->clientListReset();
$ts3_VirtualServer->channelListReset();
foreach($ts3_VirtualServer->channelGetById($ts3_Client->cid)->clientList() as $clientlist) {
$status = $clientlist->getIcon();
                                              $system = $clientlist["client_platform"];
if($system == ServerQuery){
}else{

	
	echo'	
                                    <tr>
                                        <td><a><img src="client_status/'.$status.'.png" style="width:16px;height:16px;"/>  </a><b>'. $clientlist['client_nickname'] .' </td>
<td><b>'. $clientlist['client_unique_identifier'] .'</b></td>                                       
 <td>'; 
$icon = $ts3_VirtualServer->channelGroupGetById($clientlist->client_channel_group_id)->iconDownload();
if (!empty($icon)){
                        echo'
<img src="icon.php?cid='. $clientlist->client_channel_group_id . '">';
}
echo'<b>'. $ts3_VirtualServer->channelGroupGetById($clientlist->client_channel_group_id)->name .'</b></td>
                                    </tr>

<br>';
}
}
                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }




?>
</table>
                                </tbody>

                </div>

                    <div class="col-lg-6">

                        <section class="panel">
                            <header class="panel-heading">
<h4> <?php 
$icon = $ts3_VirtualServer->channelGroupGetById($ts3_Client->client_channel_group_id)->iconDownload();
if (!empty($icon)){
                        echo'
<img src="icon.php?cid='. $ts3_Client->client_channel_group_id . '">';
}

echo $ts3_VirtualServer->channelGroupGetById($ts3_Client->client_channel_group_id)->name?> :  رتبتك </h4>
<hr>
                                <h3> خيارات التحكم </h3>
                            </header>
                            <div class="panel-body">
	                       <br>
<form method="post">
<select name='cg' class='form-control' >";
<option name='clear' value='clear'>إزالة جميع الرتب</option>
<option name='mod' value='mod'>• Channel Moderator إضافة </option>
<option name='mute' value='mute'>[ Mute ] Microphone إضافة</option>
<option name='mute2' value='mute2'>[ Mute ] Keyboard/Chat إضافة </option>
<option name='mute+' value='mute+'>[ Mute+ ] Microphone/Keyboard إضافة </option>
<option name='ban' value='ban'>[ Block ] You Are Not Welcome إضافة  </option>
<option name='skip' value='skip'>• Skip Maximum & Password إضافة </option>
<option name='mike+' value='mike+'> إضافة أفضلية الصوت </option>
<option name='mike-' value='mike-'> إزالة أفضلية الصوت </option>
<input class="form-control" type="text" placeholder="أيدي الشخص" size="50" name="cid"><br>


<center>
         <input class="btn btn-info btn-lg" type="submit" name="submit" value="تشغيل" title="تشغيل العملية">
</select></form><br/>
<br>

<div class="col-md-6" dir="ltr" >

	<form method="post">
	 	<input class="btn btn-danger btn-lg" type="submit" name="closec" value="اغلاق الشات" title="اضغط هنا لإغلاق الشات">
	 <br>

	 	<input class="btn btn-success btn-lg" type="submit" name="openc" value="فتح الشات" title="اضغط هنا لفتح الشات">

	 <br>
</div>

<div class="col-md-6" dir="ltr" >

	 	<input class="btn btn-danger btn-lg" type="submit" name="closek" value="إغلاق المايكات " title="اضغط هنا لإغلاق المايكات">
	 <br>

	 	<input class="btn btn-success btn-lg" type="submit" name="openk" value="فتح المايكات" title="اضغط هنا لفتح المايكات">
	 <br>
</div>
<center>
	 	<input class="btn btn-danger btn-lg" type="submit" name="closer" value="إغلاق  الروم " title="اضغط هنا لإغلاق الروم">
	 <br>

	 	<input class="btn btn-success btn-lg" type="submit" name="openr" value="فتح الروم" title="اضغط هنا لفتح الروم">
<br><br>
<?php
$hiss = $ts3_VirtualServer->channelGetById($ts3_Client->cid); 
if($hiss->getProperty('channel_codec') == 5){
   echo'<button type="submit"  name="music" class="btn btn-info btn-circle" title="اضغط هنا لإرجاع  نوع الروم إلى العادي "><i class="fa fa-music"></i></button>';
}else{
echo '<button type="submit"  name="music" class="btn btn-info btn-circle" title="اضغط هنا ل تغيير نوع الروم الى ميوزك "><i class="fa fa-music"></i></button>';

}

?>
</center>
	 </form>
	 <br>

                            </div>
                        </section>
                        <section class="panel">
                            <header class="panel-heading">
                         <center>       معلومات الغرفة  </center>
                            </header>
                            <div class="panel-body">
<form method="post">

                                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">إسم الغرفة</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" placeholder="<?php 


echo ' '.$ts3_VirtualServer->channelGetById($ts3_Client->cid)->channel_name.'';

?>
" name='name' value="<?php 


echo ' '.$ts3_VirtualServer->channelGetById($ts3_Client->cid)->channel_name.'';

?>
">
                                       
                                    </div>	<form method="post">
<br>

                                        <div class="col-lg-9">
                                        <div class="iconic-input">
                                            <i class="fa fa-chain-broken"></i>
                                            <input type="password" class="form-control" placeholder="كلمة المرور" name='pass'>
                                        </div>

                                        <div class="col-lg-9">


<br>
         <input class="btn btn-info" type="submit" name="change" value="حفظ التعديلات">
</form>
                                </form>
                            </div>
                        </section>



					
                    </div>
                </div>
                </div>

            </div>
        </div>
        <!-- end:main -->
<?php include 'inc/footer.php';?>

</body>

</html>	