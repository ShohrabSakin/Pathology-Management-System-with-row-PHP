<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET['department']) && isset($_GET['percent']) ){
        $a=new library();	
        $m=$a->db;
        $q="UPDATE `commission` SET `department` = '{$_GET['department']}', `percent` = '{$_GET['percent']}' WHERE `commission`.`department` = '{$_GET['department']}'";
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
//Run the service by:  http://localhost/mysql/2023-08-31(Project)/updatetests.php?Code=10&Investigation=XRAY%20CHEST%20A/P%20VIEW&Amount=160
    ?>