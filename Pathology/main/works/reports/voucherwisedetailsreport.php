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
			<i class="icon-bar-chart"></i> 📝 Voucher Wise Details Report 🗒️
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Voucher Wise Details Report</a></li> /
			<li class="active">Voucher Wise Details Report</li>
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<button  style="float:right;" class="btn btn-success btn-lg"><a href="javascript:Clickheretoprint()"> Print</button></a>

</div>
<form action="voucherwisedetailsreport.php" method="get">


  <strong>From : <input type="text" style="width: 223px; padding:14px;" name="d1" class="tcal" value="" />
     To: <input type="text" style="width: 223px; padding:14px;" name="d2" class="tcal" value="" />
 <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> Search</button>
</strong></center>
</form>
<?php
if (isset($_GET['itemcode']) && isset($_GET['customername']) && isset($_GET['d1']) && isset($_GET['d2'])){
	?>
<div class="content" id="content">
<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
Sales Report itemcode&nbsp;<?php echo $_GET['itemcode'] ?>,&nbsp;customername:&nbsp;<?php echo $_GET['customername'] ?> from&nbsp;<?php echo $_GET['d1'] ?>&nbsp;to&nbsp;<?php echo $_GET['d2'] ?>
</div>
<?php
}
?>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="10%"> slno </th>
            <th width="10%"> itemcode </th>
            <th width="10%"> itemname </th>
            <th width="10%"> Qty </th>
            <th width="10%"> price </th>
			<th width="10%"> Total </th>
            
		</tr>
	</thead>
	<tbody>
		
			<?php
				if (isset($_GET['d1']) && isset($_GET['d2'])){
					$d1=$_GET['d1'];
					$d11=explode("/",$d1);
					$d1="$d11[2]-$d11[0]-$d11[1]";
					$d2=$_GET['d2'];
					$d21=explode("/",$d2);
					$d2="$d21[2]-$d21[0]-$d21[1]";
					$ic1="";
					$t="";
					$d="";
					$n="";
					$p="";
					$d="";
                $m=new MySQLi("localhost","root","","pathology");
				$q="SELECT a.slno,a.itemcode,a.itemname,a.qty,a.price,a.total,a.vrno,b.dicount,b.net,b.paid,b.due,b.date,b.customername,b.total from saleslineitems a inner join salestotal b on a.vrno=b.vrno where b.date between '$d1' and '$d2' and a.vrno like 'AC%' order by date,a.vrno,slno";
				//echo $q;
                $r=$m->query($q);
				for($i=0; $row = $r->fetch_array(MYSQLI_NUM); $i++){
					$ic2=$row[6];
					if ($ic1!=$ic2){
						
						if($t!=""){
					echo "<tr><td colspan='5' style='text-align:right'>Total</td><td>$t</td></tr>";
					echo "<tr><td colspan='5' style='text-align:right'>Discount</td><td>$d</td></tr>";
					echo "<tr><td colspan='5' style='text-align:right'>Net</td><td>$n</td></tr>";
					echo "<tr><td colspan='5' style='text-align:right'>Paid</td><td>$p</td></tr>";
					echo "<tr><td colspan='5' style='text-align:right'>Due</td><td>$d</td></tr>";
						}
						echo "<tr><td colspan='2'>Vr No: <b>$row[6]</b></td><td colspan='2'>Date: <b>$row[11]</b></td><td colspan='2'>Customer: <b>$row[12]</b></td></tr>";
					}
			?>
			<tr class="record">
			<td><?php echo $row[0]; ?></td>
			<td><?php echo $row[1]; ?></td>
			<td><?php echo $row[2]; ?></td>
            <td><?php
			$dsdsd=$row[3];
			echo formatMoney($dsdsd, true);
			?></td>
            <td><?php echo $row[4]; ?></td>
            <td><?php echo $row[5]; ?></td>

			</tr>

			<?php
			$t=$row[13];
			$d=$row[7];
			$n=$row[8];
			$p=$row[9];
			$d=$row[10];
			
			$ic1=$ic2;
				}
				
			}
			?>
		
	</tbody>
	<thead>
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
GetTestDetails=function(){
        let p1 = fetch(`http://localhost/Mysql/petro%20bangla/mysql/getitembycode.php?Code=${a}`); 
            let p2 = p1.then(res =>res.json()).then(data => {
                //console.log(JSON.stringify(data.records));
                b=document.getElementById("customername").value=data.records[0].customername;
                 let o={itemcode:a.itemcode,customername:b.customername}; 
                st.records.push(o) ;
                
               // display1();
            });
    }
	// function display1(){
    //     let a="";   
    //     let i=0;
    //     for(d of st.records){  
    //                 a+=`<tr onclick="show?.('${d?.Code}','${d?.itemname}','${i}')"><td>${i+1}</td><td>${d.Code}</td><td>${d.itemname}</td>
					
	// 				<td><button type="button"  class="btn btn-danger" onclick="remove('${i}',event)">Remove</button></td></tr>`;
    //                 i++;//i=i+1;
    //             }       
    //             document.getElementById("tb").innerHTML=a;
    //             Sum();
    // }
</script>
<?php include('footer.php');?>
</html>