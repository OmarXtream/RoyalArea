
<!DOCTYPE html>
        <style id="css-main">@font-face{font-family:myFirstFont;src:url(hcdd.ttf)/*tpa=http://ts-mc.cf/assets/fonts/hcdd.ttf*/ format('truetype');unicode-range:U +0600-06EF , U +06FA-0903}@font-face{font-family:dinar2;src:url(ge-dinar2.ttf)/*tpa=http://ts-mc.cf/assets/fonts/ge-dinar2.ttf*/ format("truetype");font-weight:normal;font-style:normal;unicode-range:U +0600-06EF , U +06FA-0903}@font-face{font-family:h-tunisia;src:url(H-Tunisia.ttf)/*tpa=http://ts-mc.cf/assets/fonts/H-Tunisia.ttf*/ format('truetype');unicode-range:U +0600-06EF , U +06FA-0903}@font-face{font-family:h-tunisia;src:url(H-Tunisia-B.ttf)/*tpa=http://ts-mc.cf/assets/fonts/H-Tunisia-B.ttf*/ format('truetype');font-weight:bold;unicode-range:U +0600-06EF , U +06FA-0903}@font-face{font-family:h-pro;src:url(H-Promoter.ttf)/*tpa=http://ts-mc.cf/assets/fonts/H-Promoter.ttf*/ format('truetype');unicode-range:U +0600-06EF , U +06FA-0903}@font-face{font-family:h-pro;src:url(H-Promoter-M.ttf)/*tpa=http://ts-mc.cf/assets/fonts/H-Promoter-M.ttf*/ format('truetype');font-weight:bold;unicode-range:U +0600-06EF , U +06FA-0903}div h1,div h2,div h3,div h4,div p,div.h1,div.h2,div.h3,div.h3{font-family:'Open Sans',dinar2}div{font-family:myFirstFont,'Open Sans'}font1{font-family:myFirstFont,'Open Sans'!important}font2{font-family:dinar2,'Open Sans'!important}.progamer{font-family:h-pro!important;font-weight:bold!important}</style>

<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>RoyalArea</title>
	<meta name="description" content="RA" />
	<meta name="keywords" content="RA" />
	<meta name="author" content="RA" />
<link rel="shortcut icon" type="image/png" href="http://rarea.cf/RoyalArea-Cp/icon.php?sr=1"/>
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/raf.css">
    <link rel="stylesheet" href="css/bootstrap-reset.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/Style.css">
</head>
<body id="wrapper-500">

    <!-- start:wrapper -->
    <div class="container">
        <div class="errorpage">
            <i class="fa fa-flash fa-4x"></i>
         <strong>   <h1>Not Connect!</h1>
           <strong> <p>أنت غير متصل ب تيم سبيك !</p>
           <strong> <h5>ثم حاول مرة أخرى. <a href="ts3server://RArea.cf" class="btn btn-sm btn-danger" title='اضغط هنا ل دخول سيرفر التيم سبيك'>اضغط لدخول التيم سبيك </a></h5>
                                       <strong> <li title='اضغط هنا للعودة إلى الصفحة الرئيسية'><a href="./"><i class="fa fa-sign-in"></i> العودة إلى الصفحة الرئيسية </a></li>

</div>
    </div>
    <!-- end:wrapper -->
<script type='text/javascript'>
$(document).ready(function(){ 
    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 100) { 
            $('#scroll').fadeIn(); 
        } else { 
            $('#scroll').fadeOut(); 
        } 
    }); 
    $('#scroll').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
});
if (window.Event) 
document.captureEvents(Event.MOUSEUP); 

function nocontextmenu() 
{
event.cancelBubble = true
event.returnValue = false;

return false;
}

function norightclick(e) 
{
if (window.Event) 
{
if (e.which == 2 || e.which == 3)
return false;
}
else
if (event.button == 2 || event.button == 3)
{
event.cancelBubble = true
event.returnValue = false;
return false;
}

}

document.oncontextmenu = nocontextmenu; 
document.onmousedown = norightclick; 
</script>
<script language = "JavaScript" type= "text/javascript">
if(window.location.href.indexOf('index.php') > -1) // or 0 
window.location.href = window.location.href.replace('index.php', '');
$(document).keydown(function(event){
    if(event.keyCode==123){
    return false;
   }
else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
      return false;  //Prevent from ctrl+shift+i
   }
});

</script>
<script type='text/javascript'>
var isCtrl = false;
document.onkeyup=function(e)
{
    if(e.which == 17)
    isCtrl=false;
}
document.onkeydown=function(e)
{
    if(e.which == 17)
    isCtrl=true;
    if((e.which == 85) || (e.which == 67) && (isCtrl == true))
    {
        return false;
    }
}
var isNS = (navigator.appName == "Netscape") ? 1 : 0;
if(navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);
function mischandler(){
    return false;
}
function mousehandler(e){
    var myevent = (isNS) ? e : event;
    var eventbutton = (isNS) ? myevent.which : myevent.button;
    if((eventbutton==2)||(eventbutton==3)) return false;
}
document.oncontextmenu = mischandler;
document.onmousedown = mousehandler;
document.onmouseup = mousehandler;
</script>

	<!-- start:javascript -->
	<!-- javascript default for all pages-->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

    <script src="js/themes.js"></script>
	<!-- end:javascript -->

</body>
</html>	
