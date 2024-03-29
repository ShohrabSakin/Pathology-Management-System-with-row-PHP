<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET['id']) &&isset($_GET['name'])&&isset($_GET['value']) ){
        $a=new library();	
        $m=$a->db;
        $q="update o_e set id='{$_GET['id']}',name='{$_GET['name']}',value='{$_GET['value']}'  where id='{$_GET['id']}'";
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
//Run the service by:  http://localhost/JQUERY/MY%20Project%20[%20JQUERY%20CODE%20]/Pathology/main/works/updateo_e.php?id=1&name=Heart&value=160

    ?>