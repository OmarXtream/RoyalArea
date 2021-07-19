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
                    <li>سوشل ميديا</li>
                    <li class="active">توب الإنستقرام</li>

                </ol>
                <!-- end:breadcrumb -->   

                <div class="row" id="home-content">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                توب الإنستقرام
                            </header>
                            <table class="table table-striped table-advance table-hover">
                                <thead> 
                                    <tr>
                                        <th><i class="fa fa-bullhorn"></i> الإسم ب تيم سبيك</th>
                                        <th class="hidden-phone"><i class="fa fa-group"></i> عدد المتابعين</th>
                                        <th><i class="fa fa-user"></i> الإسم</th>
                                        <th><i class="fa fa-bookmark"></i> المركز</th>

                                    </tr>
                                </thead>
                                <tbody>
<?php


$response = $db->prepare('SELECT *
FROM insta 
ORDER BY follow DESC LIMIT 10
           ');
$response->execute();
$tops = $response->fetchAll();
$response->CloseCursor();

if($response->rowCount() > 0 )
{
$mrkz = 0;
    foreach($tops as $top) 
    {
$mrkz++;
        $id = (int)$top['id'];
        $name = htmlspecialchars($top['name']);
        $username = htmlspecialchars($top['username']);
        $img = $top['img'];
        $cdb = (int)$top['cdb'];
        $sgroup = (int)$top['sgroup'];
        $followers = $top['follow'];
        $tari5 = htmlspecialchars($top['creation_date']);
$tsname = $ts3_VirtualServer->clientGetNameByDbid("$cdb");
$icon = $ts3_VirtualServer->serverGroupGetById($sgroup)->iconDownload();
if (!empty($icon)){
$sicon = '<img src="icon.php?id='. $sgroup . '">';
}

echo'

                                    <tr>
                                        <td class="hidden-phone"><strong>'.secure($tsname['name']).'</strong></td>
                                        <td><span class="label label-info label-mini">'.$followers.'</span>  '.$sicon.'</td>
                                        <td><a target="_blank" href="https://www.instagram.com/'.$name.'"><strong>'.$username.'</strong><a class="task-thumb" target="_blank" href="https://www.instagram.com/'.$name.'"><img src="'.$img .'" alt=""></a></td>
                                        <td><span class="label label-danger label-mini">'.$mrkz.'</span></td>

                                    </tr>


';
echo'<br>';
    }
}
else
{
    echo '<h2 class="errors"> لا يوجد اي حساب  </h2><hr>';
}

?>
                                </tbody>
                            </table>
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
