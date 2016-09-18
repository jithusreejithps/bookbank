<?php 
	include "BookBankerMenu.php";
	include "bookMongerdb.php";
	session_start();
	if(!isset($_SESSION['status']))
		header("location:exit.php");
	if(isset($_REQUEST['btnEdit']))
	{
		$txtVal=$_REQUEST['txtBookNo'];
	}
	else
	{
		$txtVal="";
	}
?>
<form action="editBooks.php" method="post">
<center>
<h1>UPDATE BOOK STATUS</h1>
<table>
<tr>

	<td>	Book Copy Number 	</td>
    <td>    :	</td>
    <td>	<input type=text name="txtBookNo" id="txtBookNo" value="<?php print $txtVal; ?>">	</td>
	<td> 	<input type="submit" name="btnEdit" id="btnEdit" value="Edit Status" />	</td>  
    <td>	<input type="submit" name="btnCancel" id="btnCancel" value="Cancel" />	</td>
</tr>
</table>
</center>
<br>
<br>


<?php
if(isset($_REQUEST['btnEdit']))
{
	$bno=$_REQUEST['txtBookNo'];
	$objBook=new cDbase();
	$sql="select * from bookcopies where BookNum like '".$bno."'";
	$res=$objBook->sel($sql);
	if($res)
	{
		$row=mysql_fetch_array($res);
		if(!$row)
		{
			print "Invalid Book Number";
			print "<br> Click <a href=editBooks.php>on this link </a> to go back";
		}
		else
		{
			$sql="select * from Books where ISBN like '".$row[1]."'";
			$res1=$objBook->sel($sql);
			if(!$res)
			{
				print "Invalid Book Number";
				print "<br> Click <a href=editBooks.php>on this link </a> to go back";
			}
			else
			{
				$row1=mysql_fetch_array($res1);
				print "<center>";
				print "<h1><label>Details Of Book Copy : ".$row1[1]."</h1></label><br>";
				print "<table>";
					print "<tr>";
						print "<td>ISBN of the book</td>";
						print "<td>:</td>";
						print "<td><input type=text name=txtIsbn id=txtIsbn value=".$row1[0]." disabled=true></td>";
						print "<input type=hidden name=htxtIsbn id=htxtIsbn value=".$row1[0].">";
					print "</tr>";
					print "<tr>";
						print "<td>Book Number of the book</td>";
						print "<td>:</td>";
						print "<td><input type=text name=txtBno id=txtBno value=".$row[0]." disabled=true></td>";
						print "<input type=hidden name=htxtBno id=htxtBno value=".$row[0].">";
					print "</tr>";
					print "<tr>";
						print "<td>Book Title</td>";
						print "<td>:</td>";
						print "<td><input type=text name=txttitle id=txttitle value=".$row1[1]." disabled=true></td>";
					print "</tr>";
					print "<tr>";
						print "<td>Author</td>";
						print "<td>:</td>";
						print" <td><input type=text name=txtAuth id=txtAuth value=".$row1[2]." disabled=true></td>";
					print "</tr>";
			
					print "<tr>";
						print "<td>Edition</td>";
						print "<td>:</td>";
						print "<td><input type=text name=txtEdition id=txtEdition value=".$row1[3]." disabled=true></td>";
					print "<tr>";
						print "<td>Availability</td>";
						print "<td>:</td>";
						print "<td><select name=selStatus>";
						if ($row[2]=="Available")
						{
							print "<option value=Available selected=selected >Available</option>";
							print "<option value=Damaged >Damaged</option>";
							print "<option value=Issued>Issued</option>";
							print "<option value=Other issues>Other</option>";
						}
						else if($row[2]=="Damaged")
						{
							print "<option value=Available  >Available</option>";
							print "<option value=Damaged selected=selected>Damaged</option>";
							print "<option value=Issued>Issued</option>";
							print "<option value=Other issues>Other</option>";
						}
						else if($row[2]=="Issued")
						{
							print "<option value=Available  >Available</option>";
							print "<option value=Damaged >Damaged</option>";
							print "<option value=Issued selected=selected>Issued</option>";
							print "<option value=Other issues>Other</option>";
						}
						else
						{
							print "<option value=Available  >Available</option>";
							print "<option value=Damaged >Damaged</option>";
							print "<option value=Issued >Issued</option>";
							print "<option value=Other selected=selected>Other Status</option>";
						}
						print "</select></td>";
					print "</tr>";
						print "<td>Remark</td>";
						print "<td>:</td>";
						print "<td><textarea rows=10 cols=20 id=txtRem name=txtRem value=>".$row[3]."</textarea></td>";
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
		}
}
if(isset($_REQUEST['btnCancel']))
{
	header("location:editBooks.php");
}
if(isset($_REQUEST['btnupdate']))
{
	$status=$_REQUEST['selStatus'];
	$remarks=$_REQUEST['txtRem'];
	$bno=$_REQUEST['htxtBno'];
	$isbn=$_REQUEST['htxtIsbn'];
	$upobj=new cDbase();
	$upsql="update BookCopies set Status = '".$status."', Remarks = '".$remarks."' where BookNum like '".$bno."' ";
	if ($upobj->idu($upsql))
		header("location:ViewBookDetails.php?ISBN=".$isbn);
	print "</form>";
}
?>
<br><br>
<?php include "footer.php"?>
