<?php 	
		session_start();
	if(!isset($_SESSION['status']))
	{
		header("location:exit.php");
	} 
	else
	{
		
		include "bookMongerdb.php";
		include "FacultyMenu1.php";
?>
 <form> 
<?php
	
	if(isset($_REQUEST['btnCancel']))
	{
		header("location:ViewFBookDetails.php");
	}
	else if(isset($_REQUEST['txtBookNo']))
	{
		$bno=$_REQUEST['txtBookNo'];
		$objBook=new cDbase();
		$sql="select * from Books where ISBN like '".$bno."'";
		echo $sql; 
		$res=$objBook->sel($sql);
		$row=mysql_fetch_array($res);
		if(!$row)
		{
			print "Invalid Book Number";
			print "<br> Click <a href=ViewFBookDetails.php>here</a> to go back";
		}
		else
		{
			$filepath=$row[4];
			print "<center>";
			print "<h1><label>Details Of ".$row[1]."</h1></label>";
			print "</center>";
			print "<table>";
			
			print "<tr>";
			print "<td>Book Number</td>";
			print "<td>:</td>";
			print "<td>".$row[0]."</td>";
			print "</tr>";
			
			print "<tr>";
			print "<td>Book Name</td>";
			print "<td>:</td>";
			print "<td>".$row[1]."</td>";
			print "</tr>";
			
			print "<tr>";
			print "<td>Book Author</td>";
			print "<td>:</td>";
			print "<td>".$row[2]."</td>";
			print "</tr>";
			
			print "<tr>";
			print "<td>Book Edition</td>";
			print "<td>:</td>";
			print "<td>".$row[3]."</td>";
			print "</tr>";
			
			print "<tr>";
			print "<td>No. of Copies</td>";
			print "<td>:</td>";
			print "<td>".$row[5]."</td>";
			print "</tr>";
			
			$obj=new cDbase();
			$sql1="select * from BookTxn where ISBN like'".$row[0]."'";
			$res1=$obj->sel($sql1);
			$row1=mysql_fetch_array($res1);
			
			print "<tr>";
			print "<td>Date of purchase</td>";
			print "<td>:</td>";
			print "<td>".$row1[1]."</td>";
			print "</tr>";
			
			print "<tr>";
			print "<td>Price</td>";
			print "<td>:</td>";
			print "<td>".$row1[3]."</td>";
			print "</tr>";
			
			print "<tr>";
			print "<td>Content</td>";
			print "<td>:</td>";
			$filepath=str_replace(" ","%20",$filepath);
			if($filepath!="%20")
			print "<td><a href=Download.php?filepath=". $filepath  .">Download</a></td>";
			print "</tr>";
			
			print "<tr>";
			print "<td></td>";
			print "<td><a href=ViewFBookDetails.php>Back</a></td>";
			print "</tr>";
			print "</table>";		
		}
	}
}

?>
 </form> 
<?php include "footer.php"?>