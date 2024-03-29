<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET['vrno']) && isset($_GET['CustomerName']) && isset($_GET['Doctorid']) && isset($_GET['Date']) && isset($_GET['Total']) && isset($_GET['Discount']) && isset($_GET['Net']) && isset($_GET['Paid']) && isset($_GET['Due'])  ){
        $a=new library();	
        $m=$a->db;
        $q="insert into salestotal values('{$_GET['vrno']}','{$_GET['CustomerName']}','{$_GET['Doctorid']}','{$_GET['Date']}',{$_GET['Total']},{$_GET['Discount']},{$_GET['Net']},{$_GET['Paid']},{$_GET['Due']})";
        $r=$m->query($q);
        if(!$r)	{
            echo "{success:".mysqli_errno($m).", Query: $q}";	
        }
        else{
            echo '{"success":"true","total":"'.$m->affected_rows.'"}';	  
        }	
    }
    else{
            echo '{success:input query string}'; 
    }
    //Run the service by:  http://localhost/mysql/2023-08-31(Project)/insertsalestotal.php?vrno=AC-001&CustomerName=Jamal%20Uddin&Date=2023-08-31&Total=160&Discount=0&Net=160&Paid=160&Due=0
    ?>