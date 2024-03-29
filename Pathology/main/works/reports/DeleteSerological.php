<?php

    header( 'Content-Type: text/html; charset=utf-8' );

    $arr=array(); 

    include("library.php");

    if( isset($_GET['RegistrationID']) && isset($_GET['SLNo'])){

        $a=new library();	

        $m=$a->db;

        $q="delete from serological where RegistrationID='{$_GET['RegistrationID']}' and SLNo='{$_GET['SLNo']}'";

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

//Run the service by:  http://localhost/PHP%20PRACTISE/New%20folder/PROJECT%20[%20Diagnostic%20Management%20System%20]/DeleteSerological.php?RegistrationID=2&SLNo=2


?>