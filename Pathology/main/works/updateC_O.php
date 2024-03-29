<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET['id']) &&isset($_GET['name']) &&isset($_GET['show_value'])){
        $a=new library();	
        $m=$a->db;
        $q="update c_o set id='{$_GET['id']}',name='{$_GET['name']}',show_value='{$_GET['show_value']}'  where id='{$_GET['id']}'";
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
//Run the service by:  http://localhost/JQUERY/MY%20Project%20[%20JQUERY%20CODE%20]/Pathology/main/works/updateC_O.php?id=8&name=sugar&show_value=yes
    ?>