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
<body>


	<div class="container">
	<div class="contentheader">
			<i class="icon-bar-chart"></i> Customer Based Sales Report
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php"> Customer Based Sales Report</a></li> /
			<li class="active"> Customer Based Sales Report </li>
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<button  style="float:right;" class="btn btn-success btn-mini"><a href="javascript:Clickheretoprint()"> Print</button></a>

</div>
<form action="customerwise.php" method="get">
<center>
<strong>
Customer Name : <input type="text" style="width: 223px; padding:14px;" name="CustomerName"  value="" />

  From : <input type="text" style="width: 223px; padding:14px;" name="d1" class="tcal" value="" />
     To: <input type="text" style="width: 223px; padding:14px;" name="d2" class="tcal" value="" />
 <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> Search</button>
</strong></center>
</form>
<?php
if (isset($_GET['CustomerName']) && isset($_GET['d1']) && isset($_GET['d2'])){
	?>
<div class="content" id="content">
<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
Sales Report CustomerName:&nbsp;<?php echo $_GET['CustomerName'] ?> from&nbsp;<?php echo $_GET['d1'] ?>&nbsp;to&nbsp;<?php echo $_GET['d2'] ?>
</div>
<?php
}
?>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="20%"> VrNo </th>
            <th width="30%"> Date </th>
			<th width="10%"> Total </th>
            <th width="10%"> Discount </th>
            <th width="10%"> Net </th>
            <th width="10%"> Paid</th>
            <th width="10%"> Due </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				if (isset($_GET['CustomerName']) &&isset($_GET['d1']) && isset($_GET['d2'])){
					$d1=$_GET['d1'];
                $d11=explode("/",$d1);
                $d1="$d11[2]-$d11[0]-$d11[1]";
				$d2=$_GET['d2'];
                $d21=explode("/",$d2);
                $d2="$d21[2]-$d21[0]-$d21[1]";
               
                $m=new MySQLi("localhost","root","","pathology");
				$q="SELECT vrno,Date,Total,Dicount,Net,Paid,Due from  salestotal where CustomerName='{$_GET['CustomerName']}' and Date between '$d1' and '$d2' order by vrno";
				//echo $q;
                $r=$m->query($q);
				for($i=0; $row = $r->fetch_array(MYSQLI_NUM); $i++){
			?>
			<tr class="record">
			<td><?php echo $row[0]; ?></td>
			<td><?php echo $row[1]; ?></td>
			<td><?php
			$dsdsd=$row[2];
			echo formatMoney($dsdsd, true);
			?></td>
            <td><?php
			$dsdsd=$row[3];
			echo formatMoney($dsdsd, true);
			?></td>
            <td><?php
			$dsdsd=$row[4];
			echo formatMoney($dsdsd, true);
			?></td>
            <td><?php
			$dsdsd=$row[5];
			echo formatMoney($dsdsd, true);
			?></td>
            <td><?php
			$dsdsd=$row[6];
			echo formatMoney($dsdsd, true);
			?></td>

			</tr>

			<?php
				}
			}
			?>
		
	</tbody>
	<thead>
		<tr>
			<th colspan="1" style="border-top:1px solid #999999"> Total: </th>
			<th colspan="1" style="border-top:1px solid #999999"> 

			<?php
				if (isset($_GET['CustomerName']) && isset($_GET['d1']) && isset($_GET['d2'])){
                $m=new MySQLi("localhost","root","","pathology");
				$q="SELECT sum(Total) from  salestotal where CustomerName='{$_GET['CustomerName']}' and Date between '$d1' and '$d2'";
				//echo $q;
                $r=$m->query($q);
				for($i=0; $row = $r->fetch_array(MYSQLI_NUM); $i++){
			?>
			
			<td><?php echo $row[0]; ?></td>
			<?php
				}
			}
			?>
			<?php
				if (isset($_GET['CustomerName']) && isset($_GET['d1']) && isset($_GET['d2'])){
                $m=new MySQLi("localhost","root","","pathology");
				$q="SELECT sum(Dicount) from  salestotal where CustomerName='{$_GET['CustomerName']}'  and Date between '$d1' and '$d2'";
				//echo $q;
                $r=$m->query($q);
				for($i=0; $row = $r->fetch_array(MYSQLI_NUM); $i++){
			?>
			
			<td><?php echo $row[0]; ?></td>
			<?php
				}
			}
			?>
            <?php
				if (isset($_GET['CustomerName']) && isset($_GET['d1']) && isset($_GET['d2'])){
                $m=new MySQLi("localhost","root","","pathology");
				$q="SELECT sum(Net) from  salestotal where CustomerName='{$_GET['CustomerName']}'  and Date between '$d1' and '$d2'";
				//echo $q;
                $r=$m->query($q);
				for($i=0; $row = $r->fetch_array(MYSQLI_NUM); $i++){
			?>
			
			<td><?php echo $row[0]; ?></td>
			<?php
				}
			}
			?>
            <?php
				if (isset($_GET['CustomerName']) && isset($_GET['d1']) && isset($_GET['d2'])){
                $m=new MySQLi("localhost","root","","pathology");
				$q="SELECT sum(Paid) from  salestotal where CustomerName='{$_GET['CustomerName']}'  and Date between '$d1' and '$d2'";
				//echo $q;
                $r=$m->query($q);
				for($i=0; $row = $r->fetch_array(MYSQLI_NUM); $i++){
			?>
			
			<td><?php echo $row[0]; ?></td>
			<?php
				}
			}
			?>
            <?php
				if (isset($_GET['CustomerName']) && isset($_GET['d1']) && isset($_GET['d2'])){
                $m=new MySQLi("localhost","root","","pathology");
				$q="SELECT sum(Due) from  salestotal where CustomerName='{$_GET['CustomerName']}'  and Date between '$d1' and '$d2'";
				//echo $q;
                $r=$m->query($q);
				for($i=0; $row = $r->fetch_array(MYSQLI_NUM); $i++){
			?>
			
			<td><?php echo $row[0]; ?></td>
			<?php
				}
			}
			?>
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