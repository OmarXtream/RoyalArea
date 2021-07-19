<?php
$usertow = 1;
        require_once("inc/php-header.php");
        require_once("inc/header.php");
if($_SESSION['userone'] == 1 or $_SESSION['verfied'] == 1){
echo'<meta http-equiv="refresh" content="0; url=./" />';
die;
}
?>
 
        <!-- start:main -->
        <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->
                <ol class="breadcrumb">
                    <li>الصفحة الرئيسية</li>
                    <li class="active">التحقق من العضو</li>

                </ol>
<center><h2> التحقق من العضو </h2><br></center>

                <!-- end:breadcrumb -->   
<?php
    
    if (!empty($_GET['reset'])) {
        unset($_SESSION);
    };
    
    if (empty($_SESSION['do'])) {
        $_SESSION['do'] = '0';
    }
    
    
    $error = array();
    $continue = true;
    
    
    
    if (($_SESSION['do'] == 0 and !empty($_POST['uid'])) or ($_SESSION['do'] == 1 and !empty($_SESSION['uid']))) {
        if ((!empty($_SESSION['uid']) and strlen($_SESSION['uid']) == 28 and $_SESSION['uid'][27] == "=") or (strlen($_POST['uid']) == 28 and $_POST['uid'][27] == "=")) {
            $groups = array();
            if (!empty($_POST['uid'])) {
                $_SESSION['uid'] = $_POST['uid'];
            }
            try {
                TeamSpeak3::init();
                $filter = array('client_unique_identifier' => str_replace('/','\/', str_replace('+', '\+', str_replace('-', '\-', str_replace('&', '\&', $_SESSION['uid'])))));
                if ($config['teamspeak']['ip-verify']) {
                    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    } else {
                        $ip = $_SERVER['REMOTE_ADDR'];
                    }
                    $filter['connection_client_ip'] = $ip;
                }
                if (count($ts3->clientList($filter)) > 0) {
                    $_SESSION['do'] = '1';

                    foreach ($ts3->clientList($filter) as $client) {
                    $_SESSION['name'] = $client['client_nickname'];

                        break;
                    }
                } else {
                    unset($_SESSION);
                    $_SESSION['do'] = '0';
                    $error[] = array('type' => 'danger', 'msg' => 'No Online Client found!');
                    $continue = false;
                }
            } catch(Exception $e) {
                $error[] = array('type' => 'danger', 'msg' => 'Error: '. $e->getCode() . ": " . $e->getMessage());
            };
        } else {
            $error[] = array('type' => 'danger', 'msg' => 'Error: Wrong UID given!');
        }
    }
    
    
    if ($_SESSION['do'] == 1 and (!empty($_POST['assign']))) {
        if ((!empty($_SESSION['verified']) and $_SESSION['verified']) or $_SESSION['pin'] == $_POST['pin']) {
echo "<center> <img src='img/AjaxLoader.gif'> </center>";
echo'<meta http-equiv="refresh" content="3; url=./" />';
                    $_SESSION['name'] = $client['client_nickname'];
                    $_SESSION['ci'] = $_SESSION['uid'];
$_SESSION['userone'] = 1;
            $error[] = array('type' => 'success', 'msg' => '!تمت العملية بنجاح');
}else{
            unset($_SESSION['pin']);
            $error[] = array('type' => 'danger', 'msg' => '!خطأ : هناك خطا الرجاء المحاولة مرة أخرى');
        }

        }     

    
?>

                <div class="row" id="home-content">
        <div style="margin-top:5%">
        
            
            <center>
                <div  style="margin-left:35%; margin-right:35%">

                        <!-- Error Displaying Starts -->
                        <noscript>
                            <div class="alert alert-danger" role="alert">!عليك تفعيل الجافا سكربت آولا</div>
                        </noscript>
                        <?php foreach ($error as $err) { ?>
                            <div class="alert alert-<?php echo $err['type']; ?>" role="alert"><?php echo $err['msg']; ?></div>        
                        <?php } ?>
                        <!-- Error Displaying Ends -->
            
                    <div class="panel panel-default">
                        <div class="panel-heading" style="color:#2b3e50">RoyalArea - usertow</div>
                        <div class="panel-body">
            
                        <?php if ($_SESSION['do'] == 0) { ?>
                            <form action="" method="POST" class="form-inline">
                                <br/><br/>
                                <div class="form-group">
                                    <label for="InputUid">
                                    <br/>قم بوضع المعرف الخاص بك في الأسفل 
                                    PjuN43MopI3D3pzg0z6BS04DC50= : مثل</label>
                                    <br/><br/><input type="text" class="form-control" name="uid" id="uid" placeholder="ضع المعرف الخاص بك هنا">
                                </div>
                                <br/><br/>
                                <button type="submit" class="btn btn-success">الخطوة التالية</button>
                            </form>                    
                        <?php }; ?>

            
                        <?php if ($_SESSION['do'] == 1) { ?>
                            <form action="" method="POST" class="form-horizontal">
                                <b><?php echo $_SESSION['name']; ?></b>
                                <br/><br/>
                                <div class="col-xs-2"></div>
                                <div class="col-xs-8">
                                </div>
                                <div class="col-xs-2"></div>
                                <br/><br/>
                                <?php if (!empty($_SESSION['verified']) and $_SESSION['verified']) { ?>
                                    <button type="submit" class="btn btn-primary">تطبيق</button>
                                <?php } else { ?>
                                    <a onclick="openconfirmation();" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#setgrps">تحقق</a>
                                <?php }; ?>
                                <div class="modal fade" id="setgrps">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">رمز التحقق</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                <center>
                                                    <div style="max-width:40%" class="form-group">
                                                        <label for="pin">ضع رمز التحقق هنا</label>
                                                        <input type="text" class="form-control" id="pin" name="pin" placeholder="Pin">
                                                        <input type="hidden" name="assign" value="1"></input>
                                                    </div>
                                                </center>
                                            </p>
                                        </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">تطبيق</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>                    
                        <?php }; ?>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    <script type="text/javascript">
        function openconfirmation() {
            $.get("inc/confirmation.php");
            return false;
        }
    </script>




                </div>
            </div>
        </div>
        <!-- end:main -->

		<?php
        require_once("inc/footer.php");
?>

</body>

</html>	
