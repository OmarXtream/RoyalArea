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
                    <li class="active">المفترس الأعظم</li>
                </ol>
                <!-- end:breadcrumb -->   
<?php
if (isset($_POST['join']))
{
$ts3->serverGroupClientAdd($predators, $client_db);
$ts3_VirtualServer->clientGetByDbid($client_db)->poke("[B]لقد أصبحت مفترس ! ");
						  echo '<div class="alert dark alert-alt alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						  </button><center><strong>
						   لقد أصبحت <a class="alert-link" href="javascript:void(0)">  ! مفترس </a>.
						</div></center></strong>';

echo'<meta http-equiv="refresh" content="1; url=./">';


}
if (isset($_POST['out']))
{
$ts3->serverGroupClientDel($predators, $client_db);
$ts3_VirtualServer->clientGetByDbid($client_db)->poke("[B][COLOR=#ff0000]لقد تركت القافلة ! يا لك من أحمق ! ");

						  echo '<div class="alert dark alert-alt alert-danger alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						  </button><center><strong>
						   لقد قمت <a class="alert-link" href="javascript:void(0)"> بترك القافلة !!! يا لك من أحمق</a>.
						</div></center></strong>';
echo'<meta http-equiv="refresh" content="1; url=./">';


}


?>
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                           <center> The Great Predator | لقب المفترس الأعظم 
                        </h2>
                    </div>
                </div>

                <!-- start:real estates detail -->
                <div class="row" id="real-estates-detail">
                    <div class="col-lg-8 col-md-8 col-xs-12">
                        <div class="panel">
                            <div class="panel-body">
<center> 
                                <ul id="myTab" class="nav nav-pills">
                                   <li class=""><a href="#detail" data-toggle="tab">قافلة المفترس</a></li>
                                </ul>
                                    <div class="tab-pane fade" id="detail">

<div id="pre"></div>
                                </div>

                                </div>
                            </div>
                        </div>

                    <div class="col-lg-4 col-md-4 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <header class="panel-title">
                                    <div class="text-center">
                                        <i class="fa fa-ra fa-3x"></i><br> <strong>المفترس الأعظم</strong>
                                    </div>
                                </header>
                            </div>
                            <div class="panel-body">
                                <div class="text-center" id="author">
                                    <img src="img/co.png">
                                    <h3><i class="fa fa-ra"></i>Name</h3>
                                    <small class="label label-warning">SooN</small><br><br>
                                                                   <strong>الوصف </strong> 
                                </div>
                            </div>
<center>
     <form method='post'>
<?php
if(in_array($predators,$ggids))
{
echo '<button type="submit" name="out" class="btn btn-danger"><i class="fa fa-power-off"></i> ترك القافلة</button>';
}else{

echo '<button type="submit" name="join" class="btn btn-default"><i class="fa fa-bolt"></i> الإنضمام إلى القافلة</button>';
}
?>
</form>



                        </div>
                    </div>
                    </div>

                </div>
                <!-- end:real estates detail -->

            </div>
        </div>
        <!-- end:main -->
    <script src="js/auto1.js" type="text/javascript"></script>

		<?php
        require_once("inc/footer.php");
?>

</body>

</html>	
