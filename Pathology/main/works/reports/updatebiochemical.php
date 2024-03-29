<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET["registrationid"]) && isset($_GET["slno"])
    //  && isset($_GET["date"])  && isset($_GET["receivedate"]) &&
    //  isset($_GET["reportdate"])
    //    && isset($_GET["patientname"]) && isset($_GET["gender"])  &&
    // isset($_GET["age"]) && isset($_GET["RefbyDR"]) && isset($_GET["testname"]) 
    // && isset($_GET["SERUM_BIRIRUBIN_TOTAL"]) && isset($_GET["SERUM_ALK_PHOSPHATASE"])
    //  && isset($_GET["SERUM_SGOT_AST"]) && isset($_GET["SERUM_SGPT_ALT"]) && 
    //  isset($_GET["SERUM_ACID_PHOSPHATASE"]) && isset($_GET["SERUM_CHOLESTEROL"]) && isset($_GET["SERUM_UREA"]) && isset($_GET["SERUM_URIC_ACID"]) &&
    //  isset($_GET["SERUM_CAL_CIUM"]) && isset($_GET["SERUM_ALBUMIN"]) && isset($_GET["CPK_MB"]) && isset($_GET["HBA1C"])
    //  && isset($_GET["SERUM_LDH"]))
    ){
        $a=new library();	
        $m=$a->db;
        //$q="UPDATE `biochemical` SET `registrationid` = '{$_GET['spid']}', `slno` = '3', `date` = '2023-09-06', `receivedate` = '2023-09-02', `reportdate` = '2023-09-11', `patientname` = 'asgfhadfgf', `gender` = 'Female', `age` = '25', `referdoctor` = 'dr.sdgfhj', `testname` = "biochemical", `SERUM_BIRIRUBIN_TOTAL` = '16', `SERUM_ALK_PHOSPHATASE` = '37', `SERUM_SGOT_AST` = '55', `SERUM_SGPT_ALT` = '76', `SERUM_ACID_PHOSPHATASE` = '99', `SERUM_CHOLESTEROL` = '34', `SERUM_TRYGLYCERIDE` = '37', `SERUM_UREA` = '43', `SERUM_URIC_ACID` = '46',  `SERUM_CAL_CIUM` = '52', `SERUM_ALBUMIN` = '32', `CPK_MB` = '21', `HBA1C` = '34', `SERUM_LDH` = '54' WHERE `biochemical`.`registrationid` = 'asd-123' AND `biochemical`.`slno` = 2;";
        $q="update biochemical set registrationid='{$_GET["registrationid"]}',slno='{$_GET["slno"]}',date='{$_GET["date"]}',receivedate='{$_GET["receivedate"]}',reportdate='{$_GET["reportdate"]}',patientname='{$_GET["patientname"]}',gender='{$_GET["gender"]}',age='{$_GET["age"]}',
        referdoctor='{$_GET["referdoctor"]}',testname='{$_GET["testname"]}',SERUM_BIRIRUBIN_TOTAL ='{$_GET["SERUM_BIRIRUBIN_TOTAL"]}',SERUM_ALK_PHOSPHATASE='{$_GET["SERUM_ALK_PHOSPHATASE"]}',
        SERUM_SGOT_AST='{$_GET["SERUM_SGOT_AST"]}',SERUM_SGPT_ALT='{$_GET["SERUM_SGPT_ALT"]}',SERUM_ACID_PHOSPHATASE='{$_GET["SERUM_ACID_PHOSPHATASE"]}',SERUM_CHOLESTEROL='{$_GET["SERUM_CHOLESTEROL"]}',
        SERUM_TRYGLYCERIDE='{$_GET["SERUM_TRYGLYCERIDE"]}',SERUM_UREA='{$_GET["SERUM_UREA"]}',SERUM_URIC_ACID='{$_GET["SERUM_URIC_ACID"]}',
        SERUM_CAL_CIUM='{$_GET["SERUM_CAL_CIUM"]}',SERUM_ALBUMIN='{$_GET["SERUM_ALBUMIN"]}',
        CPK_MB='{$_GET["CPK_MB"]}',HBA1C='{$_GET["HBA1C"]}',
        SERUM_LDH='{$_GET["SERUM_LDH"]}'
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