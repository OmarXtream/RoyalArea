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
                    <li>الألعاب المفضلة</li>
                </ol>
                <!-- end:breadcrumb -->
<?php
if (isset($_POST['addgame']))
{
global $client_info;

$gameid = $_POST['gameid'];
				  if(in_array($gameid,$_SESSION['ggids'])){
echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>         تم إضافة هذه اللعبة <strong>بالفعل ! </strong></center> 
                                </div>
';
        require_once("inc/footer.php");

die;
}


    $count = 0;

            $server_groups = $ts3->serverGroupList();
            $servergroups = array();
 
            foreach($server_groups as $group) {
                if($group->type != 1) { continue; }
                if(in_array($group["sortid"], $allgames)) {
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
$count++;
}
}

                if($count >= $maxgames){

echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>         لقد تجاوزت الحد الأقصى للألعاب يمكنك إختيار لعبتين <strong>فقط ! </strong></center> 
                                </div>
';
echo'<center><h2>  قم بالإستبدال </h2></center>';

            $server_groups = $ts3->serverGroupList();
            $servergroups = array();
 
            foreach($server_groups as $group) {
                if($group->type != 1) { continue; }
                if(in_array($group["sortid"], $allgames)) {
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
                     echo '                        <div class="panel">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <img src="games/'.$group['id'].'.png" class="img-responsive">
                                    </div>

                                    <div class="col-sm-7">
                                        <h4 class="title-store">
                                            <strong>'.$group["name"].'</strong>   <small>'. CountClientsGroup($group['id']) .' : عدد الاعبين</small>
                                         </h4>
                                        
                                        <hr>
                                        <p>';
                                                                                    include('games/'.$group['id'].'.txt');
                                          echo' </p>
                                        <p>
	<form method="post" action="games.php">
                             <input type="hidden" name="gameid" value="'.$group["id"].'">
                             <input type="hidden" name="newgame" value="'.$gameid.'">


	 	<input class="btn btn-info" type="submit" name="remgame" value="إزالة اللعبة وإستبدالها">




	 </form>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
<br>';
}
}
        require_once("inc/footer.php");

die;
}else{

	if(!isset($_SESSION['ts3_last_query'])){
    $_SESSION['ts3_last_query'] = microtime(true);
	
	if($_SESSION['ts3_last_query'] >= microtime(true)){
	echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>         يمنع السبام الرجاء إنتظار 20 ثواني لتكرار <strong>الأمر  ! </strong></center> 
                                </div>
';
        require_once("inc/footer.php");
die;
}
}
$check = $ts3_VirtualServer->serverGroupGetById($gameid)->sortid;
if(in_array($check,$allgames)){

try{
$ts3->serverGroupClientAdd($gameid, $client_db);

$gamename = $ts3->serverGroupGetById($gameid);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم إضافة اللعبة <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $gameid . '"> '.$gamename.'  

                                </div>
</center>
';

                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }
}
}
}
if (isset($_POST['remgame']))
{
$gameid = $_POST['gameid'];
if(in_array($gameid,$_SESSION['ggids'])){
				  if(!in_array($gameid,$_SESSION['ggids'])){
echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                          <center>    !       تم إزالة هذه اللعبة <strong>بالفعل  </strong></center>
                                </div>
';
}else{
try{

$ts3->serverGroupClientDel($gameid, $client_db);

$gamename = $ts3->serverGroupGetById($gameid);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                      <center>         !       تم إزالة اللعبة <strong>بنجاح  </strong> <br> <img src="icon.php?id='. $gameid . '"> '.$gamename.'
</center>
                                </div>
';
if (isset($_POST['newgame']))
{
$newgame = $_POST['newgame'];
$check = $ts3_VirtualServer->serverGroupGetById($newgame)->sortid;
if(in_array($check,$allgames)){

$ts3->serverGroupClientAdd($newgame, $client_db);
$newgamename = $ts3->serverGroupGetById($newgame);
echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                      <center>         !       تم الإستبدال <strong>بنجاح  </strong><br>
          <img src="icon.php?id='. $newgame . '"> '.$newgamename.'
</center> 
                                </div>
';
}
}
                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }
}
}
}
?>

                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            Games
                        </h2>
                    </div>
                </div>
                <!-- start:games list -->
                <div class="row" id="store-list">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<?php

            $server_groups = $ts3->serverGroupList();
            $servergroups = array();
 
            foreach($server_groups as $group) {
                if($group->type != 1) { continue; }
                if(in_array($group["sortid"], $gamesSide1)) {
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
                     echo '                        <div class="panel">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <img src="games/'.$group['id'].'.png" class="img-responsive">
                                    </div>

                                    <div class="col-sm-7">
                                        <h4 class="title-store">
                                            <strong>'.$group["name"].'</strong>  <small>'. CountClientsGroup($group['id']) .' : عدد الاعبين</small>
                                         </h4>
                                        
                                        <hr>
                                        <p>';
                                                                                    include('games/'.$group['id'].'.txt');
                                          echo' </p>
                                        <p>
	<form method="post" action="games.php">
                             <input type="hidden" name="gameid" value="'.$group["id"].'">

	 	<input class="btn btn-danger delete" type="submit" name="remgame" value="إزالة اللعبة" title="اضغط لإزالة شعار اللعبة">

	 	<input class="btn btn-warning pull-right" disabled type="submit" name="addgame" value="إضافة اللعبة">



	 </form>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

<br>';
                } else {

                     echo '                        <div class="panel">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <img src="games/'.$group['id'].'.png" class="img-responsive">
                                    </div>

                                    <div class="col-sm-7">
                                        <h4 class="title-store">
                                            <strong>'.$group["name"].'</strong>  <small>'. CountClientsGroup($group['id']) .' : عدد الاعبين</small>
                                         </h4>
                                        
                                        <hr>
                                        <p>';
                                                                                    include('games/'.$group['id'].'.txt');
                                          echo' </p>
                                        <p>
	<form method="post" action="games.php">
                             <input type="hidden" name="gameid" value="'.$group["id"].'">

	 	<input class="btn btn-default" disabled type="submit" name="remgame" value="إزالة اللعبة">

	 	<input class="btn btn-warning pull-right" type="submit" name="addgame" value="إضافة اللعبة" title="اضغط لإضافة شعار اللعبة">



	 </form>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>';

echo'<br>';
                }           
            }

?>


                        </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

<?php

            $server_groups2 = $ts3->serverGroupList();
            $servergroups2 = array();
 
            foreach($server_groups2 as $group2) {
                if($group2->type != 1) { continue; }
                if(in_array($group2["sortid"], $gamesSide2)) {
                    $servergroups2[] = array('name' => (string)$group2, 'id' => $group2->sgid, 'type' => $group2->type);
                }
            } 
			$_SESSION['grupos'] = $servergroups2;
        
            foreach($servergroups2 as $group2) {      
                
                $miembros2 = $ts3->serverGroupClientList($group2["id"]);
                $estaengrupo2 = False;
                foreach($miembros2 as $m2) {
                    if($m2["client_unique_identifier"] == $client_uid) { 
                        $estaengrupo2 = True; 
                    }                                   
                }
                
                if($estaengrupo2) {
                     echo '                        <div class="panel">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <img src="games/'.$group2['id'].'.png" class="img-responsive">
                                    </div>

                                    <div class="col-sm-7">
                                        <h4 class="title-store">
                                            <strong>'.$group2["name"].'</strong>   <small>'. CountClientsGroup($group2['id']) .' : عدد الاعبين</small>
                                         </h4>
                                        
                                        <hr>
                                        <p>';
                                                                                    include('games/'.$group2['id'].'.txt');
                                          echo' </p>
                                        <p>
	<form method="post" action="games.php">
                             <input type="hidden" name="gameid" value="'.$group2["id"].'">

	 	<input class="btn btn-danger delete" type="submit" name="remgame" value="إزالة اللعبة" title="اضغط لإزالة شعار اللعبة">

	 	<input class="btn btn-warning pull-right" disabled type="submit" name="addgame" value="إضافة اللعبة">



	 </form>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>';

echo'<br>';
                } else {
                     echo '                        <div class="panel">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <img src="games/'.$group2['id'].'.png" class="img-responsive">
                                    </div>

                                    <div class="col-sm-7">
                                        <h4 class="title-store">
                                            <strong>'.$group2["name"].'</strong>    <small>'. CountClientsGroup($group2['id']) .' : عدد الاعبين</small>
                                         </h4>
                                        
                                        <hr>
                                        <p>';
                                                                                    include('games/'.$group2['id'].'.txt');
                                          echo' </p>
                                        <p>
	<form method="post" action="games.php">
                             <input type="hidden" name="gameid" value="'.$group2["id"].'">

	 	<input class="btn btn-default" disabled type="submit" name="remgame" value="إزالة اللعبة">

	 	<input class="btn btn-warning pull-right" type="submit" name="addgame" value="إضافة اللعبة" title="اضغط لإضافة شعار اللعبة">



	 </form>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

<br>';
                }           
            }

?>
                    </div>


                <!-- end:store list -->

            </div>
        </div>
        <!-- end:main -->

<?php
        require_once("inc/footer.php");
?>


</body>

</html>	
