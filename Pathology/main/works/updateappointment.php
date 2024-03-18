<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET['date']) && isset($_GET['doctorid']) && isset($_GET['slno']) && isset($_GET['patientname']) && isset($_GET['email']) && isset($_GET['mobile'])){
        $a=new library();	
        $m=$a->db;
        $q="update appointment set date='{$_GET['date']}',doctorid='{$_GET['doctorid']}',slno='{$_GET['slno']}',patientname='{$_GET['patientname']}',email='{$_GET['email']}',mobile='{$_GET['mobile']}' where date='{$_GET['date']}' and doctorid='{$_GET['doctorid']}' and slno='{$_GET['slno']}'";
        $r=$m->query($q);
        //echo($q);
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
//Run the service by:  http://localhost/JQUERY/MY%20Project%20[%20JQUERY%20CODE%20]/Pathology/main/works/updateappointment.php?date=2023-10-05&doctorid=1&slno=1&patientname=Rakib&email=abc@xyz.com&mobile=0181444774

    ?>