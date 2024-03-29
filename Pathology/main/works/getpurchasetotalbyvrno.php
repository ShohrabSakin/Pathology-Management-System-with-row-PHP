<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    include("library.php");
   
        $arr=array();
        $a=new library();	
        $m=$a->db;
        $q="select * from purchestotal where vrno='{$_GET['vrno']}' order by vrno";
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
        echo '{"records":['. trim(json_encode($arr),"[]")."]}";
    //http://localhost/mysql/2023-08-31(Project)/getvrnos.php
	?>