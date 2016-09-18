<?php
session_start();
include "BookBankerMenu.php";
include "bookMongerdb.php";
if(!isset($_SESSION['status']))
	header("location:exit.php");
print "<form action=createpdf.php method=post>";
if(isset($_REQUEST['btnView']))
 	{
		$sem = $_REQUEST['selSem'];
		$obj=new cDbase();
		$semdetails=$obj->sel("select * from semester where SemId like '$sem'");
		$detailsem=mysql_fetch_array($semdetails);			// batch details also
		
		$batch=$obj->sel("select * from batch where BatchCode like '$detailsem[1]'");	//Programid
		$detailBatch=mysql_fetch_array($batch);
		$pgm=$obj->sel("select * from program where PgmId like '$detailBatch[1]'");
		$pgmname=mysql_fetch_array($pgm);		// pgm name
		
		$dept=$obj->sel("select * from department where DeptId like '$pgmname[2]'");		//dept id
		$deptname=mysql_fetch_array($dept);
		
		$issuec=$obj->sel("select count(SemId) from bookbanking where SemId like '$sem'");
		$isc=mysql_fetch_array($issuec);
		
		$lost=$obj->sel("select count(SemId) from fine where Details like 'Book Lost'");
		$lostc=mysql_fetch_array($lost);
		
		$damaged=$obj->sel("select count(SemId) from fine where Details like 'Book Damaged'");
		$damagec=mysql_fetch_array($damaged);
		
		$late=$obj->sel("select count(SemId) from fine where Details like 'Late Returning'");
		$latec=mysql_fetch_array($late);
		
		$ttlamt=$obj->sel("select sum(Amount) from fine where SemId like '$sem'");
		$ttlamtc=mysql_fetch_array($ttlamt);
		
		print "<h1>SEMESTER REPORT FOR THE SEMESTER <br><br>- $sem -</h1>";
		
		$content="Book bank report for the semester ".$sem." of Batch ".$detailsem[1]." , ".$pgmname[1]." of the department of ".$deptname[1]." Rajagiri College. The Details as follows:";
		
		print "<br><p>$content</p>";
		
		print "<br><br><center>";
		print "<table border=1>";
		
		print "<tr>";
			print "<td>Semester </td><td>:</td>";
			print "<td><input type=text name=txtSem id=txtSem value=".$sem."></td>";
		print "</tr>";
				
		print "<tr>";
			print "<td>Total Number of Books Issued </td><td>:</td>";
			print "<td><input type=text name=txtIC id=txtIC value=".$isc[0]."></td>";
		print "</tr>";
		$rtc=$isc[0] - $lostc[0];
		
		print "<tr>";
		print "<td>Total Number of Books Returned </td><td>:</td> ";
		print "<td><input type=text name=txtRC id=txtRC value=".$rtc."></td>";
		print "</tr>";
		
		print "<tr>";
		print "<td>Number of Books Lost </td><td>:</td> ";
		print "<td><input type=text name=txtLC id=txtLC value=".$lostc[0]."></td>";
		print "</tr>";
		
		print "<tr>";
		print "<td> Total amount received as fine </td><td>:</td> ";
		print "<td><input type=text name=txtLA id=txtLA value=".$ttlamtc[0]."></td>";
		print "</tr>";
		
		print "<tr>";
		print "<td> Report Generated on </td><td>:</td> ";
		print "<td><input type=date name=txtd id=txtd></td>";
		print "</tr>";
		print "</table>";
		
		print "<br><br>";
		print "<textarea cols=80 rows=8 name=txtRem id=txtRem >Remarks</textarea>";
		print "<br><br><br>";
		print "<br><input type=submit name=btngen id=btngen value=Generate>";
		print "</center>";
	}	
	print "</form>";
	print "<br><br>";
	include "footer.php";
?>
