<?php

    header( 'Content-Type: text/html; charset=utf-8' );

    $arr=array(); 

    include("library.php");

    $a=new library();	

    $m=$a->db;

	//$q="select distinct groupname,details from groups a inner join tests a on a.groupcode=b.groupcode where a.groupcode=(select groupcode from tests where Code='{$_GET['Code']}') order by groupcode";
	$q="select distinct groupname,details from groups a inner join tests b on a.groupcode=b.groupcode where b.Code='{$_GET['Code']}'";
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

	//Run the web service by: http://localhost/PHP%20PRACTISE/PROJECT%20[%20Diagnostic%20Management%20System%20]/getgroups.php

?>