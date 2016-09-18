<?php 	 
	include "BookBankerMenu.php";
	include "bookMongerdb.php";
	session_start();
	if(!isset($_SESSION['status']))
		header("location:exit.php");
	if(isset($_REQUEST['btnEdit'])||isset($_REQUEST['btnEdit']))
	{
		$txtVal=$_REQUEST['txtRegNo'];
	}
	else
	{
		$txtVal="";
	}
?>
<form action="EditStudent.php" method="post">
<center>
<h1>EDIT STUDENT DETAILS</h1>
<table>
<tr>

	<td>	Register Number 	</td>
    <td>    :	</td>
    <td>	<input type=text name="txtRegNo" id="txtRegNo" value="<?php print $txtVal; ?>">	</td>
	<td> 	<input type="submit" name="btnEdit" id="btnEdit" value="Edit Details" />	</td>  
    <td>	<input type="submit" name="btnCancel" id="btnCancel" value="Cancel" />	</td>
</tr>
</table>
</center>
<br>
<br>


<?php
if(isset($_REQUEST['btnEdit']))
{
	$reg=$_REQUEST['txtRegNo'];
	$objStudent=new cDbase();
	$sql="select * from Student where RegNo like '".$reg."'";
	$res=$objStudent->sel($sql);
	if($res)
	{
		$row=mysql_fetch_array($res);
		if(!$row)
			{
			print "Invalid Register Number";
			print "<br> Click <a href=EditStudent.php>on this link </a> to go back";
			}
		else
			{
			print "<center>";
			print "<h1><label>Details Of ".$row[1]."</h1></label>";
			print "<table>";
			print "<tr>";
			print "<td>Register Number</td>";
			print "<td>:</td>";
			print "<td><input type=text name=txtRegNo1 id=txtRegno1 value=".$row[0]." disabled=true></td>";
			print "</tr>";
			print "<tr>";
			print "<td>Name</td>";
			print "<td>:</td>";
			print "<td><input type=text name=txtname id=txtname value=".$row[1]."></td>";
			print "</tr>";
			$obj=new cDbase();
			$sql1="select * from Semester where SemId like'".$row[2]."'";
			$res1=$obj->sel($sql1);
			$row1=mysql_fetch_array($res1);
			$sql1="select * from Batch where BatchCode like '".$row1[1]."'";
			$res1=$obj->sel($sql1);
			$row2=mysql_fetch_array($res1);
			$sql1="select * from Program where PgmId like '".$row2[1]."'";
			$res1=$obj->sel($sql1);
			$row2=mysql_fetch_array($res1);
			$sql1="select * from Department where DeptId like '".$row2[2]."'";
			$res1=$obj->sel($sql1);
			$row3=mysql_fetch_array($res1);
			print "<tr>";
			print "<td>Department</td>";
			print "<td>:</td>";
			print" <td>".$row3[1]."</td>";
			print "</tr>";
			
			print "<tr>";
			print "<td>Program</td>";
			print "<td>:</td>";
			print "<td>".$row2[1]."</td>";
			print "</tr>";
			
			print "<tr>";
			print "<td>Batch</td>";
			print "<td>:</td>";
			print "<td>".$row1[1]."</td>";
			print "</tr>";
		
			print "<tr>";
			print "<td>Present Semester</td>";
			print "<td>:</td>";
			print "<td> <select name=selSem id=selSem > ";
			
			$q =$row1[1]; //intval($_GET['q']);
			$allsem=new cDbase(); 
			$semsql="select * from Semester where BatchCode='".$q."'";
			$semres =$obj->sel($semsql); 
			echo "<option value=0>---Select Batch---</option>";
			while($semrow = mysql_fetch_array($semres)) 
				{
				if($semrow[0]==$row[2])
						{
							echo "<option value=$semrow[0] selected=selected>$semrow[0]</option>";
						}
				else
					{
						echo "<option value=$semrow[0]>$semrow[0]</option>";
					}
				}
			print "</select> ";
			print "</td>";
			print "</tr>";
		
			print "<tr>";
			print "<td>Email</td>";
			print "<td>:</td>";
			print "<td><input type=text name=txtemail id=txtemail value=".$row[3]."></td>";					
			print "</tr>";
			
			print "<tr>";
			print "<td>Password</td>";
			print "<td>:</td>";
			print "<td><input type=text name=txtpsw id=txtpsw value=".$row[4]."></td>";					
			print "</tr>";
			
			print "<tr>";
			print "<td></td>";
			print "<td></td>";
			print "<td><input type=submit name=btnupdate id=btnupdate value=Update> &nbsp;&nbsp;&nbsp;<input type=submit name=btnCancel id=btnCancel value=Cancel></td>";
			print "</tr>";
		
			print "</table>";	
			print "</center>";
			
			}
		}
		else
		{
			print "Invalid Student Registet number<br>";
			print "Click <a href=ViewstudentDetails.php>on this link </a> to go back";
		}
}
if(isset($_REQUEST['btnCancel']))
{
	header("location:EditStudent.php");
}
if(isset($_REQUEST['btnupdate']))
{
	$reg=$_REQUEST['txtRegNo'];
	$name=$_REQUEST['txtname'];
	$mail=$_REQUEST['txtemail'];
	$sem=$_REQUEST['selSem'];
	$psw=$_REQUEST['txtpsw'];
	
	$upobj=new cDbase();
	$upsql="update Student set Name = '".$name."', SemId = '".$sem."', email = '".$mail."', password = '".$psw."' where RegNo like '".$reg."' ";
	$upobj->idu($upsql);
	header("location:ViewstudentDetails.php");
	print "</form>";
}
?>
<br><br>
<?php include "footer.php"?>