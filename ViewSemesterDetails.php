<?php 
	session_start();
	if(!isset($_SESSION['status']))
	{
		header("location:exit.php");
	} 	
	else
	{	
	
	include "bookMongerdb.php";
	include "FacultyMenu.php";
?>

<form action="#" method="post">
<center>
<h2>SEMESTER DETAILS</h2>
<table border="2">
<tr>

	<th>	Semester Id	</th>
	<th>	Batch Code	</th>
    <th>	Status	</th>
    <th></th>   

</tr>

<?php
	$objView=new cDbase();			
    $res1=$objView->sel("select * from Semester");
	$row1=mysql_fetch_row($res1);
	while($row1)
	{
		print "<tr>";
		print "<td>$row1[0]</td>";	
		print "<td>$row1[1]</td>";
		print "<td>$row1[2]</td>";
		print "</tr>";
		$row1=mysql_fetch_row($res1);
	}
}
?>
</table>
</center>
</form>
<?php include "footer.php"?>
