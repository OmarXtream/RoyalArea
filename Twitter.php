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
                    <li class="active">تويتر</li>

                </ol>
                <!-- end:breadcrumb -->   

                <div class="row" id="home-content">
<?php
if (isset($_POST['rem'])){
    $response = $db->prepare('SELECT * FROM tweat');
    $response->execute();
    $tweatr = $response->fetchAll();
    $response->CloseCursor();
		
    foreach($tweatr as $checke) {

        if ($checke['cdb'] == $client_db) {
$user = secure($checke['name']);
$tweatrank = $checke['sgroup'];

$ts3->serverGroupClientDel($tweatrank, $client_db);
    $stmt = $db->prepare('DELETE FROM tweat WHERE cdb = :cb');
    $stmt->bindValue(':cb',$client_db,PDO::PARAM_INT);
    $stmt->execute();
    $stmt->CloseCursor(); 
$ts3_VirtualServer->clientGetByDbid($client_db)->poke("[B]تم الغاء ربط حسابك في تويتر !");

echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>        <strong>تم الغاء ربط حسابك في تويتر ! </strong></center> 
                                </div>
';
	$_SESSION['tweat'] = microtime(true)+600;
        require_once("inc/footer.php");
die;
}
}
}

if (isset($_POST['send']))
{
$user = secure($_POST['user']);
if (empty($user)){
echo'
                                <div class="alert alert-info alert-bordered alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                    <center><strong>الرجاء وضع إسم حسابك في الخانة</strong>   </center>
                                </div>
';
}else{

$token = '851910856933769216-3AiWPdw6c6QgPmCirLsddIe6YE6koWv';
$token_secret = 'yj8m2rsvmEdB9ivJ1azIVZ1aQU8U2kMjiS7LZSEl42Lr2';
$consumer_key = 'CS6Pry0EkJ7KbTwUl6nh81kHP';
$consumer_secret = 'WO1SH3ojUc8gxVsutwQH6XKo05uVSXbDHf3hrzQbgPWAwEfnPX';

$host = 'api.twitter.com';
$method = 'GET';
$path = '/1.1/statuses/user_timeline.json'; // api call path

$query = array( // query parameters
    'screen_name' => "$user",
    'count' => '2'
);

$oauth = array(
    'oauth_consumer_key' => $consumer_key,
    'oauth_token' => $token,
    'oauth_nonce' => (string)mt_rand(), // a stronger nonce is recommended
    'oauth_timestamp' => time(),
    'oauth_signature_method' => 'HMAC-SHA1',
    'oauth_version' => '1.0'
);

$oauth = array_map("rawurlencode", $oauth); // must be encoded before sorting
$query = array_map("rawurlencode", $query);

$arr = array_merge($oauth, $query); // combine the values THEN sort

asort($arr); // secondary sort (value)
ksort($arr); // primary sort (key)

// http_build_query automatically encodes, but our parameters
// are already encoded, and must be by this point, so we undo
// the encoding step
$querystring = urldecode(http_build_query($arr, '', '&'));

$url = "https://$host$path";

// mash everything together for the text to hash
$base_string = $method."&".rawurlencode($url)."&".rawurlencode($querystring);

// same with the key
$key = rawurlencode($consumer_secret)."&".rawurlencode($token_secret);

// generate the hash
$signature = rawurlencode(base64_encode(hash_hmac('sha1', $base_string, $key, true)));

// this time we're using a normal GET query, and we're only encoding the query params
// (without the oauth params)
$url .= "?".http_build_query($query);
$url=str_replace("&amp;","&",$url); //Patch by @Frewuill

$oauth['oauth_signature'] = $signature; // don't want to abandon all that work!
ksort($oauth); // probably not necessary, but twitter's demo does it

// also not necessary, but twitter's demo does this too
function add_quotes($str) { return '"'.$str.'"'; }
$oauth = array_map("add_quotes", $oauth);

// this is the full value of the Authorization line
$auth = "OAuth " . urldecode(http_build_query($oauth, '', ', '));

// if you're doing post, you need to skip the GET building above
// and instead supply query parameters to CURLOPT_POSTFIELDS
$options = array( CURLOPT_HTTPHEADER => array("Authorization: $auth"),
                  //CURLOPT_POSTFIELDS => $postfields,
                  CURLOPT_HEADER => false,
                  CURLOPT_URL => $url,
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_SSL_VERIFYPEER => false);

// do our business
$feed = curl_init();
curl_setopt_array($feed, $options);
$json = curl_exec($feed);
curl_close($feed);
$twitter_data = json_decode($json);
if($twitter_data){
$Name = $twitter_data[0]->user->name;
$screenName = $twitter_data[0]->user->screen_name;
$created_at = $twitter_data[0]->user->created_at;
$lasthashtag = $twitter_data[0]->entities->hashtags[0]->text;
$followers = $twitter_data[0]->user->followers_count;
$des = $twitter_data[0]->user->description;
$img = $twitter_data[0]->user->profile_image_url_https;
$banner = $twitter_data[0]->user->profile_banner_url;

$ts3_VirtualServer->clientListReset();
$ts3_VirtualServer->channelListReset();
$tweat1k = 916;
$tweat5k = 917;
$tweat10k = 918;
$tweat20k = 919;
$tweat50k = 920;
$tweat100k = 921;
$tweat250k = 922;
$tweat500k = 923;
    $response = $db->prepare('SELECT * FROM tweat');
    $response->execute();
    $tweat = $response->fetchAll();
    $response->CloseCursor();
		
    foreach($tweat as $check) {

        if ($check['name'] == $user) {

echo'
                                <div class="alert alert-danger alert-bordered alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                    <center><strong>لقد تم ربط هذا الحساب سابقا من قبل احد الأعضاء !</strong>   </center>
                                </div>
';
        require_once("inc/footer.php");
die;
}
}
  if(stristr($des, "$uid") == FALSE) { 

echo'
                                <div class="alert alert-danger alert-bordered alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                    <center><strong>الرجاء التأكد من وضع رقم التحقق الخاص بك في وصف الحساب</strong>   </center>
                                </div>
';
}else{

if($followers < 5000 && $followers >= 1000){
$ts3->serverGroupClientAdd($tweat1k, $client_db);
$rankname = $ts3->serverGroupGetById($tweat1k);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم ربط الحساب <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $tweat1k . '"> '.$rankname.'  

                                </div>
</center>
';
        $stmt= $db->prepare('INSERT INTO tweat ( name, img, cdb, creation_date, follow, sgroup, username) 
                             VALUES (:nem, :img, :cdb, NOW(), :follw, :group, :usrname)
                           ');
        $stmt->bindValue(':nem',"$user",PDO::PARAM_STR);
        $stmt->bindValue(':img',"$img",PDO::PARAM_STR);
        $stmt->bindValue(':cdb', "$client_db", PDO::PARAM_INT);
        $stmt->bindValue(':follw',"$followers", PDO::PARAM_INT);
        $stmt->bindValue(':group',"$tweat1k", PDO::PARAM_INT);
        $stmt->bindValue(':usrname',"$Name", PDO::PARAM_STR);

        $stmt->execute();        
        $stmt->CloseCursor();


}elseif($followers < 10000 && $followers >= 5000){
$ts3->serverGroupClientAdd($tweat5k, $client_db);
$rankname = $ts3->serverGroupGetById($tweat5k);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم ربط الحساب <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $tweat5k . '"> '.$rankname.'  

                                </div>
</center>
';
        $stmt= $db->prepare('INSERT INTO tweat ( name, img, cdb, creation_date, follow, sgroup, username) 
                             VALUES (:nem, :img, :cdb, NOW(), :follw, :group, :usrname)
                           ');
        $stmt->bindValue(':nem',"$user",PDO::PARAM_STR);
        $stmt->bindValue(':img',"$img",PDO::PARAM_STR);
        $stmt->bindValue(':cdb', "$client_db", PDO::PARAM_INT);
        $stmt->bindValue(':follw',"$followers", PDO::PARAM_INT);
        $stmt->bindValue(':group',"$tweat5k", PDO::PARAM_INT);
        $stmt->bindValue(':usrname',"$Name", PDO::PARAM_STR);

        $stmt->execute();        
        $stmt->CloseCursor();

}elseif($followers < 20000 && $followers >= 10000){
$ts3->serverGroupClientAdd($tweat10k, $client_db);
$rankname = $ts3->serverGroupGetById($tweat10k);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم ربط الحساب <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $tweat10k . '"> '.$rankname.'  

                                </div>
</center>
';
        $stmt= $db->prepare('INSERT INTO tweat ( name, img, cdb, creation_date, follow, sgroup, username) 
                             VALUES (:nem, :img, :cdb, NOW(), :follw, :group, :usrname)
                           ');
        $stmt->bindValue(':nem',"$user",PDO::PARAM_STR);
        $stmt->bindValue(':img',"$img",PDO::PARAM_STR);
        $stmt->bindValue(':cdb', "$client_db", PDO::PARAM_INT);
        $stmt->bindValue(':follw',"$followers", PDO::PARAM_INT);
        $stmt->bindValue(':group',"$tweat10k", PDO::PARAM_INT);
        $stmt->bindValue(':usrname',"$Name", PDO::PARAM_STR);

        $stmt->execute();        
        $stmt->CloseCursor();

}elseif($followers < 50000 && $followers >= 20000){
$ts3->serverGroupClientAdd($tweat20k, $client_db);
$rankname = $ts3->serverGroupGetById($tweat20k);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم ربط الحساب <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $tweat20k . '"> '.$rankname.'  

                                </div>
</center>
';
        $stmt= $db->prepare('INSERT INTO tweat ( name, img, cdb, creation_date, follow, sgroup, username) 
                             VALUES (:nem, :img, :cdb, NOW(), :follw, :group, :usrname)
                           ');
        $stmt->bindValue(':nem',"$user",PDO::PARAM_STR);
        $stmt->bindValue(':img',"$img",PDO::PARAM_STR);
        $stmt->bindValue(':cdb', "$client_db", PDO::PARAM_INT);
        $stmt->bindValue(':follw',"$followers", PDO::PARAM_INT);
        $stmt->bindValue(':group',"$tweat20k", PDO::PARAM_INT);
        $stmt->bindValue(':usrname',"$Name", PDO::PARAM_STR);

        $stmt->execute();        
        $stmt->CloseCursor();

}elseif($followers < 100000 && $followers >= 50000){
$ts3->serverGroupClientAdd($tweat50k, $client_db);
$rankname = $ts3->serverGroupGetById($tweat50k);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم ربط الحساب <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $tweat50k . '"> '.$rankname.'  

                                </div>
</center>
';
        $stmt= $db->prepare('INSERT INTO tweat ( name, img, cdb, creation_date, follow, sgroup, username) 
                             VALUES (:nem, :img, :cdb, NOW(), :follw, :group, :usrname)
                           ');
        $stmt->bindValue(':nem',"$user",PDO::PARAM_STR);
        $stmt->bindValue(':img',"$img",PDO::PARAM_STR);
        $stmt->bindValue(':cdb', "$client_db", PDO::PARAM_INT);
        $stmt->bindValue(':follw',"$followers", PDO::PARAM_INT);
        $stmt->bindValue(':group',"$tweat50k", PDO::PARAM_INT);
        $stmt->bindValue(':usrname',"$Name", PDO::PARAM_STR);

        $stmt->execute();        
        $stmt->CloseCursor();

}elseif($followers < 250000 && $followers >= 100000){
$ts3->serverGroupClientAdd($tweat100k, $client_db);
$rankname = $ts3->serverGroupGetById($tweat100k);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم ربط الحساب <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $tweat100k . '"> '.$rankname.'  

                                </div>
</center>
';
        $stmt= $db->prepare('INSERT INTO tweat ( name, img, cdb, creation_date, follow, sgroup, username) 
                             VALUES (:nem, :img, :cdb, NOW(), :follw, :group, :usrname)
                           ');
        $stmt->bindValue(':nem',"$user",PDO::PARAM_STR);
        $stmt->bindValue(':img',"$img",PDO::PARAM_STR);
        $stmt->bindValue(':cdb', "$client_db", PDO::PARAM_INT);
        $stmt->bindValue(':follw',"$followers", PDO::PARAM_INT);
        $stmt->bindValue(':group',"$tweat100k", PDO::PARAM_INT);
        $stmt->bindValue(':usrname',"$Name", PDO::PARAM_STR);

        $stmt->execute();        
        $stmt->CloseCursor();

}elseif($followers < 500000 && $followers >= 250000){
$ts3->serverGroupClientAdd($tweat250k, $client_db);
$rankname = $ts3->serverGroupGetById($tweat250k);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم ربط الحساب <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $tweat250k . '"> '.$rankname.'  

                                </div>
</center>
';
        $stmt= $db->prepare('INSERT INTO tweat ( name, img, cdb, creation_date, follow, sgroup, username) 
                             VALUES (:nem, :img, :cdb, NOW(), :follw, :group, :usrname)
                           ');
        $stmt->bindValue(':nem',"$user",PDO::PARAM_STR);
        $stmt->bindValue(':img',"$img",PDO::PARAM_STR);
        $stmt->bindValue(':cdb', "$client_db", PDO::PARAM_INT);
        $stmt->bindValue(':follw',"$followers", PDO::PARAM_INT);
        $stmt->bindValue(':group',"$tweat250k", PDO::PARAM_INT);
        $stmt->bindValue(':usrname',"$Name", PDO::PARAM_STR);

        $stmt->execute();        
        $stmt->CloseCursor();

}elseif($followers >= 500000){
$ts3->serverGroupClientAdd($tweat500k, $client_db);
$rankname = $ts3->serverGroupGetById($tweat500k);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم ربط الحساب <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $tweat500k . '"> '.$rankname.'  

                                </div>
</center>
';
        $stmt= $db->prepare('INSERT INTO tweat ( name, img, cdb, creation_date, follow, sgroup, username) 
                             VALUES (:nem, :img, :cdb, NOW(), :follw, :group, :usrname)
                           ');
        $stmt->bindValue(':nem',"$user",PDO::PARAM_STR);
        $stmt->bindValue(':img',"$img",PDO::PARAM_STR);
        $stmt->bindValue(':cdb', "$client_db", PDO::PARAM_INT);
        $stmt->bindValue(':follw',"$followers", PDO::PARAM_INT);
        $stmt->bindValue(':group',"$tweat500k", PDO::PARAM_INT);
        $stmt->bindValue(':usrname',"$Name", PDO::PARAM_STR);

        $stmt->execute();        
        $stmt->CloseCursor();


}elseif($followers < 1000){
echo'
                                <div class="alert alert-danger alert-bordered alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                   <center> <strong>للأسف!</strong> لا يوجد عدد كافي من المتابعين الحد الأدنى  ألف متابع.</center>
                                </div>
';
        require_once("inc/footer.php");
die;

}

echo'<div class="col-lg-4">
              
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <header class="panel-title">
                                    <div class="text-center">
                                        <strong>معلومات حسابك</strong> 
                                    </div>
                                </header>
                            </div>
                            <div class="panel-body">
                                <div class="text-center" id="author">
                                   <strong> <img src="'.$img.'">
                                    <h3>'.$user_name.'</h3><p>@'.$user.'</p>
                                    <small class="label label-primary">'.$followers.' </small> عدد المتابعين 
                                    <div class="text-center">
                                    <p style="background-color:white">'.$des.'</p>
                                    <p style="background-color:white">آخر هاشتاق :  '.$lasthashtag.'</p>

</div>
                                </div>
                            </div>
                        </div>
</div><div class="col-lg-4">
                        <div class="well well-success">
                            <h3><strong>تم التنفيذ بنجاح</h3>
                            تم ربط حسابك بنجاح <br> يمكنك إرجاع الوصف الخاص بك كما كان 
                        </div>
</div>
</div>

';

        require_once("inc/footer.php");
die;
}
}else{
echo'
                                <div class="alert alert-info alert-bordered alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                    <center><strong>الرجاء التأكد من إسم حسابك</strong>   </center>
                                </div>
';
}

}
}


    $response = $db->prepare('SELECT * FROM tweat');
    $response->execute();
    $tweat = $response->fetchAll();
    $response->CloseCursor();
		
    foreach($tweat as $check) {

        if ($check['cdb'] == $client_db) {
$user = secure($check['name']);


$token = '851910856933769216-3AiWPdw6c6QgPmCirLsddIe6YE6koWv';
$token_secret = 'yj8m2rsvmEdB9ivJ1azIVZ1aQU8U2kMjiS7LZSEl42Lr2';
$consumer_key = 'CS6Pry0EkJ7KbTwUl6nh81kHP';
$consumer_secret = 'WO1SH3ojUc8gxVsutwQH6XKo05uVSXbDHf3hrzQbgPWAwEfnPX';

$host = 'api.twitter.com';
$method = 'GET';
$path = '/1.1/statuses/user_timeline.json'; // api call path

$query = array( // query parameters
    'screen_name' => "$user",
    'count' => '2'
);

$oauth = array(
    'oauth_consumer_key' => $consumer_key,
    'oauth_token' => $token,
    'oauth_nonce' => (string)mt_rand(), // a stronger nonce is recommended
    'oauth_timestamp' => time(),
    'oauth_signature_method' => 'HMAC-SHA1',
    'oauth_version' => '1.0'
);

$oauth = array_map("rawurlencode", $oauth); // must be encoded before sorting
$query = array_map("rawurlencode", $query);

$arr = array_merge($oauth, $query); // combine the values THEN sort

asort($arr); // secondary sort (value)
ksort($arr); // primary sort (key)

$querystring = urldecode(http_build_query($arr, '', '&'));

$url = "https://$host$path";

$base_string = $method."&".rawurlencode($url)."&".rawurlencode($querystring);

$key = rawurlencode($consumer_secret)."&".rawurlencode($token_secret);

$signature = rawurlencode(base64_encode(hash_hmac('sha1', $base_string, $key, true)));

$url .= "?".http_build_query($query);
$url=str_replace("&amp;","&",$url); //Patch by @Frewuill

$oauth['oauth_signature'] = $signature; // don't want to abandon all that work!
ksort($oauth); // probably not necessary, but twitter's demo does it

function add_quotes($str) { return '"'.$str.'"'; }
$oauth = array_map("add_quotes", $oauth);

$auth = "OAuth " . urldecode(http_build_query($oauth, '', ', '));

$options = array( CURLOPT_HTTPHEADER => array("Authorization: $auth"),
                  //CURLOPT_POSTFIELDS => $postfields,
                  CURLOPT_HEADER => false,
                  CURLOPT_URL => $url,
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_SSL_VERIFYPEER => false);

// do our business
$feed = curl_init();
curl_setopt_array($feed, $options);
$json = curl_exec($feed);
curl_close($feed);
$twitter_data = json_decode($json);
$followers = $check['follow'];
$user_name = secure($check['username']);
$img = $check['img'];
$created_at = $twitter_data[0]->user->created_at;
$lasthashtag = $twitter_data[0]->entities->hashtags[0]->text;
$des = $twitter_data[0]->user->description;
$sgroup = $check['sgroup'];

echo'<div class="col-lg-4">
              
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <header class="panel-title">
                                    <div class="text-center">
                                        <strong>معلومات حسابك</strong> 
                                    </div>
                                </header>
                            </div>
                            <div class="panel-body">
                                <div class="text-center" id="author">
                                   <strong> <img src="'.$img.'">
                                    <h3>'.$user_name.'</h3><p>@'.$user.'</p>
                                    <small class="label label-primary">'.$followers.' </small> عدد المتابعين 
                                    <div class="text-center">
                                    <p style="background-color:white">'.$des.'</p>
                                    <p style="background-color:white">هاشتاق اليوم :  '.$lasthashtag.'</p>

</div>
                                </div>
                            </div>
                        </div>
</div><div class="col-lg-4">
                        <div class="well well-info">
                            <h3><strong>تم ربط حسابك بالفعل !</h3>
                        </div>
</div>
</div>
';
echo' <center>
<form method="post">

<button type="submit" name="rem" class="btn btn-danger delete" title="'.$user.' "><i class="glyphicon glyphicon-remove"></i> إلغاء ربط حسابي</button></form>
';

        require_once("inc/footer.php");
die;

        }
    }




?>




                    <div class="col-lg-6">
<center>=================================================
<font face="VIP" size="4"> <font color="#d22d2d"><?php echo $client_info["client_unique_identifier"];?></font>  : رقم التحقق الخاص بك</font>
<br>
<br>

=================================================
<h4>
<br>
( قم بوضع كود التحقق فقط في وصف حسابك.)<br>
( ***->**->**-><?php echo $unid ;?> )<br>
(2) قم بكتابه معرف حسابك في وصف الحساب في الحقل.<br>
( Name = https://twitter.com/(Your Name Here) )<br>
(3) قم بالضغط على الزر "ربط الحساب" لربط الحساب الخاص بك في تويتر.<br><br><br>

</h4>

</div>
</center>

<center>
<form method="post">

                    <div class="col-lg-6">
                        <section class="panel">
                            <header class="panel-heading">
<h1 class="page-header">RA# Twitter Script </h1>
<center><img src="img/TW.png" /></center>

<hr>
                            </header>

                        <section class="panel">
                            <div class="panel-body">
                                    <div class="form-group">

                                <form class="form-horizontal" role="form">
                                        <div class="col-lg-9">



                                        <label class="col-lg-3 col-sm-3 control-label">نموذج الربط</label>
                                        <div class="col-lg-9">
                                <form role="form">
                                    <div class="form-group">
                                        <div class="iconic-input">
                                            <i class="fa fa-user"></i>
<center>
     <form method='post'>

                                            <input type="text" class="form-control" placeholder="إسم الحساب" name='user'><br>


                                        </div>
                            <button type="submit" name="send" class="btn btn-default"><i class="fa fa-search"></i> ربط الحساب</button>

</form>

                                    </div>
                                    </div>
                                        <div class="col-lg-9">



                                        </div>

</div>

</div>

                                        </div>

                        </section>

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
