

 <?php
// Start the session
session_start();
if(!isset($_SESSION['status']))
	{
		header("location:exit.php");
	}
	else
	{
 include "bookMongerdb.php";
 include "StudMenu.php";
 print "<h1>View Uploaded Books</h1>";
 $rno=$_SESSION["uname"];
 $objUpload=new cDbase();
 $sql="select SemId from student where RegNo like '".$rno."'";
 $res=$objUpload->sel($sql);
 mysql_query($sql) or die(mysql_error);
 $row=mysql_fetch_array($res);
 $sql1="select Cid from semcourse where SemId like '".$row[0]."'";
 $res1=$objUpload->sel($sql1);
 mysql_query($sql1) or die(mysql_error);
 $row1=mysql_fetch_row($res1);
 //$sem=$row[2];
 
?>
 <center>			
			<table border="1">
			<tr>
			<th>	Book Name	</th>
   			<th>	Ebook	</th>
		    <th></th>
			</tr>
<?php
			while($row1)
			{ 
				$cid=$row1[0];
				$sql2="select ISBN from bookassignment where Cid like '".$cid."'";
				$res2=$objUpload->sel($sql2);
				mysql_query($sql2) or die(mysql_error);
				$row2=mysql_fetch_array($res2);
				while($row2)
				{
					$ISBN=$row2[0];
					$sql3="select * from books where ISBN like  '".$ISBN."'";
					$res3=$objUpload->sel($sql3);
					mysql_query($sql3) or die(mysql_error);
					$row3=mysql_fetch_array($res3);
					print "<tr>";
					print "<td>$row3[1]</td>";
					$filepath=$row3[4];
					if(!$filepath)
					{
						print "No Ebook Available";
					}
					else
					{
					$filepath=str_replace(" ","%20",$filepath);
					print "<td><a href=StudBookDownload.php?filepath=". $filepath  .">Download</a></td>"; 
					print "</tr>";
					}
					$row2=mysql_fetch_row($res2);
				}
				$row1=mysql_fetch_row($res1);
			}	
	}
?>
</table>
<?php include "footer.php"?>
