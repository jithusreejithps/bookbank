<?php
	include "BookBankerMenu.php";
	include "bookMongerdb.php";
	session_start();
	if(!isset($_SESSION['status']))
		header("location:exit.php");
?>
<?php
		$isbn=$_REQUEST['ISBN'];
		$objBook=new cDbase();
		$sql="select * from Books where ISBN like '".$isbn."'";
		$res=$objBook->sel($sql);
		$sql1="select * from bookcopies where ISBN like '".$isbn."'";
		$res1=$objBook->sel($sql1);
		if($res&&$res1)
		{
			$row=mysql_fetch_array($res);
			if(!$row)
			{
				print "Invalid Book Number";
				print "<br> Click <a href=ViewBookDetails.php>on this link go back</a> to go back";
			}
			else
			{
				print "<center>";
				print "<h1>Book Copy Details of ".$row[1]."</h1>";
				print "<table border=1>";
					print "<tr>";
						print "<th>Book Copy Number </th>";
						print "<th>Title</th>";
        				print "<th>Author </th>";
        				print "<th>Edition</th>";
        				print "<th>Status</th>";
        				print "<th>Remarks</th>";
     				print "</tr>";
				while ($row1=mysql_fetch_array($res1))	
				{
					print "<tr>";
						print "<th>".$row1[0]."</th>";
						print "<th>".$row[1]."</th>";
        				print "<th>".$row[2]."</th>";
        				print "<th>".$row[3]."</th>";
        				print "<th>".$row1[2]."</th>";
        				print "<th>".$row[3]."</th>";
     				print "</tr>";
				}
					
			}
		}
	print "</table>";
	print "<a href=bdownload.php?filepath=".$row[4].">Download Content</a></center>";		
	print "<br><br>";
	?>
<?php
	include "footer.php";
?>
