<?php
    header( 'Content-Type: text/html; charset=utf-8' );
    $arr=array(); 
    include("library.php");
    $a=new library();	
    $m=$a->db;
	$q="select * from groups order by groupcode";
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
	echo '{"total":"'.$r->num_rows.'", "records":['. trim(json_encode($arr),"[]")."]}";
	//Run the web service by: http://localhost/mysql/2023-08-31(Project)/getgroups.php
    ?>