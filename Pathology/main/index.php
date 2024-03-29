<!DOCTYPE html>
<html>
<head>
<title>Pathology Management System</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">    
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
<?php
	require_once('auth.php');
?>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>

 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>	
</head>
<body>

<?php include('navfixed.php');?>
	
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
		  <?php include('links.php');?>                               
          </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
	<div class="contentheader" style="text-align:center;color:blue;">
			<i class="icon-dashboard"></i> 👨‍⚕️ 💉 XYZ Pathology Management System 🩺 🏥
			</div>
			<ul class="breadcrumb" style="text-align:center;color:blue;">
			<li class="active">XYZ Pathology Management System</li>
			</ul>
			

		

<iframe src="dashboard.php" name="iframe_a" id="iFrame1" height="1000px" width="100%" 
title="Iframe Example"></iframe>


<div class="clearfix"></div>

</div>
</div>
</div>
</body>
<?php include('footer.php'); ?>
</html>
