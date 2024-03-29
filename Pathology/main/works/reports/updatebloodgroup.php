<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
   if( isset($_GET['registrationid']) && isset($_GET['Slno']) && isset($_GET['date']) && isset($_GET['receivedate']) &&
    isset($_GET['reportdate']) && isset($_GET['Patientname']) && isset($_GET['gender'])&& isset($_GET['age']) && isset($_GET['referdoctor']) &&
     isset($_GET['testname']) && isset($_GET['bloodgrouping']) && isset($_GET['RHfactor'])) {
        $a=new library();	
        $m=$a->db;
        $q="update bloodgroup set registrationid='{$_GET['registrationid']}',Slno='{$_GET['Slno']}',date='{$_GET['date']}',receivedate='{$_GET['receivedate']}',reportdate='{$_GET['reportdate']}'
        ,Patientname='{$_GET['Patientname']}',gender='{$_GET['gender']}',age='{$_GET['age']}',referdoctor='{$_GET['referdoctor']}',
        testname='{$_GET['testname']}',bloodgrouping='{$_GET['bloodgrouping']}',
        RHfactor='{$_GET['RHfactor']}' where registrationid='{$_GET['registrationid']}'and Slno='{$_GET['Slno']}'";



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
//Run the service by:  http://localhost/mysql/2023-08-31(Project)/updategroups.php?groupcode=1&groupname=Bio-Chemical

/*?registrationid=001&Slno=1&date=2023-09-10&
receivedate=2023-09-12&reportdate=2023-09-13&Patientname=salina&gender=female&age=25&referdoctor=asad&
testname=RHfactor&bloodgrouping=&RHfactor=*/
    ?>