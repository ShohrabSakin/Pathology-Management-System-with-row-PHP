<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET['registrationid']) && isset($_GET['Slno'])){
        $a=new library();	
        $m=$a->db;
        $q="delete from lipidprofile where registrationid='{$_GET["registrationid"]}'and Slno='{$_GET["Slno"]}'";
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
//Run the service by:  http://localhost/mysql/2023-08-31(Project)/deletegroups.php?groupcode=1
//localhost/MYSQL%20Project/delete%20lipidprofile.php?registrationid=001&Slno=1
    ?>