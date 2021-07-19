<?php
        require_once("inc/php-header.php");
        require_once("inc/header.php");
?>
        <link rel="stylesheet" href="css/check.css">

        <!-- start:main -->
        <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->
                <ol class="breadcrumb">
                    <li><a href="index.php">الصفحة الرئيسية</a></li>
                    <li>الخيارات الرئيسية</li>
                    <li class="active">الأيقونات</li>

                </ol>
                <!-- end:breadcrumb -->   

                <div class="row" id="home-content">
                        <!--work progress end-->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                         <center>    ايقونات العضوية الخاصة   </center>
                        </h2>
                    </div>
                </div>
<form method='POST' >
<?php
		$grupos = $_SESSION['grupos'];


if(isset($_POST['submit'])){
	if(!isset($_SESSION['ts3_last_query']))
    $_SESSION['ts3_last_query'] = microtime(true);
	
	if($_SESSION['ts3_last_query'] >= microtime(true)){
	echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>          <strong>عذراً! يرجى الانتظار بين محاولاتك‬‎ </strong></center> 
                                </div>
';

}else{
	$_SESSION['ts3_last_query'] = microtime(true)+5.0;
		$checked = count($_POST["grupos"]);
        if($checked > $MAX_ICONS) {
	echo'
                                <div class="alert alert-info alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                             <center>          <strong>عذراً! لقد تجاوزت الحد الاقصى في الإختيار </strong></center> 
                                </div>
';
              }else{
		if(empty($_POST["grupos"])) {
		} else {
			$n_grupos = $_POST["grupos"];
		}
		

			foreach($grupos as $group) {			
				$needle = $group['id'];
				$miembros = $ts3_VirtualServer->serverGroupClientList($needle);
                $estaengrupo = False;
                foreach($miembros as $m) {
                    if($m["client_unique_identifier"] == $client_uid) { 
                        $estaengrupo = True; 
                    }                                   
                }
				if(in_array($needle,$n_grupos)) {
					if($estaengrupo == False) {
						$ts3_VirtualServer->serverGroupClientAdd($group["id"],$client_db);
$iconname = $ts3->serverGroupGetById($group["id"]);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                 <center>     تم إضافة الأيقونة <strong>بنجاح ! </strong> <br> <img src="icon.php?id='. $group["id"] . '"> '.$iconname.'  

                                </div>
</center>
';

					}
				} else 
			
				
				{
					if($estaengrupo == True) {
						$ts3_VirtualServer->serverGroupClientDel($group["id"],$client_db);
$iconname = $ts3->serverGroupGetById($group["id"]);
echo'
                                <div class="alert alert-success alert-outline alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                      <center>         !       تم إزالة الأيقونة <strong>بنجاح  </strong> <br> <img src="icon.php?id='. $group["id"] . '"> '.$iconname.'
</center>
                                </div>
';

					}
				}
			}

}
}
}

            $iconosm = 0;
            
            $server_groups = $ts3_VirtualServer->serverGroupList();
            $servergroups = array();
 
            # En vez de iterar por todos los grupos intenten 
            foreach($server_groups as $group) {
                if($group->type != 1) { continue; }
                if(in_array($group["sortid"], $iconsvip)) {
                    $servergroups[] = array('name' => (string)$group, 'id' => $group->sgid, 'type' => $group->type);
                }
            } 
			$_SESSION['grupos'] = $servergroups;
        
            foreach($servergroups as $group) {      
                
                $miembros = $ts3_VirtualServer->serverGroupClientList($group["id"]);
                $estaengrupo = False;
                foreach($miembros as $m) {
                    if($m["client_unique_identifier"] == $client_uid) { 
                        $estaengrupo = True;
                    }                                   
                }
				
                if($estaengrupo) {
                    $iconosm = $iconosm + 1;
                    echo' <div class="col-md-4" dir="ltr" >';
                    echo '<img src="icon.php?id='.$group['id']. '" alt="" class="hvr-buzz" />  ';
                    echo '<input type=checkbox name=grupos['.$group["id"].'] id="'.$group["id"].'" value="'. $group["id"] .'"class="css-checkbox pop" checked >
					<label for="'.$group["id"].'" class="css-label dark-plus hvr-bounce-in">'.$group["name"].'</label>
					<br>';
                    echo'</div>';
                } else {
                    echo' <div class="col-md-4" dir="ltr" >';

                    echo '<img src="icon.php?id='. $group['id'] . '" alt="" class="hvr-buzz" />  ';
                    echo '<input type=checkbox name=grupos['.$group["id"].'] id="'. $group["id"] .'" value="'. $group["id"] .'" class="css-checkbox pop">
					<label for="'.$group["id"].'" class="css-label dark-plus hvr-bounce-in">'.$group["name"].'</label>
					<br>';
                    echo'</div>';

                }
			}
			


        







?>
<script>
var maxicon = "<?php echo $MAX_ICONS; ?>" ;
var icons = "<?php echo $iconosm; ?>" ;

$(document).ready(function () {
    //set initial state.

    $('input[type=checkbox]').change(function () {
		var id = $(this).prop('id');
        if ($(this).is(":checked")) {
            if (icons >= maxicon) {
      {
         $(this).prop("checked", "");
         alert('عذراً! لايمكنك اختيار اكثر من 2 ايقونة');
        checkboxes.filter(':not(:checked)').prop('disabled', current >= max);
     }
				//alert("Maximo");
                $(this).prop('checked', false);

            } else {
                icons++;
				<?php 
					$_SESSION['numiconos'] += 1;
				?>
            }

        } else {
            icons--;
            			<?php 
					$_SESSION['numiconos'] -= 1;
				?>
        }
        //$('.txt').val(icons);
    });

});
</script>

	<center>
		<button type='submit' name='submit' class="btn btn-1 btn-1e">Save | حفظ</button>
    </center>

                        </div>


        </div>
        <!-- end:main -->
<?php include 'inc/footer.php';?>

</body>

</html>	