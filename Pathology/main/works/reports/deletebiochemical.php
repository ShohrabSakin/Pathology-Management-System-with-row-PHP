<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if(isset($_GET["registrationid"]) && isset($_GET["slno"]) ){
        $a=new library();	
        $m=$a->db;
        $q="delete from biochemical where registrationid='{$_GET["registrationid"]}' and slno='{$_GET["slno"]}'";
        
        $r=$m->query($q);
        if(!$r)	{
            echo "{success:".mysqli_errno($m).", Query: $q}";		
        }
        else{
            echo '{success:true}';	  
        }
	
        }
        else{
            echo '{success:input query string}'   ; 
         
        }
//Run the service by:  http://localhost/mysql/2023-08-31(Project)/deletetests.php?Code=10
    ?>