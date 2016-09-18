<?php 	
	include "StudMenu.php"; 
	?>
<body>
<form action="#" method="post">
<center>
<h2>SEMESTERWISE SEARCH</h2>
<br>
<table>
<tr>
	<td>	Enter Semester 	</td>
    <td>    :	</td>
    <td>	<input type=text name="txtSemSrch" id="txtSemSrch" placeholder="Batch+SNumber" />	 &nbsp; &nbsp;&nbsp;	</td>
    <td>	<input type=submit name="btnSemSrch" id="btnSemSrch" value="Search"  />	 &nbsp; &nbsp;&nbsp;
    		<input type=submit name="btnCancel" id="btnCancel" value="Cancel" />	</td>
	</center>
</tr>
</table><br>
</form> 
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
	session_start();
	if(!isset($_SESSION['status']))
	{
		header("location:exit.php");
	}
	else
	{
	include "bookMongerdb.php"; 
 	$uname=$_SESSION['uname'];
	$objSemSrch=new cDbase();
	if(!isset($_POST['btnSemSrch']))
	{
	$sql="select * from student where RegNo like '".$uname."'";
	$res=$objSemSrch->sel($sql);
	mysql_query($sql) or die(mysql_error);
	$row=mysql_fetch_array($res);
	$sem=$row[2];
	//print "".$sem;
	$sql1="select Cid from semcourse where SemId like '".$sem."'";
	$res1=$objSemSrch->sel($sql1);
	mysql_query($sql1) or die(mysql_error);
	$row1=mysql_fetch_row($res1);
?>

<?php
		while($row1)
		{ 
			$cid=$row1[0];
			$sql2="select ISBN from bookassignment where Cid like '".$cid."'";
			$res2=$objSemSrch->sel($sql2);
			mysql_query($sql2) or die(mysql_error);
			$row2=mysql_fetch_array($res2);
			while($row2)
			{
				$ISBN=$row2[0];
				$sql3="select * from books where ISBN like  '".$ISBN."'";
				$res3=$objSemSrch->sel($sql3);
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
		else
		{
			$sem=$_POST['txtSemSrch'];
			//print "".$sem;
			$ress=$objSemSrch->sel("select * from Semester where SemId='$sem'");
			$rows=mysql_fetch_array($ress);
			if($rows)
			{
			$sql4="select Cid from semcourse where SemId like '".$sem."'";
			$res4=$objSemSrch->sel($sql4);
			mysql_query($sql4) or die(mysql_error);
			$row4=mysql_fetch_array($res4);
			//print "hai";
			while($row4)
			{
				//print "hai..";
				$cid=$row4[0];
				$sql5="select ISBN from bookassignment where Cid like '".$cid."'";
				$res5=$objSemSrch->sel($sql5);
				mysql_query($sql5) or die(mysql_error);
				$row5=mysql_fetch_array($res5);
				//print "hai";
				while($row5)
				{
					//print "hai";
					$ISBN=$row5[0];
					$sql6="select * from bookS where ISBN like '".$ISBN."'";
					$res6=$objSemSrch->sel($sql6);
					mysql_query($sql6) or die(mysql_error);
					$row6=mysql_fetch_array($res6);
					print "<tr>";
					print "<td>$row6[0]</td>"; 
					print "<td>$row6[1]</td>"; 
					print "<td>$row6[2]</td>"; 
					print "<td>$row6[3]</td>";
					print "<td>$row6[4]</td>";
					print "<td>$row6[5]</td>";
					print "</tr>";
					$row5=mysql_fetch_array($res5);
				}
				$row4=mysql_fetch_row($res4);
				//$batch=$row4[0];
			}
			/*$sql4="select SemId from semester where BatchCode like '".$sem."'";
			$res4=$objSemSrch->sel($sql4);
			mysql_query($sql4) or die(mysql_error);
			$row4=mysql_fetch_array($res4);*/
			//print "".$sem;
			}
			else
			{
				header("location:InvalidSem.php");
			}
			}
	}
?>

</table>
<?php include "footer.php"?>
