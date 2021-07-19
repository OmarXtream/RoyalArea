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
                    <li>الخيارات الرئيسية</li>
                    <li class="active">الخصائص الشخصية</li>

                </ol>
                <!-- end:breadcrumb -->   

                <div class="row" id="home-content">
                        <!--work progress end-->

                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                         <center>   الخصائص الشخصية  </center>
                        </h2>
                    </div>
                </div>
<?php
if (isset($_POST['add'])){
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

$addid = $_POST['addid'];
$check = $ts3_VirtualServer->serverGroupGetById($addid)->sortid;

if(in_array($check,$SID_GROUP)){
try{

$ts3->serverGroupClientAdd($addid, $client_db);

$addname = $ts3->serverGroupGetById($addid);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                      <center>         !       تم إضافة الخاصيه <strong>بنجاح   <br>  '.$addname.'</strong>
</center>
                                </div>
';
                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }
}
}
}
if (isset($_POST['rem'])){

$remid = $_POST['remid'];
if(in_array($remid,$ggids)){
try{

$ts3->serverGroupClientDel($remid, $client_db);

$remname = $ts3->serverGroupGetById($remid);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                      <center>         !      تم إزالة الخاصية <strong>بنجاح  <br>  '.$remname.'</strong>
</center>
                                </div>
';
                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }
}
}
?>
<center>
                <div class="row" id="real-estates-columns">
<?php
$SID_GROUP = array(142);

            $server_groups = $ts3->serverGroupList();
            $servergroups = array();
 
            foreach($server_groups as $group) {
                if($group->type != 1) { continue; }
                if(in_array($group["sortid"], $SID_GROUP)) {
                    $servergroups[] = array('name' => (string)$group, 'id' => $group->sgid, 'type' => $group->type);
                }
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

echo '

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <div class="panel">
                            <div class="panel-body">
                                 
<img src="features/'.$group['id'].'.png" class="img-responsive">
                                <div class="title-realestates-columns">
                                    <h3 style="color:green"><strong>'.$group["name"].' </strong></a></h3>
                                    <small class="label label-success"><i class="fa fa-dot-circle-o"></i> مفعل</small>
                                    <hr>
                                    <p><strong> ';
                                                                                    include('features/'.$group['id'].'.txt');
                                          echo' 
</strong></p><br>
                                </div>
                                <div class="footer-realestates-columns">
                                    <div class="row">
                                      <form method="post">
                             <input type="hidden" name="remid" value="'.$group['id'].'">

         <input class="btn btn-danger btn-block" type="submit" name="rem" value="إلغاء التفعيل" title="اضغط لإلغاء تفعيل الخاصية">

</form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
';




}else{
echo '

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <div class="panel">
                            <div class="panel-body">
                                <img src="features/'.$group['id'].'.png" class="img-responsive">
                                <div class="title-realestates-columns">
                                    <h3 style="color:red"><strong>'.$group["name"].' </strong></a></h3>
                                    <small class="label label-danger"><i class="fa fa-circle-o"></i> غير مفعل</small>
                                    <hr>
                                    <p><strong> ';
                                                                                    include('features/'.$group['id'].'.txt');
                                          echo' 
</strong></p><br>
                                </div>
                                <div class="footer-realestates-columns">
                                    <div class="row">
                                      <form method="post">
                             <input type="hidden" name="addid" value="'.$group['id'].'">

         <input class="btn btn-success btn-block" type="submit" name="add" value="تفعيل" title="اضغط ل تفعيل الخاصية">

</form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
';
}
}
?>











                        </div>
		
                </div>

            </div>
        </div>
        <!-- end:main -->
<?php include 'inc/footer.php';?>

</body>

</html>	
