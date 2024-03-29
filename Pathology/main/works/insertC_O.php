<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET['id']) &&isset($_GET['name']) &&isset($_GET['show_value'])){
        $a=new library();	
        $m=$a->db;
        $q="insert into c_o(id,name,show_value) values('{$_GET['id']}','{$_GET['name']}','{$_GET['show_value']}')";
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
    //Run the service by:  http://localhost/JQUERY/MY%20Project%20[%20JQUERY%20CODE%20]/Pathology/main/works/insertC_O.php?id=6&name=Abdomin&show_value=no

    ?>