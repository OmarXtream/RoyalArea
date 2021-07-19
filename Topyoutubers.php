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
                    <li class="active">توب اليوتيوبر</li>

                </ol>
                <!-- end:breadcrumb -->   

                <div class="row" id="home-content">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                توب اليوتيوبر
                            </header>
                            <table class="table table-striped table-advance table-hover">
                                <thead> 
                                    <tr>
                                        <th><i class="fa fa-bullhorn"></i> الإسم ب تيم سبيك</th>
                                        <th class="hidden-phone"><i class="fa fa-group"></i> عدد المشتركين</th>
                                        <th><i class="fa fa-user"></i> الإسم</th>
                                        <th><i class="fa fa-bookmark"></i> المركز</th>

                                    </tr>
                                </thead>
                                <tbody>
<?php


$response = $db->prepare('SELECT *
FROM youtube 
ORDER BY sub DESC LIMIT 10
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
        $img = $top['img'];
        $cdb = (int)$top['cdb'];
        $sgroup = (int)$top['sgroup'];
        $followers = $top['sub'];
        $IDCHANNEL = $top['YTID'];
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
                                        <td><a target="_blank" href="https://www.youtube.com/channel/'.$IDCHANNEL.'"><strong>'.$name.'</strong><a class="task-thumb" target="_blank" href="https://www.youtube.com/channel/'.$IDCHANNEL.'"><img src="'.$img .'" alt=""></a></td>
                                        <td><span class="label label-danger label-mini">'.$mrkz.'</span></td>

                                    </tr>


';
echo'<br>';
    }
}
else
{
    echo '<h2 class="errors"> لا يوجد اي قناة مرتبطه حاليا  </h2><hr>';
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
