<?php

    header( 'Content-Type: text/html; charset=utf-8' );

    $arr=array(); 

    include("library.php");


    if( isset($_GET['RegistrationID'])&& isset($_GET['SLNo'])&& isset($_GET['Date'])&& isset($_GET['ReceiveDate']) && isset($_GET['ReportDate'])&& isset($_GET['PatientName']) && isset($_GET['Gender']) && isset($_GET['Age']) && isset($_GET['RefDoctor'])&& isset($_GET['TestName'])&& isset($_GET['PregnanacyTest'])){

        $a=new library();	

        $m=$a->db;

        $q="update pregnancy set RegistrationID='{$_GET['RegistrationID']}',SLNo='{$_GET['SLNo']}',Date='{$_GET['Date']}',ReceiveDate='{$_GET['ReceiveDate']}',ReportDate='{$_GET['ReportDate']}',PatientName='{$_GET['PatientName']}',Gender='{$_GET['Gender']}',Age='{$_GET['Age']}',ReferDoctor='{$_GET['RefDoctor']}',TestName='{$_GET['TestName']}',Pregnancy_Test='{$_GET['PregnanacyTest']}' where RegistrationID='{$_GET['RegistrationID']}' and SLNo='{$_GET['SLNo']}'";
        //echo $q;
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


//Run the service by:  http://localhost/PHP%20PRACTISE/New%20folder/PROJECT%20[%20Diagnostic%20Management%20System%20]/UpdatePregnancy.php?RegistrationID=1&SLNo=1&Date=2023-09-05&ReceiveDate=2023-09-05&ReportDate=2023-09-06&PatientName=Maliha&Gender=Female&Age=36&RefDoctor=DR-Fatema&TestName=PregnancyTest&PregnanacyTest=No


?>