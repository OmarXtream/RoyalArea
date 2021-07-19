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
                    <li class="active">الحالات</li>

                </ol>
                <!-- end:breadcrumb -->   
<?php
if (isset($_POST['rem']))
{
$iconid = $_POST['icon'];
$ts3_VirtualServer->clientPermRemove($dbid,
'i_icon_id');	
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>        <strong>تم إزالة الحالة بنجاح ! </strong></center> 
                                </div>
';


}

if (isset($_POST['submit']))
{
$icon = $_POST['icon'];
try{
$ts3_VirtualServer->clientPermAssign($dbid,
'i_icon_id',
$icon,
$permskip = FALSE);	

echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>      <strong> تم وضع الحالة بنجاح </strong> <br> [ <img src="icon.php?ic='. $dbid . '"> ] 
                                </div>
';
                }      
                catch (Exception $e) { 
                        echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
                        die;
                        }

}
?>

                <div class="row" id="home-content">
                        <!--work progress end-->
                <div class="row">

                    <div class="col-lg-12">
                        <h2 class="page-header">
                         <center>   الحالات الشخصية   </center>

                        </h2>
                    </div>
                </div>


<br>

<center>
<div class="col-md-3" dir="ltr" >
<font size="4" face="VIP">«« • <font color="red">السوشال ميديا</font>  • »»</font><br><br>

<?php
foreach($social as $icon){
echo'

	<form method="post">
                             <input type="hidden" name="icon" value="'.$icon.'">

                           <br> <button type="submit"  name="submit" class="btn btn-info btn-circle btn-xs"><img src="ic/'.$icon.'.png"></button>
                </form>';
}

?>

<br>

</div>
<div class="col-md-6" dir="ltr" >
<font size="4" face="VIP">«« • <font color="red">الأندية</font>  • »»</font><br><br>

<?php
foreach($football as $icon2){
echo'
	<form method="post">
                             <input type="hidden" name="icon" value="'.$icon2.'">

                           <br> <button type="submit"  name="submit" class="btn btn-info btn-circle btn-xs"><img src="ic/'.$icon2.'.png"></button>
                </form>';
}

?>

<br>
<?php
try{
    $percl = $ts3_VirtualServer->clientPermList($dbid,'i_icon_id');
    foreach($percl as $per => $key)
    {
if($per == 'i_icon_id'){

$hisiconn = $key['permvalue'];
echo' 
<small><form method="post"><button type="submit" name="rem" class="btn btn-danger delete btn-xs" title="إزالة الحالة"> - <img src="icon.php?ic='.$dbid.'"><i class="glyphicon glyphicon-remove"></i></button></form></small>  
';
}
}
                }      
                catch (Exception $e) { 
                        }

?>
<br>
</div>
<font size="4" face="VIP">«« • <font color="red">الرموز</font>  • »»</font><br><br>
<?php
foreach($signs as $icon3){
echo'
	<form method="post">
                             <input type="hidden" name="icon" value="'.$icon3.'">

                           <br> <button type="submit"  name="submit" class="btn btn-info btn-circle btn-xs"><img src="ic/'.$icon3.'.png"></button>
                </form>';
}

?>


<br>
</div>

</div>

    </div>
        </div>
        <!-- end:main -->
<?php include 'inc/footer.php';?>

</body>

</html>	