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
                    <li>الخيارات الرئيسية</li>
                    <li class="active">تفعيل الأكواد</li>

                </ol>

                <div class="row" id="home-content">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                          <center> <strong> تفعيل الأكواد </strong></center>
                        </h2>
                    </div>
                </div>
<?php
if(isset($_POST['submit']) && isset($_POST['code'])){
$code = $_POST['code'];

    $response = $db->prepare('SELECT * FROM cods');
    $response->execute();
    $cods = $response->fetchAll();
    $response->CloseCursor();

$codeit = false;
    foreach($cods as $cod) {

if($cod['code'] == $code){
$codehis = $cod['code'];
$check = $cod['dbid'];
$prize = $cod['sgid'];
$TheEnd = $cod['endtime'];
$codeit = true;

}
if(isset($codehis)){
if($codehis == $code and $check == 0){
        $stmt = $db->prepare('UPDATE cods 
                SET dbid = :db
                WHERE code = :cd
                ');
        $stmt->bindValue(':cd', $code, PDO::PARAM_STR);
        $stmt->bindValue(':db', $client_db,  PDO::PARAM_INT);
        $stmt->execute();        
        $stmt->CloseCursor();
if(!in_array($prize,$ggids)){

$ts3->serverGroupClientAdd($prize, $client_db);
}
$rankname = $ts3->serverGroupGetById($prize);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     <strong>تم تفعيل الكود بنجاح ! لقد حصلت على :</strong> <br> <img src="icon.php?id='. $prize . '"> '.$rankname.'  <br>
                     <strong> تاريخ إنتهاء صلاحية الكود :<br> '.$TheEnd.' </strong>

                                </div>
</center>
';
			break;

}else{
if($codehis == $code and $check != 0){
echo '<script language="javascript">';
echo "toastr.info('تم إستخدام هذا الكود بالفعل !');";
echo '</script>';
			break;

}
}
}
}
	if($codeit !== true){
echo '<script language="javascript">';
echo "toastr.warning('كود خاطىء !');";
echo '</script>';
}
}
?>
                <section class="panel">
                    <header class="panel-heading">
                      <center> <h2> ماهو الكود ؟ ومافائدته ؟ وكيف يتم الحصول عليه ؟</h2>
                    </header>
                    <div class="panel-body"> 
                        <div class="row">
                               <center> <p>الكود يا صاحبي ب كل اختصار هو عباره عن شفره او رمز يتم الحصول عليها في المسابقات والفعاليات <br>
                                     </p>ولكل كود جائزة قيمه يتم تحديدها او تكون مجهوله ^_^.<br>
<hr>
<center>
     <form method="post">
                                            <center><input type="text" class="form-control" placeholder="الكود" name="code"><br>


                                       
                            <center><button type="submit" name="submit" class="btn btn-primary start"><i class="glyphicon glyphicon-ok"></i> تفعيل الكود</button>

                                <br></center>


        </div>
        </div>

        <!-- end:main -->

		<?php
        require_once("inc/footer.php");
?>

</body>

</html>	
