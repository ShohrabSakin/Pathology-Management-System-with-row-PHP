<?php

    header( 'Content-Type: text/html; charset=utf-8' );

    $arr=array(); 

    include("library.php");


    if( isset($_GET['RegistrationID'])&& isset($_GET['SLNo'])&& isset($_GET['Date'])&& isset($_GET['ReceiveDate']) && isset($_GET['ReportDate'])&& isset($_GET['PatientName']) && isset($_GET['Gender']) && isset($_GET['Age']) && isset($_GET['RefDoctor'])&& isset($_GET['TestName'])&& isset($_GET['ASO_TITRE'])&& isset($_GET['RA_Factor'])&& isset($_GET['HBsAg_Screenning'])&& isset($_GET['HBsAg_Confirmatory'])&& isset($_GET['VDRLTest_Qualiitive'])&& isset($_GET['VDRLTest_Quantative'])&& isset($_GET['TPHA'])&& isset($_GET['HBATC'])&& isset($_GET['CRP'])&& isset($_GET['Micro_Albumin_Urine'])&& isset($_GET['Vitamin_B_12'])&& isset($_GET['BloodGroup_RH_DTYPE']) ){

        $a=new library();	

        $m=$a->db;

        $q="insert into serological values('{$_GET['RegistrationID']}','{$_GET['SLNo']}','{$_GET['Date']}','{$_GET['ReceiveDate']}','{$_GET['ReportDate']}','{$_GET['PatientName']}','{$_GET['Gender']}','{$_GET['Age']}','{$_GET['RefDoctor']}','{$_GET['TestName']}','{$_GET['ASO_TITRE']}','{$_GET['RA_Factor']}','{$_GET['HBsAg_Screenning']}','{$_GET['HBsAg_Confirmatory']}','{$_GET['VDRLTest_Qualiitive']}','{$_GET['VDRLTest_Quantative']}','{$_GET['TPHA']}','{$_GET['HBATC']}','{$_GET['CRP']}','{$_GET['Micro_Albumin_Urine']}','{$_GET['Vitamin_B_12']}','{$_GET['BloodGroup_RH_DTYPE']}')";
        echo $q;
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

    //Run the service by: http://localhost/PHP%20PRACTISE/New%20folder/PROJECT%20[%20Diagnostic%20Management%20System%20]/InsertSerological.php?RegistrationID=1&SLNo=1&Date=2023-09-05&ReceiveDate=2023-09-05&ReportDate=2023-09-06&PatientName=Maliha&Gender=Female&Age=36&RefDoctor=DR-Fatema&TestName=SerologicalTest&ASO_TITRE=1&RA_Factor=2&HBsAg_Screenning=3&HBsAg_Confirmatory=4&VDRLTest_Qualiitive=5&VDRLTest_Quantative=6&TPHA=7&HBATC=8&CRP=88&Micro_Albumin_Urine=9&Vitamin_B_12=10&BloodGroup_RH_DTYPE=11






?>