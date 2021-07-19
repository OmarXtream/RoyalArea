<?php
        require_once("inc/php-header.php");
        require_once("inc/header.php");
?>
 
  <script type="text/javascript">
  $(document).ready(function() {
    toastr.options.timeOut = 2000; 
    toastr.info('الموقع  لا يزال تحت التطوير والبرمجة');
  });
  </script>

        <!-- start:main -->
        <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->
                <ol class="breadcrumb">
                    <li>الصفحة الرئيسية</li>
                    <li class="active">صفحة الإستقبال</li>
                </ol>
                <!-- end:breadcrumb -->   

                <div class="row" id="home-content">
                    <div class="col-lg-8">
<?php
	$gfximgurl = $ts3_VirtualServer->virtualserver_hostbanner_gfx_url;


echo'<center><img class="push-50-t ss" height="100" width="600" src="'.$gfximgurl.'" ></center>';

?>

                    </div>
					
                    <div class="col-lg-4">

                        <!-- start:user info table -->
                        <section class="panel">
						                            <div class="panel-body">
                                <a href="#" class="task-thumb">
                                    <img src="<?php 
			  
			  if($client_info["client_flag_avatar"])
		{
			try{
				$download = $ts3_VirtualServer->transferInitDownload($client_info->getId(), 0, $client_info->avatarGetName());
				echo "avatar.php?ftdata=" . base64_encode(serialize($download)) ."";
			}catch (Exception $e) {	
				echo 'img/co.png';
			}
		}else{
			echo 'img/co.png';
		}
			  
			  ?>" alt="">
                                </a>
                                <div class="task-thumb-details">
                                    <h1> مرحبا بك <?php echo secure($client_info["client_nickname"]);?></h1>
<?php
$ggids = explode(",", $client_info["client_servergroups"]);
if(in_array($RAadmin,$ggids))
{
echo '<strong><p style="color:#151B54">إداري</p></strong>';
}
elseif(in_array($vipid,$ggids))
{
echo '<p style="color:#E8A317">VIP</p>';

}
else{
echo 'عضو';

}

?>
                                </div>
                            </div>

                            <table class="table table-hover personal-task">
                                <tbody>
                                    <tr>
<?php
	$serverInfo = $ts3_VirtualServer->getInfo();
  $On = $serverInfo["virtualserver_clientsonline"];
  $slotsReserved = $serverInfo["virtualserver_queryclientsonline"];
  $slotsAvailable = $On - $slotsReserved;
             echo'<td>'.$slotsAvailable.'</td>';
?>
                                        <td><strong>: عدد الأعضاء المتصلين</strong></td>
										<td>
                                            <i class=" fa fa-users"></i>
                                        </td>

                                    </tr>
									
                                    <tr>
									       <td><?php 
$ad1 = OnlineOf($SupportAccess); 
$ad2 = OnlineOf($ActAccess);

print $ad1 + $ad2; ?>
</td>
                                        <td> <strong>: عدد الأدمنية المتصلين</strong></td>

                                        <td>
                                            <i class="fa fa-gavel"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo OnlineOf($musicbot); ?></td>
                                        <td> <strong>: عدد بوتات الميوزك</strong></td>
										  <td>
                                            <i class="fa fa-music"></i>
                                        </td>

                                    </tr>
									
                                    <tr>
                                        <td><?php echo OnlineOf($vipid); ?></td>
                                        <td> <strong>: عدد كبار الشخصيات</strong></td>
										      <td>
                                            <i class="fa fa-star-half-o"></i>
                                        </td>

                                    </tr>
									      <tr>
                                        <td>
<?php
$phones = 0;
                foreach ($ts3_VirtualServer->clientList() as $cl) {
                                        if ($cl["client_platform"] != Windows and $cl["client_platform"] != Linux and $cl["client_platform"] != ServerQuery) {
$phones++;
}
}
echo $phones;

?>
</td>
                                        <td> <strong>: عدد الاعضاء المتصلين من الجوال</strong></td>
										      <td>
                                            <i class="fa fa-android"></i>
											<i class="fa fa-apple"></i>

                                        </td>

                                    </tr>


                                </tbody>
                            </table>
                        </section>
                        <!-- end: info table -->
                    </div>
<div class="content bg-white">
    <div class="row push-3-t push-3">
        <div class="col-md-6 col-md-offset-3">
     <center>     <p><marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="3" scrolldelay="60" direction="right"><b><a  title="اللوحة لا تزال تحت التطوير والبرمجة" target="_blank"></a></b><b><a title="" target="_blank"><span id="movetitle"><i class="ti-heart"></i> مرحبا بك في لوحة التيم سبيك الخاصة بالمنطقة الملكية , تم انشاء هذه اللوحة لأعطائك صلاحيات تمكنك من التحكم في عضويتك بكل سهولة , اللوحة لازالت تحت التطوير , كرر زيارتك مرة اخرى</span></a> </b><b><a  title="#Mr.omar * 6lal_ :المسؤول عن اللوحة " target="_blankB.MC#" لاتزال="" اللوحة="" تحت="" التطوير="" والبرمجة)="" ..<="" a="">   </a></b></marquee></p>
		  </center>
        </div>
</div>
</div>

                </div>

            </div>
        </div>
        <!-- end:main -->
<?php include 'inc/footer.php';?>

</body>

</html>	