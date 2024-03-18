<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    if( isset($_GET['registrationid']) && isset($_GET['Slno'])&& isset($_GET['date']) 
    && isset($_GET['receivedate'])&& isset($_GET['reportdate'])
    && isset($_GET['Patientname'])&& isset($_GET['gender'])&& isset($_GET['age']) 
    && isset($_GET['referdoctor'])&& isset($_GET['testname']) 
    && isset($_GET['SERUM_Cholesterol'])
    && isset($_GET['SERUM_Triglycerides'])&& isset($_GET['HDL_Cholesterol'])&& isset($_GET['HDL_Cholesterol'])){
        $a=new library();	
        $m=$a->db;
        $q="insert into lipidprofile values('{$_GET['registrationid']}','{$_GET['Slno']}','{$_GET['date']}','{$_GET['receivedate']}','{$_GET['reportdate']}','{$_GET['Patientname']}','{$_GET['gender']}','{$_GET['age']}','{$_GET['referdoctor']}','{$_GET['testname']}',
        '{$_GET['SERUM_Cholesterol']}','{$_GET['SERUM_Triglycerides']}','{$_GET['HDL_Cholesterol']}','{$_GET['LDL_Cholesterol']}')";
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
    //Run the service by:  http://localhost/mysql/2023-08-31(Project)/insertgroups.php?groupcode=1&groupname=BioChemical

/*localhost/MYSQL%20Project/insert%20lipidprofile.php?registrationid=003&Slno=3&date=2023-09-10&receivedate=2023-09-12&
    reportdate=2023-09-14&Patientname=salina&gender=female&age=26&referdoctor=asad&testname=RHfactor&SERUM_Cholesterol=&
    SERUM_Triglycerides=&HDL_Cholesterol=&LDL_Cholesterol*/
    ?>