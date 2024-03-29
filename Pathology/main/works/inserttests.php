<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET['Code']) &&isset($_GET['TestCode']) &&isset($_GET['Type']) &&isset($_GET['GroupCode']) &&isset($_GET['Investigation']) &&isset($_GET['Details']) &&isset($_GET['Amount'])  &&isset($_GET['picture'])){
        $a=new library();	
        $m=$a->db;
        $q="insert into tests(Code,TestCode,Type,GroupCode,Investigation,Details,Amount,picture) values('{$_GET['Code']}','{$_GET['TestCode']}','{$_GET['Type']}','{$_GET['GroupCode']}','{$_GET['Investigation']}','{$_GET['Details']}','{$_GET['Amount']}','{$_GET['picture']}')";
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
    //Run the service by:  http://localhost/mysql/2023-08-31(Project)/inserttests.php?Code=10&Investigation=X-RAY%20CHEST%20A/P%20VIEW&Amount=160
    ?>