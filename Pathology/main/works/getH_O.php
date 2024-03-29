<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    $a=new library();	
    $m=$a->db;
	$q="select * from h_o order by id";
	$r=$m->query($q);
	if(!$r)
	{
	echo "{success:".mysqli_errno($m).", Query: $q}";	
	return;
	}
	while($c=$r->fetch_object())
	{
		$arr[]=$c;
	}
	// $r1=$m->query($q);
	// $results=$r1->num_rows;
	echo '{"total":"'.$r->num_rows.'", "records":['. trim(json_encode($arr),"[]")."]}";

	//Run the web service by: http://localhost/JQUERY/MY%20Project%20[%20JQUERY%20CODE%20]/Pathology/main/works/getH_O.php

    ?>