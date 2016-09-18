<?php
include "bookMongerdb.php";
$q = $_GET['q']; //intval($_GET['q']);
$obj=new cDbase(); 
$sql="select * from books where ISBN  in (select ISBN from BookAssignment where cid in(select cid from semcourse where SemId like '".$q."'))";
$res =$obj->sel($sql); 
print"<tr><th>Book Number</th>";
print "<th>Title</th>";
print "<th>Author</th>";
print "<th>Edition</th>";
print "<th>Number of copies</th>";
print "<th></th>";
print "<th></th></tr>";
while($row = mysql_fetch_array($res)) 
	{
		echo "<tr>";
		echo "<td><a href=ViewBookDetails.php?ISBN=".$row[0].">".$row[0]."</a></td>";
		echo "<td>".$row[1]."</td>";
		echo "<td>".$row[2]."</td>";
		echo "<td>".$row[3]."</td>";
		echo "<td>".$row[5]."</td>";
		echo "<td><a href=ViewCopies.php?ISBN=".$row[0].">View Copies</a></td>";
		echo "<td><a href=bdownload.php?path=".$row[4].">Download Content</td>";
    	echo "</tr>";
	}
?>
