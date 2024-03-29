<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET['itemcode']) &&isset($_GET['itemname']) &&isset($_GET['geneticname']) &&isset($_GET['type'])){
        $a=new library();	
        $m=$a->db;
        $q="update medicines set itemcode={$_GET['itemcode']},itemname='{$_GET['itemname']}',geneticname='{$_GET['geneticname']}',type='{$_GET['type']}'  where itemcode='{$_GET['itemcode']}'";
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
    //Run the service by:  http://localhost/JQUERY/MY%20Project%20[%20JQUERY%20CODE%20]/Pathology/main/works/updatemedicine.php?itemcode=3&itemname=NapaExtend&geneticname=Tablet&type=Tablet
    ?>