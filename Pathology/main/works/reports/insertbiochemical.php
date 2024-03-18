<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET["registrationid"]) && isset($_GET["slno"])
    // && isset($_GET["date"])  && isset($_GET["receivedate"]) isset($_GET["reportdate"]) 
     //    && isset($_GET["patientname"]) && isset($_GET["gender"])  && isset($_GET["age"]) && isset($_GET["RefbyDR"]) && isset($_GET["testname"])
   //  &&  isset($_GET["SERUM_BIRIRUBIN_TOTAL"]) && isset($_GET["SERUM_ALK_PHOSPHATASE"]) && isset($_GET["SERUM_SGOT_AST"]) && isset($_GET["SERUM_SGPT_ALT"]) &&  isset($_GET["SERUM_ACID_PHOSPHATASE"]) && isset($_GET["SERUM_CHOLESTEROL"]) && isset($_GET["SERUM_UREA"]) && isset($_GET["SERUM_URIC_ACID"]) &&
    // isset($_GET["SERUM_CAL_CIUM"]) && isset($_GET["SERUM_ALBUMIN"]) && isset($_GET["CPK_MB"]) && isset($_GET["HBA1C"]) && isset($_GET["SERUM_LDH"]) && isset($_GET["r14"]) 
     ){
        $a=new library();	
        $m=$a->db;
        $q="insert into biochemical (`registrationid`, `slno`, `date`, `receivedate`, `reportdate`, `patientname`, `gender`, `age`, `referdoctor`, `testname`, `SERUM_BIRIRUBIN_TOTAL`, `SERUM_ALK_PHOSPHATASE`, `SERUM_SGOT_AST`, `SERUM_SGPT_ALT`, `SERUM_ACID_PHOSPHATASE`, `SERUM_CHOLESTEROL`, `SERUM_TRYGLYCERIDE`, `SERUM_UREA`, `SERUM_URIC_ACID`, `SERUM_CAL_CIUM`, `SERUM_ALBUMIN`, `CPK_MB`, `HBA1C`, `SERUM_LDH`) 
         values('{$_GET["registrationid"]}','{$_GET["slno"]}','{$_GET["date"]}','{$_GET["receivedate"]}',
        '{$_GET["reportdate"]}','{$_GET["patientname"]}','{$_GET["gender"]}','{$_GET["age"]}', '{$_GET["referdoctor"]}','{$_GET["testname"]}',
        '{$_GET["SERUM_BIRIRUBIN_TOTAL"]}','{$_GET["SERUM_ALK_PHOSPHATASE"]}',
        '{$_GET["SERUM_SGOT_AST"]}','{$_GET["SERUM_SGPT_ALT"]}','{$_GET["SERUM_ACID_PHOSPHATASE"]}','{$_GET["SERUM_CHOLESTEROL"]}',
        '{$_GET["SERUM_TRYGLYCERIDE"]}', '{$_GET["SERUM_UREA"]}',
        '{$_GET["SERUM_URIC_ACID"]}','{$_GET["SERUM_CAL_CIUM"]}','{$_GET["SERUM_ALBUMIN"]}','{$_GET["CPK_MB"]}','{$_GET["HBA1C"]}',
        '{$_GET["SERUM_LDH"]}')";
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