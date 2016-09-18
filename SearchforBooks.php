<?php
session_start();
if(!isset($_SESSION['status']))
	header("location:exit.php");
include "bookMongerdb.php";
include "BookBankerMenu.php";
?>
<br>
<br>
<form action="#" method="post">
<center>
<h1>SEARCH FOR BOOKS</h1>
<br><br>
<table>
<tr>
<td>Book Title</td>
<td>:</td>
<td><input type="text" name=txtSearch id=txtSearch placeholder="Title or part of the title"></td>
<td><input type="submit" name="btnSearch" id=btnSearch value="Search" /></td>
<td><input type="submit" name="btnCancel" id=btnCancel value="Cancel" /></td>
</tr>
</table>
<br>

<?php
if(isset($_REQUEST['btnSearch']))
{
	$title=$_REQUEST['txtSearch'];
	$obj=new cDbase();
	$books=$obj->sel("select * from Books where Title like '%".$title."%'");
	if($books)
	{
		
		$res=mysql_fetch_array($books);
		if($res)
		{
			print "<table border=1>";
			while($res)
			{
			
				print "<tr>";
				print "<td><a href=ViewBookDetails.php?ISBN=".$res[0].">".$res[0]."</a></td>";
				print "<td>".$res[1]."</td>";
				print "</tr>";
				$res=mysql_fetch_array($books);
			}
		print "</table>";
		}
		else 
	{
		print "No Books Found.... <br>Click on <a href=SearchforBooks.php>this like </a> to go back";
	}
	}
	else 
	{
		print "No Books Found.... <br>Click on <a href=SearchforBooks.php>this like </a> to go back";
	}
}
else if(isset($_REQUEST['btnCancel']))
{
	header("location:SearchforBooks.php");
}
?>
</center>
</form>
<br />
<br />

<?php
include "footer.php";
?>