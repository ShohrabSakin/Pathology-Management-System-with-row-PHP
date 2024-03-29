<?php
/*http://localhost/MYSQL%20Project/update%20lipidprofile.php?registrationid=004&Slno=3&date=2023-09-10&
receivedate=2023-09-12&reportdate=2023-09-13&patientname=salina&gender=female&age=25&referdoctor=asad&
testname=RHfactor&SERUM_Cholesterol=&SERUM_Triglycerides=&HDL_Cholesterol=&LDL_Cholesterol*/
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    // http://localhost/mysql/2023-09-19/AuthenticationSystem/main/works/reports/
    // updatelipidprofile.php?registrationid=AC-00015&Slno=&date=2023-09-19
    // &receivedate=2023-09-19&reportdate=2023-09-19&patientname=abdul&gender=Female
    // &age=0&referdoctor=&testname=LIPID_PROFILE&SERUM_Cholesterol=1
    // &SERUM_Triglycerides=2&HDL_Cholesterol=30&HDL_Cholesterol=4


   if( isset($_GET['registrationid']) && isset($_GET['Slno'])&& isset($_GET['date']) 
   && isset($_GET['receivedate']) && 
   isset($_GET['reportdate'])
    && isset($_GET['patientname'])&& isset($_GET['gender'])&& isset($_GET['age']) 
    && isset($_GET['referdoctor']) 
    && isset($_GET['testname']) && isset($_GET['SERUM_Cholesterol'])
    && isset($_GET['SERUM_Triglycerides'])&& isset($_GET['HDL_Cholesterol']) && isset($_GET['LDL_Cholesterol'])) {
        $a=new library();	
        $m=$a->db;
        $q="update lipidprofile set registrationid='{$_GET['registrationid']}',Slno='{$_GET['Slno']}',date='{$_GET['date']}',receivedate='{$_GET['receivedate']}',reportdate='{$_GET['reportdate']}',patientname='{$_GET['patientname']}',gender='{$_GET['gender']}',age='{$_GET['age']}',referdoctor='{$_GET['referdoctor']}',testname='{$_GET['testname']}',
        SERUM_Cholesterol='{$_GET['SERUM_Cholesterol']}',SERUM_Triglycerides='{$_GET['SERUM_Triglycerides']}',HDL_Cholesterol='{$_GET['HDL_Cholesterol']}',
        LDL_Cholesterol='{$_GET['LDL_Cholesterol']}' where registrationid='{$_GET['registrationid']}' and Slno='{$_GET['Slno']}'";



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
//Run the service by:  http://localhost/mysql/2023-08-31(Project)/updategroups.php?groupcode=1&groupname=Bio-Chemical//localhost/MYSQL%20Project/update%20lipidprofile.php?registrationid=004&Slno=3&date=2023-09-10&receivedate=2023-09-12&reportdate=2023-09-13&Patientname=salina&gender=female&age=25&
//referdoctor=asad&testname=RHfactor&SERUM_Cholesterol=&SERUM_Triglycerides=&HDL_Cholesterol=&LDL_Cholesterol
    ?>