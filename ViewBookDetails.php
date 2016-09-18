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
		if($res)
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
			print "<h1><label>Details Of ".$row[1]."</h1></label>";
			print "<table>";
				print "<tr>";
					print "<td>Book Number</td>";
					print "<td>:</td>";
					print "<td>".$row[0]."</td>";
					print "<td></td>";
				print "</tr>";
			
				print "<tr>";
					print "<td>Book Name</td>";
					print "<td>:</td>";
					print "<td>".$row[1]."</td>";
					print "<td></td>";
				print "</tr>";
			
				print "<tr>";
					print "<td>Book Author</td>";
					print "<td>:</td>";
					print "<td>".$row[2]."</td>";
					print "<td></td>";
				print "</tr>";
			
				print "<tr>";
					print "<td>Book Edition</td>";
					print "<td>:</td>";
					print "<td>".$row[3]."</td>";
					print "<td></td>";
				print "</tr>";
			
				print "<tr>";
					print "<td>No. of Copies</td>";
					print "<td>:</td>";
					print "<td>".$row[5]."</td>";
					print "<td><a href=ViewCopies.php?ISBN=$row[0]>View Book Copies</a></td>";
				print "</tr>";
					
				print "<tr>";
					print "<td></td>";
					print "<td></td>";
					print "<td><a href=BookBankerHome.php>Back</a></td>";
				print "</tr>";
				print "</table>";
		}
	}
	print "<br><br>";
	include "footer.php";
?>
