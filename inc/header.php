<!DOCTYPE html>
<html lang="en">
        <style id="css-main">@font-face{font-family:myFirstFont;src:url(hcdd.ttf)/*tpa=http://ts-mc.cf/assets/fonts/hcdd.ttf*/ format('truetype');unicode-range:U +0600-06EF , U +06FA-0903}@font-face{font-family:dinar2;src:url(ge-dinar2.ttf)/*tpa=http://ts-mc.cf/assets/fonts/ge-dinar2.ttf*/ format("truetype");font-weight:normal;font-style:normal;unicode-range:U +0600-06EF , U +06FA-0903}@font-face{font-family:h-tunisia;src:url(H-Tunisia.ttf)/*tpa=http://ts-mc.cf/assets/fonts/H-Tunisia.ttf*/ format('truetype');unicode-range:U +0600-06EF , U +06FA-0903}@font-face{font-family:h-tunisia;src:url(H-Tunisia-B.ttf)/*tpa=http://ts-mc.cf/assets/fonts/H-Tunisia-B.ttf*/ format('truetype');font-weight:bold;unicode-range:U +0600-06EF , U +06FA-0903}@font-face{font-family:h-pro;src:url(H-Promoter.ttf)/*tpa=http://ts-mc.cf/assets/fonts/H-Promoter.ttf*/ format('truetype');unicode-range:U +0600-06EF , U +06FA-0903}@font-face{font-family:h-pro;src:url(H-Promoter-M.ttf)/*tpa=http://ts-mc.cf/assets/fonts/H-Promoter-M.ttf*/ format('truetype');font-weight:bold;unicode-range:U +0600-06EF , U +06FA-0903}div h1,div h2,div h3,div h4,div p,div.h1,div.h2,div.h3,div.h3{font-family:'Open Sans',dinar2}div{font-family:myFirstFont,'Open Sans'}font1{font-family:myFirstFont,'Open Sans'!important}font2{font-family:dinar2,'Open Sans'!important}.progamer{font-family:h-pro!important;font-weight:bold!important}</style>
		
 <style>
 @font-face {
    font-family: myFirstFont;
    src: url('assets/hcdd.ttf') format('truetype');
}
</style>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<?php
if (isset($pagename)){
echo'<title>RA - '.secure($pagename).'</title>';
}else{
echo'<title>RA - TeamSpeak Panel</title>';
}
?>
	<meta name="description" content="Royal Area WebSite" />
	<meta name="keywords" content="Royal Area" />
	<meta name="author" content="#Mr.omar" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
        <link rel="stylesheet" href="css/check.css">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<link rel="stylesheet" href="css/flexslider.css">
	<link rel="stylesheet" href="css/cn.css">
       <link rel="stylesheet" href="css/hover.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">


<script src="js/jquery.min.js"></script>

<?php
if (isset($profile)){
echo '<link href="css/paper-dashboard.css" rel="stylesheet"/>';
}
?>
    <link rel="stylesheet" href="css/bootstrap-reset.css">
<link rel="shortcut icon" type="image/png" href="http://rarea.cf/RoyalArea-Cp/icon.php?sr=1"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/Style.css">


    <!-- css for this page -->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/raf.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="css/owl.transitions.css">
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->





<script 
src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript"> $(window).load(function() {
	$(".loader").fadeOut("slow");
})
</script>
</head>

<body>

<div class="loader"></div>



    <div id="wrapper">
        <div class="header-top">
            <!-- start:navbar -->
            <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="container">
                    <!-- start:navbar-header -->
                    <div class="navbar-header">
                        <a class="navbar-brand"><i class="fa fa-asterisk"></i> <strong>Royal</strong>Area</a>
                    </div>
                    <!-- end:navbar-header -->
                    <ul class="nav navbar-nav navbar-left top-menu">
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="fa fa-tasks"></i>
                                <span class="badge bg-success">4</span>
                            </a>
                            <ul class="dropdown-menu extended tasks-bar">
                                <div class="notify-arrow notify-arrow-green"></div>
                                <li>
                                 <center>   <p class="green">إحصائيات السيرفر </p></center>
                                </li>
                                <li>
                                     <a href="#">
                                        <div class="task-info">
                                            <div class="desc">RA - لوحة التيم سبيك</div>
                                            <div class="percent">80%</div>
                                        </div>
                                        <div class="progress progress-striped">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                <span class="sr-only">80% Complete (success)</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="task-info">
                                            <div class="desc">RA - سيرفر اقاريو</div>
                                            <div class="percent">10%</div>
                                        </div>
                                        <div class="progress progress-striped">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
                                                <span class="sr-only">10% Complete (warning)</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="task-info">
                                            <div class="desc">RA -  سيرفر التيم سبيك</div>
                                            <div class="percent">100%</div>
                                        </div>
                                        <div class="progress progress-striped">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                <span class="sr-only">100% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="task-info">
                                            <div class="desc">RA - سيرفر ماين كرافت</div>
                                            <div class="percent">30%</div>
                                        </div>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar"  role="progressbar" aria-valuenow="36aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                                                <span class="sr-only">30% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li id="header_notification_bar" class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="fa fa-bell-o"></i>
                                <span class="badge bg-warning">3</span>
                            </a>
                            <ul class="dropdown-menu extended notification">
                                <div class="notify-arrow notify-arrow-yellow"></div>
                                <li>
                                   <center> <p class="yellow">آخبار السيرفر</p></center>
                                </li>
                                <li>
                                    <a href="Predator.php">
                                        <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                        كل إسبوعين يتم إقامة المنافسة على لقب <br>
                                        <center><strong>المفترس الأعظم</strong></center>
										</span>
                                    </a>
                                </li>
                                <li>
                                    
                                        <span class="label label-warning"><i class="fa fa-bell"></i></span>
                                      .  تم إفتتاح الموقع
                                        <span class="small italic"><small>الحمد لله</small></span>
                                    
                                </li><hr>
                                <li>
                                    
                                        <span class="label label-info"><i class="fa fa-bullhorn"></i></span>
                                        اللوحة لاتزال تحت التطوير والبرمجة
                                    
                                </li>
                                <li>
								<br>
                                  <center><strong>يتم تحديث الأخبار بشكل روتيني</strong></center><br>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right top-menu">
                        <li>
                        </li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                              <i class="fa fa-user"></i>  <span class="username"><?php echo secure($client_info["client_nickname"]);?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <div class="log-arrow-up"></div>
                                <li><a href="Profile.php"><i class=" fa fa-suitcase"></i>الملف الشخصي</a></li>
                                <li><a href="features.php"><i class="fa fa-cog"></i> الإعدادات الشخصية</a></li>
                                <li><a href="./"><i class="fa fa-sign-in"></i> رجوع الصفحة الرئيسية </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- end:navbar -->
        </div>
        <div id="header">
            <div class="overlay">
                <nav class="navbar" role="navigation">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="btn-block btn-drop navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                <strong>القائمة</strong>
                            </button>
                        </div>
                    
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav">
                                <li>
									  
                                    <a href="#">
                                        <div class="text-center">
                                            <i class="fa fa-star-half-o fa-3x"></i><br>
                                            العضوية الخاصة
                                        </div>
                                    </a>
                                </li>

                                </li>
                                <li>
									  
                                    <a href="Predator.php">
                                        <div class="text-center">
                                            <i class="fa fa-ra fa-3x"></i><br>
                                            المفترس الأعظم
                                        </div>
                                    </a>
                                </li>
								     <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <div class="text-center">
                                            <i class="fa fa-university fa-3x"></i><br>
                                            الإدارة والشكاوى <span class="caret"></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="help.php"><i class="fa fa-plus-square"></i> تقديم طلب مساعدة او شكوى</a></li>
                                        <li><a href="AdminList.php"><i class="fa fa-list"></i> قائمة الإدارة</a></li>
                                        <li><a href="#"><i class="fa fa-heart"></i> أفضل إداري ل هذا الشهر  </a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <div class="text-center">
                                            <i class="fa fa-paperclip fa-3x"></i><br>
                                            الغرف <span class="caret"></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="Room.php"><i class="fa fa-shield"></i> إنشاء غرفة دائمة</a></li>
                                        <li><a href="ChannelControl.php"><i class="fa fa-edit"></i> التحكم بالغرف</a></li>
                                        <li><a href="#"><i class="fa fa-table"></i> أفضل الغرف </a></li>
                                    </ul>
                                </li>
                                <li>
									  
                                    <a href="Clans.php">
                                        <div class="text-center">
                                            <i class="fa fa-users fa-3x"></i><br>
                                            الكلانات 
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <div class="text-center">
                                            <i class="fa fa-sitemap fa-3x"></i><br>
                                            سوشل ميديا <span class="caret"></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="Youtuber.php"><i class="fa fa-youtube-play"></i> اليوتيوبر</a></li>
                                        <li><a href="Topyoutubers.php"><i class="fa fa-youtube-square"></i> توب اليوتيوبر</a></li>
                                        <li class="divider"></li>
                                        <li><a href="Twitter.php"><i class="fa fa-twitter"></i> تويتر</a></li>
                                        <li><a href="TopTwitter.php"><i class="fa fa-twitter"></i> توب التويتر</a></li>
                                        <li class="divider"></li>
                                        <li><a href="Instagram.php"><i class="fa fa-instagram"></i> الإنستقرام</a></li>
                                        <li><a href="TopInsta.php"><i class="fa fa-instagram"></i> توب الإنستقرام</a></li>

                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <div class="text-center">
                                            <i class="fa fa-glass fa-3x"></i><br>
                                            الأعضاء <span class="caret"></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="TopMembers.php"><i class="fa fa-star"></i> أفضل الأعضاء</a></li>
                                        <li><a href="TopMembers-W.php"><i class="fa fa-star-o"></i> أفضل الأعضاء ل هذا الإسبوع</a></li>
                                        <li><a href="TopMembers-M.php"><i class="fa fa-star-o"></i> الأفضل الأعضاء ل هذا الشهر</a></li>
                                    </ul>
                                </li>
                                <li>
									  
                                    <a href="Shop.php">
                                        <div class="text-center">
                                            <i class="fa fa-shopping-cart fa-3x"></i><br>
                                            المتجر 
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <div class="text-center">
                                            <i class="fa fa-cog fa-3x"></i><br>
                                            الخيارات الرئيسية <span class="caret"></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="games.php"><i class="fa fa-gamepad"></i> الألعاب المفضلة</a></li>
                                        <li class="divider"></li>
                                        <li><a href="features.php"><i class="fa fa-lock"></i> الخصائص الشخصية</a></li>
                                        <li><a href="status.php"><i class="fa fa-lemon-o"></i> الحالات الشخصية</a></li>
                                        <li class="divider"></li>
                                        <li title='لا يزال تحت التطوير'><a id='linkButton'><i class="fa fa-code"></i> تفعيل الأكواد</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div>
                </nav>
            </div>
        </div>
  <script type="text/javascript">

  $(document).ready(function() {
    $('#linkButton').click(function() {
       toastr.info('لا يزال تحت التطوير والبرمجة');
    });
  });
</script>