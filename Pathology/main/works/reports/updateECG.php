<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET["registrationid"]) && isset($_GET["slno"])
    ){
        $a=new library();	
        $m=$a->db;
        $q="update E_C_G set registrationid='{$_GET["registrationid"]}',slno='{$_GET["slno"]}',date='{$_GET["date"]}',receivedate='{$_GET["receivedate"]}',reportdate='{$_GET["reportdate"]}',patientname='{$_GET["patientname"]}',gender='{$_GET["gender"]}',age='{$_GET["age"]}',
        referdoctor='{$_GET["referdoctor"]}',testname='{$_GET["testname"]}',E_C_G ='{$_GET["E_C_G"]}'
        where registrationid='{$_GET["registrationid"]}' and slno='{$_GET["slno"]}'";
        $r=$m->query($q);
        if(!$r)	{
            echo '{"success":"'.mysqli_errno($m).'", "Query":"'.$q.'"}';		
        }
        else{
            echo '{success:true}';	  
        }
	
        }
        else{
            echo '{success:input query string}'; 
        }
//Run the service by:  http://localhost/mysql/2023-08-31(Project)/updatetests.php?Code=10&Investigation=XRAY%20CHEST%20A/P%20VIEW&Amount=160
    ?>