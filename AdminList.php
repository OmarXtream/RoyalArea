<?php
        require_once("inc/php-header.php");
        require_once("inc/header.php");
?>
 
        <!-- start:main -->
        <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->
                <ol class="breadcrumb">
                    <li>الإدارة والشكاوى</li>
                    <li class="active">قائمة الإدارة</li>

                </ol>
                <!-- end:breadcrumb -->   

                <div class="row" id="home-content">
<center> 
                                    <img src="img/admin/a.gif"><br>
<br><hr>


<br><img src="img/admin/Own1.png">  <img src="img/admin/Own1.png">  <img src="img/admin/Own1.png">  <img src="img/admin/Founder.png">  <img src="img/admin/Own2.png">  <img src="img/admin/Own3.png">  <img src="img/admin/Founder.png">  <img src="img/admin/Own1.png">  <img src="img/admin/Own1.png">  <img src="img/admin/Own1.png"><br>

<?php
    $group = $ts3_VirtualServer->serverGroupGetById(9);
    foreach($group->clientList() as $client)
    {
echo'
<br><br><span style="font-family:Iceberg;font-weight:bold;" class="hvr-buzz">'.$client['client_nickname'].'</span>
'; 
}
?>

<br>
<br>
<div class="col-md-4" dir="ltr" ><br>
<br><img src="img/admin/Coo1.png">  <img src="img/admin/Coo1.png">  <img src="img/admin/Coo1.png">  <img src="img/admin/Coo2.png">  <img src="img/admin/Coo3.png">  <img src="img/admin/Coo1.png">  <img src="img/admin/Coo1.png">  <img src="img/admin/Coo1.png"><br>


<br>
</div>
<div class="col-md-4" dir="ltr" ><br>
<br><img src="img/admin/Co1.png">  <img src="img/admin/Co1.png">  <img src="img/admin/Co1.png">  <img src="img/admin/Co2.png">  <img src="img/admin/Co3.png">  <img src="img/admin/Co1.png">  <img src="img/admin/Co1.png">  <img src="img/admin/Co1.png"><br>
<br>

<br>
</div>
<div class="col-md-4" dir="ltr" ><br>
<br><img src="img/admin/Ma1.png">  <img src="img/admin/Ma1.png">  <img src="img/admin/Ma1.png">  <img src="img/admin/Ma3.png">  <img src="img/admin/Ma2.png">  <img src="img/admin/Ma1.png">  <img src="img/admin/Ma1.png">  <img src="img/admin/Ma1.png"><br>


<br>
</div>
<div class="col-md-3" dir="ltr" ><br><br>
<br><img src="img/admin/Head1.jpg">  <img src="img/admin/Head2.jpg">  <img src="img/admin/Head3.jpg">  <img src="img/admin/Head4.jpg"><br><br>


<br>
</div>
<div class="col-md-3" dir="ltr" ><br><br>
<br><img src="img/admin/Super1.jpg">  <img src="img/admin/Super2.jpg">  <img src="img/admin/Super3.jpg">  <img src="img/admin/Super1.jpg">  <img src="img/admin/Super5.jpg"><br>


<br>
</div>
<div class="col-md-3" dir="ltr" ><br><br>
<br><img src="img/admin/Admin1.jpg">  <img src="img/admin/Admin2.jpg">  <img src="img/admin/Admin3.jpg">  <img src="img/admin/Admin1.jpg">  <img src="img/admin/Admin4.jpg"><br>


<br>
</div>
<div class="col-md-3" dir="ltr" ><br><br>
<br><img src="img/admin/Mod1.jpg">  <img src="img/admin/Mod2.jpg">  <img src="img/admin/Mod3.jpg"><br>


<br>
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
