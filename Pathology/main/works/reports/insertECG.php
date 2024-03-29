<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET["registrationid"]) && isset($_GET["slno"])     ){
        $a=new library();	
        $m=$a->db;
        $q="insert into E_C_G (`registrationid`, `slno`, `date`, `receivedate`, `reportdate`, `patientname`, `gender`, `age`, `referdoctor`, `testname`, `E_C_G`) 
         values('{$_GET["registrationid"]}','{$_GET["slno"]}','{$_GET["date"]}','{$_GET["receivedate"]}','{$_GET["reportdate"]}','{$_GET["patientname"]}','{$_GET["gender"]}','{$_GET["age"]}', '{$_GET["referdoctor"]}','{$_GET["testname"]}',
        '{$_GET["E_C_G"]}')";
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
    //Run the service by:  http://localhost/Mysql/2023-09-03(project)/reports/mysql-project/
    //insertbiochemical.php?registrationid=asd-123&slno=4&date=2023-09-06&receivedate=2023-09-02&reportdate=2023-09-11&patientname=abc&gender=female&age=24&referdoctor=dr.%20avcd&testname=biochemical&SERUM_BIRIRUBIN_TOTAL=21&SERUM_ALK_PHOSPHATASE=32&SERUM_SGOT_AST=43&SERUM_SGPT_ALT=53&SERUM_ACID_PHOSPHATASE=35&SERUM_CHOLESTEROL=36&SERUM_TRYGLYCERIDE=55&SERUM_UREA=45&SERUM_URIC_ACID=45&SERUM_CAL_CIUM=47&SERUM_ALBUMIN=42&CPK_MB=47&HBA1C=23&SERUM_LDH=34
    ?>