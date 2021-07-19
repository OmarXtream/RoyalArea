<?php
        require_once("inc/php-header.php");
        require_once("inc/header.php");
?>
	<link rel="stylesheet" href="css/custom.min.css">

        <!-- start:main -->
        <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->
                <ol class="breadcrumb">
                    <li><a href="#">الصفحة الرئيسية</a></li>
                    <li class="active">المتجر</li>
                </ol>
                <!-- end:breadcrumb -->   
<?php
if (isset($_POST['free']))
{
if(in_array($FreeVip,$ggids))
{
						  echo '<div class="alert dark alert-alt alert-info alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						  </button><center><strong>
						   لقد تم تفعيلها <a class="alert-link" href="javascript:void(0)">  بالفعل !</a>.
						</div></center></strong>';

}else{
$ts3->serverGroupClientAdd($FreeVip, $client_db);
$ts3_VirtualServer->clientGetByDbid($client_db)->poke("[B]تم التفعيل V.I.P Gift ! ");
						  echo '<div class="alert dark alert-alt alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						  </button><center><strong>
						   لقد تم تفعيل <a class="alert-link" href="javascript:void(0)">  ! V.I.P Gift</a>.
						</div></center></strong>';
}
}
?>

                <div class="row" id="home-content">
		        <div class="right_col" role="main">
<center>
          <H3> Shop | المتجر</H3>
		              <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height:600px;">
                  <div class="x_title">
                    <h2>V.I.P Shop | متجر العضويات الخاصة</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="row">

                      <div class="col-md-12">

                        <!-- price element -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                           <div class="pricing ui-ribbon-container">
							<div class="ui-ribbon-wrapper">
                              <div class="ui-ribbon">
                               إفتتاح اللوحة
                              </div>
                            </div>
                             </div>
							<div class="title">
                              <h2>V.I.P Gift</h2>
                              <h1>free | مجانآ</h1>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-times text-danger"></i> تجاوز <strong> الرومات المقفلة</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>فتح </strong> المايك</li>
                                    <li><i class="fa fa-check text-success"></i> استخدام <strong>  شنل كومندر</strong></li>
                                    <li><i class="fa fa-times text-danger"></i> <strong>امتلاك ايقونة خاصة</strong></li>
                                    <li><i class="fa fa-check text-success"></i>  Anti  <strong> Flood</strong></li>
                                    <li><i class="fa fa-times text-danger"></i> <strong>حماية</strong> ضد الباند</li>
                                    <li><i class="fa fa-times text-danger"></i> <strong>صفحة</strong> خاصة بالعضوية</li>
									<li><i class="fa fa-times text-danger"></i> <strong>غرفة</strong> خاصة</li>

                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
<?php
if(in_array($FreeVip,$ggids))
{
echo'<a class="btn btn-info btn-block" role="button"><span>! مفعله</span></a>';

}else{
  echo'   <form method="post">
 <button type="submit" name="free" class="btn btn-success btn-block" role="button" >شراء الآن <span>| Buy now!</span></button>
</form>
';

}
?>
                                <p>
                                  <a>هذه الرتبة مجانية بمناسبة إفتتاح اللوحة</a>
                                </p>

                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- price element -->

                        <!-- price element -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                           <div class="pricing ui-ribbon-container">
                            <div class="ui-ribbon-wrapper">
                              <div class="ui-ribbon">
                               Offer %50
                              </div>
                            </div>
                             </div>
                            <div class="title">
                              <h2>V.I.P Bronze</h2>
                              <h1><del><small>20</small></del>10 SR </h1>

                              <span>Monthly | شهريا</span>

                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-times text-danger"></i> تجاوز <strong> الرومات المقفلة</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>فتح </strong> المايك</li>
                                    <li><i class="fa fa-check text-success"></i> استخدام <strong>  شنل كومندر</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>امتلاك ايقونة خاصة</strong></li>
                                    <li><i class="fa fa-check text-success"></i>  Anti  <strong> Flood</strong></li>
                                    <li><i class="fa fa-times text-danger"></i> <strong>حماية</strong> ضد الباند</li>
                                    <li><i class="fa fa-times text-danger"></i> <strong>صفحة</strong> خاصة بالعضوية</li>
									<li><i class="fa fa-check text-success"></i> <strong>غرفة</strong> خاصة</li>
                                  </ul>

                                </div>
                              </div>
                              <div class="pricing_footer">

                                <a href="#" class="btn btn-success btn-block" role="button">شراء الآن <span>| Buy now!</span></a>

							  </div>
							 
                            </div>
                          </div>
                        </div>

                        <!-- price element -->

                        <!-- price element -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                           <div class="pricing ui-ribbon-container">
                            <div class="ui-ribbon-wrapper">
                              <div class="ui-ribbon">
                               Offer %50
  						     </div>
                            </div>
                             </div>
                            <div class="title">
                              <h2>V.I.P Silver</h2>
                              <h1><del><small>40</small></del>20 SR</h1>
                              <span>Monthly | شهريا</span>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-check text-success"></i> تجاوز <strong> الرومات المقفلة</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>فتح </strong> المايك</li>
                                    <li><i class="fa fa-check text-success"></i> استخدام <strong>  شنل كومندر</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>امتلاك ايقونة خاصة</strong></li>
                                    <li><i class="fa fa-check text-success"></i>  Anti  <strong> Flood</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>حماية</strong> ضد الباند</li>
                                    <li><i class="fa fa-times text-danger"></i> <strong>صفحة</strong> خاصة بالعضوية</li>
									<li><i class="fa fa-check text-success"></i> <strong>غرفة</strong> خاصة</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a href="#" class="btn btn-success btn-block" role="button">شراء الآن <span>| Buy now!</span></a>

                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- price element -->

                        <!-- price element -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="title">
                              <h2>V.I.P Gold</h2>
                              <h1>60 SR</h1>
                              <span>Monthly | شهريا</span>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-check text-success"></i> تجاوز <strong> الرومات المقفلة</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>فتح </strong> المايك</li>
                                    <li><i class="fa fa-check text-success"></i> استخدام <strong>  شنل كومندر</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>امتلاك ايقونة خاصة</strong></li>
                                    <li><i class="fa fa-check text-success"></i>  Anti  <strong> Flood</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>حماية</strong> ضد الباند</li>
                                    <li><i class="fa fa-check text-success"></i> <strong>صفحة</strong> خاصة بالعضوية</li>
									<li><i class="fa fa-check text-success"></i> <strong>غرفة</strong> خاصة</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a href="#" class="btn btn-success btn-block" role="button">شراء الآن <span>| Buy now!</span></a>
							  </div>
                            </div>
                          </div>
                        </div>


                        <!-- price element -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
