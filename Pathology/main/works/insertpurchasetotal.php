<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET['vrno']) 
   // && isset($_GET['suppliername'])&& isset($_GET['date']) && isset($_GET['total']) && isset($_GET['discount']) && isset($_GET['net']) && isset($_GET['paid']) && isset($_GET['due'])
){
        $a=new library();	
        $m=$a->db; 
        $q="insert into purchestotal values('{$_GET['vrno']}','{$_GET['suppliername']}','{$_GET['date']}','{$_GET['total']}','{$_GET['discount']}','{$_GET['net']}','{$_GET['paid']}','{$_GET['due']}')";
        //echo $q;
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
