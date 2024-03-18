<?php

    header( 'Content-Type: text/html; charset=utf-8' );

    $arr=array(); 

    include("library.php");


    if( isset($_GET['RegistrationID'])&& isset($_GET['SLNo'])&& isset($_GET['Date'])&& isset($_GET['ReceiveDate']) && isset($_GET['ReportDate'])&& isset($_GET['PatientName']) && isset($_GET['Gender']) && isset($_GET['Age']) && isset($_GET['RefDoctor'])&& isset($_GET['TestName'])&& isset($_GET['PregnanacyTest']) ){

        $a=new library();	

        $m=$a->db;

        $q="insert into pregnancy values('{$_GET['RegistrationID']}','{$_GET['SLNo']}','{$_GET['Date']}','{$_GET['ReceiveDate']}','{$_GET['ReportDate']}','{$_GET['PatientName']}','{$_GET['Gender']}','{$_GET['Age']}','{$_GET['RefDoctor']}','{$_GET['TestName']}','{$_GET['PregnanacyTest']}')";
        //echo $q;
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

    //Run the service by:  http://localhost/PHP%20PRACTISE/New%20folder/PROJECT%20[%20Diagnostic%20Management%20System%20]/InsertPregnancy.php?RegistrationID=1&SLNo=1&Date=2023-09-05&ReceiveDate=2023-09-05&ReportDate=2023-09-06&PatientName=Maliha&Gender=Female&Age=36&RefDoctor=DR-Fatema&TestName=PregnancyTest&PregnanacyTest=Yes






?>