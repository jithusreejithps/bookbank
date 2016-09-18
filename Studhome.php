
<?php // Start the session
session_start();
?>
<?php 
	if(!isset($_SESSION['status']))
	{
		header("location:exit.php");
	}
	else
	{
	include "StudMenu.php";
	include "bookMongerdb.php";
	//$uname=$_GET['uname'];
	 $uname=$_SESSION["uname"];
	$objView=new cDbase();
	$sql="select * from student where RegNo like '".$uname."'";
	$res=$objView->sel($sql);
	mysql_query($sql) or die(mysql_error);
	$row=mysql_fetch_array($res);
		if(!$row)
		{
			print "Invalid Student Number";
		}
		else
		{
			print "<center>";
			print "<h1><label>Welcome... ".$row[1]."</h1></label>";
			print "</center>";
			$sem=$row[2];
			$sql1="select Cid from semcourse where SemId like '".$sem."'";
			$res1=$objView->sel($sql1);
			mysql_query($sql1) or die(mysql_error);
			$row1=mysql_fetch_row($res1);
?>
			<center>
			<table border="1">
			<tr>
			<th>	ISBN	</th>
   			<th>	Title	</th>
			<th>	Author	</th>
			<th>	Edition	</th>
		    <th>	Content	</th>
			<th>	No:Of Copies	</th>
		    <th></th>
			</tr>
<?php
			while($row1)
			{ 
				$cid=$row1[0];
				$sql2="select ISBN from bookassignment where Cid like '".$cid."'";
				$res2=$objView->sel($sql2);
				mysql_query($sql2) or die(mysql_error);
				$row2=mysql_fetch_array($res2);
				while($row2)
				{
					$ISBN=$row2[0];
					$sql3="select * from books where ISBN like  '".$ISBN."'";
					$res3=$objView->sel($sql3);
					mysql_query($sql3) or die(mysql_error);
					$row3=mysql_fetch_array($res3);
					print "<tr>";
					print "<td>$row3[0]</td>"; 
					print "<td>$row3[1]</td>"; 
					print "<td>$row3[2]</td>"; 
					print "<td>$row3[3]</td>";
					print "<td>$row3[4]</td>";
					print "<td>$row3[5]</td>";
					print "</tr>";
					$row2=mysql_fetch_row($res2);
				}
				$row1=mysql_fetch_row($res1);
			}	
		}	
	}	
?>

</table>
<br>
</form>
<?php include "footer.php"?>
