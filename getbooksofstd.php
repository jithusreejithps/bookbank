<?php
	include "bookMongerdb.php";
	$std = $_GET['q'];
	$obj=new cDbase();
	//$res1=$obj->sel("select * from Student where SemId like '".$sem."'");	
	$sql="select BookBanking.BookNum from BookBanking,BookCopies where Bookbanking.BookNum=BookCopies.BookNum and BookCopies.Status like 'Issued' and BookBanking.RegNo like '".$std."'";
	//$sql="select Bookbanking.RegNo,BookBanking.BookNum from BookBanking,BookCopies where Bookbanking.BookNum=BookCopies.BookNum and bookcopies.Status like 'Issued'";
	$res =$obj->sel($sql); 
	while($row = mysql_fetch_array($res)) 
	{
		//if()
		print "<tr>";
		$res1=$obj->sel("select * from Books where ISBN like (select ISBN from Bookcopies where BookNum like '".$row[0]."')");
		while($row1 = mysql_fetch_array($res1)) 
		{
		print "<th>$row1[1]</th>";
		}
		print "<th>$row[0]</th>";
		print "<th><a href=returnbook.php?bno=$row[0]&std=$std>Return</a></th>";
		print "</tr>";
	}
	
?>
