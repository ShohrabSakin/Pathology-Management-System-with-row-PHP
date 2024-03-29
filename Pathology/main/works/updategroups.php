<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET['groupcode']) && isset($_GET['groupname']) ){
        $a=new library();	
        $m=$a->db;
        $q="update groups set groupcode='{$_GET['groupcode']}',groupname='{$_GET['groupname']}',company='{$_GET['company']}',`show`='{$_GET['SHOW']}',smalldept='{$_GET['smalldept']}',smallnamesl='{$_GET['smallnamesl']}' where groupcode='{$_GET['groupcode']}'";
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
//Run the service by:  http://localhost/mysql/2023-08-31(Project)/updategroups.php?groupcode=1&groupname=Bio-Chemical
    ?>