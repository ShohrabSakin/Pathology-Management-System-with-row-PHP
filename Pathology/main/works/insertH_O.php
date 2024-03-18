<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET['id']) &&isset($_GET['name'])){
        $a=new library();	
        $m=$a->db;
        $q="INSERT INTO `h_o` (`id`, `name`,year) VALUES({$_GET['id']},'{$_GET['name']}','{$_GET['year']}')";
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
    //Run the service by:  http://localhost/JQUERY/MY%20Project%20[%20JQUERY%20CODE%20]/Pathology/main/works/insertH_O.php?id=2&name=DM&year=1

    ?>