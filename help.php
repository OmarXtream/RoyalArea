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
                    <li>الإدارة والشكاوى</li>
                    <li class="active">تقديم طلب مساعدة او شكوى</li>

                </ol>
                <!-- end:breadcrumb -->   

                <div class="row" id="home-content">
                        <!--work progress end-->
			<center>
<?php
$clientname = $client_info["client_nickname"];
$cliantID = $client_info["client_unique_identifier"];
$ID = '[B][COLOR=red][URL=client://82/'.$cliantID.']'.secure($clientname).'[/URL][/COLOR][/B]';
if (isset($_POST['submit'])){
$problem = $_POST['name'];
$case = $_POST['case'];
$someone = $_POST['someone'];
$info = $_POST['info'];
if (!empty($problem) and !empty($case) and !empty($someone) and !empty($info)) {
	if(!isset($_SESSION['ts3_last_query']))
    $_SESSION['ts3_last_query'] = microtime(true);
	
	if($_SESSION['ts3_last_query'] >= microtime(true))
	echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>         يمنع السبام الرجاء إنتظار 20 ثواني لتكرار <strong>الطلب  ! </strong></center> 
                                </div>
';

	$_SESSION['ts3_last_query'] = microtime(true)+20.0;
if($ts3_Client->cid != $SupportRoomID){
				$ts3_VirtualServer->ClientGetByUid("$cliantID")->move("$SupportRoomID");
}
				$ts3_VirtualServer->ClientGetByUid("$cliantID")->message('الرجاء الإنتظار :)');
				$ts3_VirtualServer->serverGroupGetById("$SupportAccess")->message("
[B]
نوع الطلب :
$case

العنوان:
$problem
إسم العضو : 
$ID

إسم المتهم أو الذي يوافقه الرأي :
$someone

تنويه أو ملاحظة :
$info
[/B]
");
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>         تم تقديم طلبك <strong>بنجاح  ! </strong></center> 
                                </div>
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>         الرجاء إنتظار <strong>السبورت  ! </strong></center> 
                                </div>

';


}else{
echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>         الرجاء إكمال حقول <strong>الطلب  ! </strong></center> 
                                </div>
';


}
				}

?>

<h1 class="page-header">RA# Support | بوت المساعدة </h1>


                    <div class="col-lg-6">

<h2>:  قائمة السبورت المتصلين </h2>
<div id="sp"></div>

                </div>
<form method="post">

                    <div class="col-lg-6">
                        <section class="panel">
                            <header class="panel-heading">
<h4>نموذج الطلب </h4>

<hr>
                            </header>

                        <section class="panel">
                            <div class="panel-body">
                                    <div class="form-group">

                                <form class="form-horizontal" role="form">
                                        <div class="col-lg-9">
                                            <div class="iconic-input">
<select name='case' class='form-control' >
<option name='إقتراح' value='إقتراح'>إقتراح</option>
<option name='شكوى' value='شكوى'>شكوى</option>
<option name='طلب مساعدة' value='طلب مساعدة'>طلب مساعدة</option>
<option name='إستفسار' value='إستفسار'>إستفسار</option>
<option name='أخرى' value='أخرى'>أخرى</option>
</select><br/>


                                        </div>
                                    </div>
                                        <label class="col-lg-3 col-sm-3 control-label">نوع الطلب</label>
                                        <div class="col-lg-9">
                                <form role="form">
                                    <div class="form-group">
                                        <div class="iconic-input">
                                            <i class="fa fa-bullhorn"></i>
                                            <input type="text" class="form-control" placeholder="العنوان" name='name'>
                                        </div>
                                    </div>
                                    </div>
                                        <label class="col-lg-3 col-sm-3 control-label">العنوان</label>

                                        <div class="col-lg-9">
                                <form role="form">
                                    <div class="form-group">
                                        <div class="iconic-input">
                                            <i class="fa fa-user"></i>
<select name='someone' class='form-control'>
<option name='لا يوجد' value='لا يوجد' :- لايوجد</option>
 <?php
foreach($ts3->clientList() as $chl){
$system = $chl["client_platform"];
if($system == ServerQuery){
}else{
$names = secure($chl["client_nickname"]);
if($names != $client_info["client_nickname"]){
echo'<option name="'.$names.'" value="'.$names.'"> '.$names.'</option>';
}
}


}

?>
</select><br/>
                                        </div>
                                    </div>
                                    </div>
                                        <label class="col-lg-3 col-sm-3 control-label">إسم المتهم أو الذي يوافقه الرأي</label>

                                        <div class="col-lg-9">
                                <form role="form">
                                    <div class="form-group">
                                        <div class="iconic-input">
                                            <i class="fa fa-chain-broken"></i>
                                            <input type="text" class="form-control" placeholder="تنويه أو ملاحظة" name='info'>
                                        </div>
                                    </div>
                                    </div>
                                        <label class="col-lg-3 col-sm-3 control-label">تنويه أو ملاحظة</label>

                                        <div class="col-lg-9">


<center>
         <input class="btn btn-info" type="submit" name="submit" value="تقديم الطلب">
</form>

                                        </div>
                                    </div>

                                        </div>

                        </section>



					
                    </div>
                </div>
                </div>

            </div>
        </div>
        <!-- end:main -->
    <script src="js/auto2.js" type="text/javascript"></script>


<?php include 'inc/footer.php';?>

</body>

</html>	