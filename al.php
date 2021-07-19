<?php
        require_once("inc/php-header.php");
        require_once("inc/header.php");
?>

        <!-- start:main -->
        <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->
                <ol class="breadcrumb">
                    <li><a href="index.php">الإدارة والشكاوي</a></li>
                    <li class="active">قائمة الإدارة</li>
                </ol>
                <!-- end:breadcrumb -->   

                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                           <center> Administration List
                        </h2>
                    </div>
                </div>



<center> 

                                    <img src="img/adminlist.png">
<br>
<br>
<div class="col-md-4" dir="ltr" >

 <img src="img/admin/Own1.png">  <img src="img/admin/Own1.png">  <img src="img/admin/Own1.png">  <img src="img/admin/Own2.png">  <img src="img/admin/Own3.png">  <img src="img/admin/Own1.png">  <img src="img/admin/Own1.png">  <img src="img/admin/Own1.png">
<br>
<br>

<?php
    $group = $ts3_VirtualServer->serverGroupGetById(9);
    foreach($group->clientList() as $client)
    {
$random = rand(1,20);
echo'
<span style="font-family:Iceberg;font-weight:bold;" class="hvr-bounce-in">'.$client['client_nickname'].'</span>
'; 
}
?>
</div>
<div class="col-md-4" dir="ltr" >

 <img src="img/admin/Coo1.png">  <img src="img/admin/Coo1.png">  <img src="img/admin/Coo1.png">  <img src="img/admin/Coo2.png">  <img src="img/admin/Coo3.png">  <img src="img/admin/Coo1.png">  <img src="img/admin/Coo1.png">  <img src="img/admin/Coo1.png">
<br>
</div>
<div class="col-md-4" dir="ltr" >


<br>
 <img src="img/admin/Co1.png">  <img src="img/admin/Co1.png">  <img src="img/admin/Co1.png">  <img src="img/admin/Co2.png">  <img src="img/admin/Co3.png">  <img src="img/admin/Co1.png">  <img src="img/admin/Co1.png">  <img src="img/admin/Co1.png">
<br>
</div>
<div class="col-md-4" dir="ltr" >


<br>
 <img src="img/admin/Ma1.png">  <img src="img/admin/Ma1.png">  <img src="img/admin/Ma1.png">  <img src="img/admin/Ma3.png">  <img src="img/admin/Ma2.png">  <img src="img/admin/Ma1.png">  <img src="img/admin/Ma1.png">  <img src="img/admin/Ma1.png">
<br>

</div>
<div class="col-md-4" dir="ltr" >

<br>
 <img src="img/admin/Head1.jpg">  <img src="img/admin/Head2.jpg">  <img src="img/admin/Head3.jpg">  <img src="img/admin/Head4.jpg">
<br>

</div>
<div class="col-md-4" dir="ltr" >

<br>
 <img src="img/admin/Super1.jpg">  <img src="img/admin/Super2.jpg">  <img src="img/admin/Super3.jpg">  <img src="img/admin/Super1.jpg">  <img src="img/admin/Super5.jpg">
<br>
</div>
<div class="col-md-4" dir="ltr" >


<br>
 <img src="img/admin/Admin1.jpg">  <img src="img/admin/Admin2.jpg">  <img src="img/admin/Admin3.jpg">  <img src="img/admin/Admin1.jpg">  <img src="img/admin/Admin4.jpg">
<br>
</div>
<div class="col-md-4" dir="ltr" >


<br>
 <img src="img/admin/Mod1.jpg">  <img src="img/admin/Mod2.jpg">  <img src="img/admin/Mod3.jpg">
<br>
</div>

        <!-- end:main -->

		<?php
        require_once("inc/footer.php");
?>

</body>

</html>	
