<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET['vrno'])
     //&& isset($_GET['itemcode']) && isset($_GET['itemname']) && isset($_GET['qty']) && isset($_GET['price']) && isset($_GET['total']) 
     ){
        $a=new library();	
        $m=$a->db;
        $q="update purcheslineitems set vrno='{$_GET['vrno']}',itemcode='{$_GET['itemcode']}',itemname='{$_GET['itemname']}',qty='{$_GET['qty']}',price='{$_GET['price']}',total='{$_GET['total']}' where vrno='{$_GET['vrno']}'";
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
//Run the service by:  http://localhost/mysql/2023-08-31(Project)/updatesaleslineitems.php?vrno=AC-001&slno=1&itemcode=10&itemname=XRAY%20CHEST%20A/P%20VIEW&qty=1&price=160&total=160
    ?>