<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET['vrno']) 
    //&& isset($_GET['supplierName']) && isset($_GET['date']) && isset($_GET['total']) && isset($_GET['discount']) && isset($_GET['net']) && isset($_GET['paid']) && isset($_GET['due']) 
 ){
        $a=new library();	
        $m=$a->db;
        $q="update purchestotal set vrno='{$_GET['vrno']}',suppliername='{$_GET['suppliername']}',date='{$_GET['date']}',total='{$_GET['total']}',discount='{$_GET['discount']}',net='{$_GET['net']}',paid='{$_GET['paid']}',due='{$_GET['due']}' where vrno='{$_GET['vrno']}'";
        $r=$m->query($q);
       // echo $q;
        if(!$r)	{
            echo "{success:".mysqli_errno($m).", Query: $q}";		
        }
        else{
            echo '{success:true}';	  
        }
	
        }
        else{
            echo '{success:input query string}'; 
        }
//Run the service by:  http://localhost/mysql/2023-08-31(Project)/updatesalestotal.php?vrno=AC-001&CustomerName=Jamal%20Uddin&Date=2023-08-31&Total=160&Discount=0&Net=160&Paid=0&Due=160
    ?>
    <!-- http://localhost/purchaes/update%20purchasetotal.php?vrno=009&suppliername=salam&date=2023-09-10&total=200&discount=20&net=1800&paid=100&due=80; -->