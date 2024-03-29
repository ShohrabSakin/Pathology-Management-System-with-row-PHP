<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    include("library.php");
    $val=0;
    $a=new library();	
    $m=$a->db;
	$q="select max(cast(substring(vrno,4,5) as int)) as maxvr from purchestotal";
	//echo $q;
	$r=$m->query($q);
	if(!$r)
	{
	echo "{success:".mysqli_errno($m).", Query: $q}";	
	return;
	}
	while($c=$r->fetch_array(MYSQLI_NUM))
	{
		$val=$c[0];
	}
    $val++;
    $val= str_pad($val, 5, "0", STR_PAD_LEFT);
	echo '{"maxvr":"'. $val.'"}';
	?>