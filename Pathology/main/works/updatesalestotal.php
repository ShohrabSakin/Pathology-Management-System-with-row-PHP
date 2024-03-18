<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET['vrno']) && isset($_GET['CustomerName'])  && isset($_GET['Doctorid']) && isset($_GET['Date']) && isset($_GET['Total']) && isset($_GET['Discount']) && isset($_GET['Net']) && isset($_GET['Paid']) && isset($_GET['Due'])  ){
        $a=new library();	
        $m=$a->db;
        $q="update salestotal set vrno='{$_GET['vrno']}',CustomerName='{$_GET['CustomerName']}',Doctorid='{$_GET['Doctorid']}',Date='{$_GET['Date']}',Total='{$_GET['Total']}',Discount={$_GET['Discount']},Net={$_GET['Net']},Paid={$_GET['Paid']},Due={$_GET['Due']} where vrno='{$_GET['vrno']}'";
        $r=$m->query($q);
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