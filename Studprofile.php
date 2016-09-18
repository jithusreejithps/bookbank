
<?php
// Start the session
session_start();
?>


<?php
if(!isset($_SESSION['status']))
	{
		header("location:exit.php");
	}
	else
	{
 include "bookMongerdb.php";
  include "StudMenu.php";
  print "<h1>My Profile</h1>";
 $rno=$_SESSION["uname"];
 $objProfile=new cDbase();
 $sql="select * from student where RegNo like '".$rno."'";
 $res=$objProfile->sel($sql);
 mysql_query($sql) or die(mysql_error);
 $row=mysql_fetch_array($res);
 $sem=$row[2];
//print "$sem  ";
 while($row)
 {
 					print "<tr>";
					print "<td><h3>RegNo :"."$row[0]</h3></td>"; 
					print "</tr>";
					print "<tr>";
					print "<td><h3>Name :"."$row[1]</h3></td>";  
					print "</tr>";
					print "<tr>";
					print "<td><h3>Semester :"."$row[2]</h3></td>"; 
					print "</tr>";
					print "<tr>";
					print "<td><h3>Email :"."$row[3]<br></td>"; 
					$row=mysql_fetch_row($res);
}
 $sql1="select BatchCode from semester where SemId like '".$sem."'";
 //print "$row[2]";
 $res1=$objProfile->sel($sql1);
 mysql_query($sql1) or die(mysql_error);
 $row1=mysql_fetch_array($res1);
 print "<tr>";
 print "<td><h3>Batch :"."$row1[0]</h3></td>";
 print "</tr>";
$sql2="select pgmId from Batch where BatchCode like '".$row1[0]."'";
 //print "$row[2]";
 $res2=$objProfile->sel($sql2);
 mysql_query($sql2) or die(mysql_error);
 $row2=mysql_fetch_array($res2);
 
 $sql3="select Name,DeptId from program where pgmId like '".$row2[0]."'";
 //print "$row[2]";
 $res3=$objProfile->sel($sql3);
 mysql_query($sql3) or die(mysql_error);
 $row3=mysql_fetch_array($res3);
 print "<tr>";
 print "<td><h3>Program :"."$row3[0]</h3></td>"; 
 print "</tr>";
 
  $sql4="select Name from Department where DeptId like '".$row3[1]."'";
 //print "$row[2]";
 $res4=$objProfile->sel($sql4);
 mysql_query($sql4) or die(mysql_error);
 $row4=mysql_fetch_array($res4);
 print "<tr>";
 print "<td><h3>Department :"."$row4[0]</h3></td>";
 print "</tr>"; 
?>



<?php
}
?>

<?php include "footer.php"?>