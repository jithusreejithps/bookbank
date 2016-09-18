<?php 
	session_start();
	
	include "bookMongerdb.php";
	include "FacultyMenu.php";
	if(!isset($_SESSION['status']))
	{
		header("location:exit.php");
	}
	else
	{
?>

<form action="#" method="post">
<center>
<h2>BOOK ASSIGN DETAILS</h2>
</center>
</form>
<center>
<table border="2">
<tr>
	<th>	Book Name	</th>
    <th>	Course	</th>
    <th>	No. of copies	</th>
    <th></th>   
</tr>

<?php
	$objAssign=new cDbase();			
    $res1=$objAssign->sel("select * from bookassignment");
	$row1=mysql_fetch_row($res1);
	while($row1)
	{
		print "<tr>";
		$res2=$objAssign->sel("select Title from Books where ISBN='$row1[0]'");
		$row2=mysql_fetch_row($res2);
		print "<td>$row2[0]</td>";	
		$res3=$objAssign->sel("select Name from Course where Cid='$row1[1]'");
		$row3=mysql_fetch_row($res3);	
		print "<td>$row3[0]</td>";
		print "<td>$row1[2]</td>";
		print "<td><a href=EditBkAssign.php?txtBookNo=$row1[0]>Edit</a></td>";
		print "<td><a href=DeleteBkAssign.php?txtBookNo=$row1[0]>Delete</a></td>";
		print "</tr>";
		$row1=mysql_fetch_row($res1);
	}
}
?>
</table>
</form>
<?php include "footer.php"?>
