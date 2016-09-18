<?php
session_start();
include "BookBankerMenu.php";
include "bookMongerdb.php";
if(!isset($_SESSION['status']))
	header("location:exit.php");
$obj=new cDbase();
?>

<html>
	<body>
	<h1><center> FINE </center> </h1>
	<form method="post" action="#" enctype="multipart/form-data">
	<center>
	<table border=1>
	<tr>
		<td><b>Register Number</b></td>
		<td><b>Semester Id</b></td>
		<td><b>Amount</b></td>
		<td><b>Date</b></td>
        <td><b>Details </b></td>
	
	</tr>
	<tr>
		<td><input type=text name=txtRegNo id=txtRegNo></td>
        <td> <select name="selSem" id="selSem">
			<?php
			
			$res=$obj->sel("select * from Semester");
			$row=mysql_fetch_row($res) or die(mysql_error());
			while($row)
				{
				print "<option value=$row[0]> $row[0] </option>";
				$row=mysql_fetch_row($res);
				}
			?>
		</select>
		</td>
        
		<td><input type="number" name=txtAmt id=txtAmt></td>
		<td><input type="date" name=txtDate id=txtDate></td>
        <td> <select name="selRem">
        		<option value="Book Lost"> Book Lost</option>
                <option value="Book Damaged"> Book Damaged</option>
                <option value="Late returning"> Late Returning</option>
        		</select> </td>
		

	</tr>
</table>
<br>
<input type="submit" name="btnFine" id="btnFine" value="Add fine">
</center>
</form>

<?php
if(isset($_REQUEST['btnFine']))
{
$Reg=$_REQUEST['txtRegNo'];
$sem=$_REQUEST['selSem'];
$amt=$_REQUEST['txtAmt'];
$dat=$_REQUEST['txtDate'];
$rem=$_REQUEST['selRem'];

$res=$obj->sel("select * from student where RegNo like '$Reg' and SemId like '$sem'");
$row=mysql_fetch_array($res);
if($row[0]==null)
	print "Invalid Student Id";
else
{
	$obj->idu("insert into fine values('$Reg','$sem',$amt,'$dat','$rem')");
}

}

?>

<br><br><br>
<center>
<table border=1>
<tr>
	<tr>
		<td><b>Register Number</b></td>
		<td><b>Semester Id</b></td>
		<td><b>Amount</b></td>
		<td><b>Date</b></td>
        <td><b>Details </b></td>
	
	</tr>
</tr>
	<?php
	$res=$obj->sel("select * from fine");
	$row=mysql_fetch_row($res);
	while($row)
	{
		print "<tr>";
		for($i=0;$i<count($row);$i++)
			{
			print "<td>$row[$i]</td>";
			}
		$row=mysql_fetch_row($res);
	}
	?>
</table>
</center>
<br><br><br>

<?php
include "footer.php";
?>


