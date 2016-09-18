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

<form action="ViewBook.php" method="post">
<center>
<h2>BOOK DETAILS</h2>
<table>
<tr>
	<td>	Book Number 	</td>
    <td>    :	</td>
    <td>	<input type=text name="txtBookNo" id="txtBookNo" />		</td>
	<td> 	<input type=submit name="btnView" id="btnView" value="View Details" /> 		</td>  
    <td>	<input type=submit name="btnCancel" id="btnCancel" value="Cancel" />	</td>
</tr>
</table>
<br>
</center>
</form>
<center>
<table border="2">
<tr>
	<th>	Book Number	</th>
    <th>	Book Name	</th>
    <th>	Author	</th>
	<th>	Edition	</th>
	<th>	Copies	</th>
    <th></th>   
</tr>

<?php

	$objView=new cDbase();			
    $res1=$objView->sel("select * from Books");
	$row1=mysql_fetch_row($res1);
	while($row1)
	{
		print "<tr>";
		print "<td><a href=ViewBook.php?txtBookNo=$row1[0]> $row1[0]</a></td>";		
		print "<td>$row1[1]</td>";
		print "<td>$row1[2]</td>";
		print "<td>$row1[3]</td>";
		print "<td>$row1[5]</td>";
		print "<td><a href=EditBook.php?txtBookNo=$row1[0]>Edit</a></td>";
		print "<td><a href=DeleteBook.php?txtBookNo=$row1[0]>Delete</a></td>";
		print "</tr>";
		$row1=mysql_fetch_row($res1);
	}
	}
?>
</table>
</form>
<?php include "footer.php"?>
