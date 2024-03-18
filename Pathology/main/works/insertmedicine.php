<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET['itemcode']) &&isset($_GET['itemname']) &&isset($_GET['geneticname']) &&isset($_GET['type'])){
        $a=new library();	
        $m=$a->db;
        $q="insert into medicines(itemcode,itemname,geneticname,type) values('{$_GET['itemcode']}','{$_GET['itemname']}','{$_GET['geneticname']}','{$_GET['type']}')";
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
    //Run the service by:  http://localhost/JQUERY/MY%20Project%20[%20JQUERY%20CODE%20]/Pathology/main/works/insertmedicine.php?itemcode=3&itemname=NapaExtend&geneticname=Paracetamol&type=Tablet

    ?>