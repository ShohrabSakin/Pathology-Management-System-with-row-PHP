<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET['Code']) &&isset($_GET['TestCode']) &&isset($_GET['Type']) &&isset($_GET['GroupCode'])  &&isset($_GET['Investigation']) &&isset($_GET['Details']) &&isset($_GET['Amount']) &&isset($_GET['picture']) ){
        $a=new library();	
        $m=$a->db;
        $q="update tests set Code='{$_GET['Code']}',TestCode='{$_GET['TestCode']}',Type='{$_GET['Type']}',GroupCode='{$_GET['GroupCode']}',Investigation='{$_GET['Investigation']}',Details='{$_GET['Details']}',Amount='{$_GET['Amount']}',picture='{$_GET['picture']}'  where Code='{$_GET['Code']}'";
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