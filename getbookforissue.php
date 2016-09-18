<?php
	include "bookMongerdb.php";
	$sem = $_GET['q'];
	$obj=new cDbase();
	$res1=$obj->sel("select * from Student where SemId like '".$sem."'");	
	$sql="select * from books where ISBN  in (select ISBN from BookAssignment where cid in(select cid from semcourse where SemId like '".$sem."'))";
	$res =$obj->sel($sql); 
	while($row = mysql_fetch_array($res)) 
	{
		print "<th>$row[1]</th>";
	}
	print "<th>Issue Date</th>";
	print "<th>Return Date</th>";
	print "<th>Remarks</th>";
	print "<th></th>";
	print "</tr>";
	print "<tr>";
	$res =$obj->sel($sql);
	while($row = mysql_fetch_array($res)) 
	{
		print "<td>";
		print "<select name=".$row[0].">";
		$res2 =$obj->sel("select * from Bookcopies where ISBN like '".$row[0]."' and Status like 'Available'");
		print "<option value=0>--Select BookCopy--</option>";
		while($row2 = mysql_fetch_array($res2)) 
		{
			 print "<option value=".$row2[0].">".$row2[0]."</option>";
		}
		print "</select>";
		print "</td>";			
	}	
	print "<td><input type=date name=idate id=idate placeholder=Issue Date></a></td>";
	print "<td><input type=date name=rdate id=rdate placeholder=Issue Date></a></td>";
	print "<td> <textarea name=txtRem cols=10 rows=2  placeholder=Remarks of Issue></textarea> </td>";	 
	print "<td><input type=submit name=btnIssue id= btnIssue value=ISSUE></td>";
	print "</tr>";
?>
