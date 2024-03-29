<html>

<head>
<title>
POS
</title>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">


<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/tcal.css" />
<script type="text/javascript" src="js/tcal.js"></script>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>


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
<body style="background-color:lightyellow;">


	<div class="container">
	<div class="contentheader" style="text-align:center;color:blue;">
			<i class="icon-bar-chart"></i> Pathology Sales Report
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php"> Pathology Sales Report</a></li> /
			<li class="active"> Pathology Sales Report </li>
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<button  style="float:right;" class="btn btn-success btn-mini"><a href="javascript:Clickheretoprint()"> Print</button></a>

</div>
<!-- <form action="salesreport.php" method="get">
<center><strong>From : <input type="text" style="width: 223px; padding:14px;" name="d1" class="tcal" value="" /> To: <input type="text" style="width: 223px; padding:14px;" name="d2" class="tcal" value="" />
 <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> Search</button>
</strong></center>
</form> -->
<?php

if (isset($_GET['vrno']) ){
	$vrno=$_GET['vrno'];
	$m=new MySQLi("localhost","root","","pathology");
	$q="SELECT * FROM salestotal where vrno = '$vrno' limit 1 ";
	//echo $q;
	$r2=$m->query($q);
	while($r1 = $r2->fetch_array(MYSQLI_NUM)){
		$total=$r1[3];
		$discount=$r1[4];
		$net=$r1[5];
		$paid=$r1[6];
		$due=$r1[7];
		
	?>
<div class="content" id="content">
	<h2 align="center" style="color:blue;"> 💊 💉 👨‍⚕️ XYZ Diagnostic Management System 🏥</h2>
	<h3 align="center"> Pathology Sales Report</h3>
	<div class="container">
		<div style="font-weight:bold;float:left; text-align:left;margin-bottom: 15px;width:50%">
		Date: <?=$r1[2]  ?>
		<br/>
		Customer Name: <?=$r1[1]  ?>
		</div>
		<div style="text-align:right;font-weight:bold;float:right;width:50%">
		Voucher No: <?=$r1[0]  ?>
		</div>
	</div>
<?php
}
?>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			
            <th width="5%"> SLNO </th>
            <th width="15%"> Item Code </th>
			<th width="30%"> Item Name </th>
			<th width="10%"> Qty </th>			
			<th width="20%"> Rate </th>
			<th width="20%" style="text-align:right"> Total </th>			
		</tr>
		
	</thead>
	<tbody>
		
			<?php
				if (isset($_GET['vrno'])){			
                $q="SELECT * FROM saleslineitems where vrno = '$vrno' order by slno ";
				//echo $q;
                $r=$m->query($q);
				for($i=0; $row = $r->fetch_array(MYSQLI_NUM); $i++){
			?>
			<tr class="record">
			<td><?php echo $row[1]; ?></td>
			<td><?php echo $row[2]; ?></td>
			<td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
			<td><?php $s=$row[5];echo formatMoney($s, true); ?></td>
			<td style="text-align:right"><?php $s=$row[6];echo formatMoney($s, true); ?></td>
			
			</tr>
			
			<?php
				}
			}
			?>
			<tr>
			<th colspan="5" style="text-align:right"> Total </th><th style="text-align:right"><?php echo formatMoney($total, true); ?></th>
			</tr>
			<tr>
			<th colspan="5" style="text-align:right"> Discount </th><th style="text-align:right"><?php echo formatMoney($discount, true); ?></th>
			</tr>
			<tr>
			<th colspan="5" style="text-align:right"> Net </th><th style="text-align:right"><?php echo formatMoney($net, true); ?></th>
			</tr>
			<tr>
			<th colspan="5" style="text-align:right"> Paid </th><th style="text-align:right"><?php echo formatMoney($paid, true); ?></th>
			</tr>
			<tr>
			<th colspan="5" style="text-align:right"> Due </th><th style="text-align:right"><?php echo formatMoney($due, true); ?></th>
			</tr>
			<?php
		}

			?>
		
	</tbody>
	<thead>
		<tr>
			
			<th colspan="1" style="border-top:1px solid #999999"> 
			<?php
				function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
				// $d1=$_GET['d1'];
				// $d2=$_GET['d2'];
				// $results = $db->prepare("SELECT sum(amount) FROM sales WHERE date BETWEEN :a AND :b");
				// $results->bindParam(':a', $d1);
				// $results->bindParam(':b', $d2);
				// $results->execute();
				// for($i=0; $rows = $results->fetch(); $i++){
				// $dsdsd=$rows['sum(amount)'];
				// echo formatMoney($dsdsd, true);
				//}
				?>
			</th>
				
		</tr>
	</thead>
</table>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>

</body>
<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletesales.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
<?php include('footer.php');?>
</html>