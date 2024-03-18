<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET['id']) &&isset($_GET['name'])){
        $a=new library();	
        $m=$a->db;
        $q="update h_o set id='{$_GET['id']}',name='{$_GET['name']}',year='{$_GET['year']}' where id='{$_GET['id']}'";
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
//Run the service by:  http://localhost/JQUERY/MY%20Project%20[%20JQUERY%20CODE%20]/Pathology/main/works/updateH_O.php?id=3&name=HNS&year=2
    ?>