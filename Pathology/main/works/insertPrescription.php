INSERT INTO `prescription` (`id`, `description`) VALUES ('2', '1+1+1');
<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET['id']) &&isset($_GET['description'])){
        $a=new library();	
        $m=$a->db;
        $q="INSERT INTO `prescription` (`id`, `description`) VALUES ({$_GET['id']},'{$_GET['description']}')";
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
    //Run the service by:  http://localhost/mysql/2023-08-31(Project)/inserttests.php?Code=10&Investigation=X-RAY%20CHEST%20A/P%20VIEW&Amount=160
    ?>