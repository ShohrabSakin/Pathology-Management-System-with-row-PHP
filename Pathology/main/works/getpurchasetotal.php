<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    if (isset($_GET['vrno'])){
        include("library.php");
        $a=new library();	
        $m=$a->db;
        $q="select * from salestotal where vrno='{$_GET['vrno']}' limit 1";
        $r=$m->query($q);
        if(!$r)
        {
        echo "{success:".mysqli_errno($m).", Query: $q}";	
        return;
        }
        while($c=$r->fetch_object())
        {
            $arr[]=$c;
        }
        // $r1=$m->query($q);
        // $results=$r1->num_rows;
        echo '{"total":"'.$r->num_rows.'", "records":['. trim(json_encode($arr),"[]")."]}";
    }
    else{
        echo '{"success":"input query string"}'; 
    }
    //Run the web service by: http://localhost/mysql/2023-08-31(Project)/getsalestotalbyvrno.php?vrno=ac-00003
    ?>