 <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-widget">
                    <div class="row">

                        <div class="col-sm-6">
                            <p>
                            <span class="sosmed-footer">
                                <a href="#"><i class="fa fa-twitter" data-toggle="tooltip" data-placement="top" title="Twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus" data-toggle="tooltip" data-placement="top" title="Google Plus"></i></a>
                                <a href="#"><i class="fa fa-youtube" data-toggle="tooltip" data-placement="top" title="Youtube"></i></a>
                                <a href="#"><i class="fa fa-instagram" data-toggle="tooltip" data-placement="top" title="Instagram"></i></a>
                            </span>
            <strong> <a href="Ts3Server://RoyalArea.Cf">RoyalArea</a>       &copy;  </i>  <script>document.write(new Date().getFullYear())</script>   Developed By #Mr.omar                </div>
    </div>
      <center> <a href="javascript:void(0);" id="scroll" title="الرجوع إلى الأعلى" style="display: none;"><i class="fa fa-angle-double-up fa-2x" aria-hidden="true"></i><span></span></a>
</center>
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
    if((e.which == 85)  && (isCtrl == true))// 67 for copy
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

    <!-- javascript for RA -->
    <script src="js/themes.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.min.js"></script>
    <script src="js/respond.min.js" ></script>

	<!-- end:javascript -->

    <!-- start:javascript for this page -->
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <script src="js/jquery.customSelect.min.js" ></script>
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/count.js"></script>
    <script>
        //owl carousel
        $(document).ready(function() {
            $("#owl-demo").owlCarousel({
                navigation : true,
                slideSpeed : 300,
                paginationSpeed : 400,
                singleItem : true,
                autoPlay:true
            });
        });

        //custom select box

        $(function(){
            $('select.styled').customSelect();
        });

        if ($(".custom-bar-chart")) {
        $(".bar").each(function () {
            var i = $(this).find(".value").html();
            $(this).find(".value").html("");
            $(this).find(".value").animate({
                height: i
            }, 2000)
        })
    }
    </script>
    <!-- end:javascript for this page -->
