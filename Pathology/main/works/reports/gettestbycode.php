<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    include("library.php");
    if (isset($_GET['Code'])){
        $arr=array();
        $a=new library();	
        $m=$a->db;
        $q="select investigation,amount from tests where Code='{$_GET['Code']}' limit 1";
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
    }
    else{
        echo '{success:input query string}'; 
    }
	?>