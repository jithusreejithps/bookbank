<?php 
	session_start();
	ob_start();
	if(!isset($_SESSION['status']))
	{
		header("location:exit.php");
	} 
	else
	{
	
	include "bookMongerdb.php";
	include "FacultyMenu.php";
?>

</head>
<body>
<form action="#" method="post" enctype="multipart/form-data">
<center>
<h2>BOOK REGISTRATION</h2>
</center>
<table>

<tr>
	<td>	Book Number 	</td>
    <td>    :	</td>
    <td>	<input type=text name="txtBookNo" id="txtBookNo" />		</td>   
</tr>

<tr>
	<td>	Book Name	</td>
    <td>	:	</td>
    <td>	<input type=text name="txtBName" id="txtBName" />	</td>
</tr>

<tr>
	<td>Author</td>
    <td> :	</td>
    <td>	<input type=text name="txtAuthor" id="txtAuthor" />		</td>	
</tr>

<tr>
	<td>Edition</td>
    <td>	:	</td>
    <td>	<input type=text name="txtEdition" id="txtEdition" /> </td>
</tr>

<tr>
	<td>Price</td>
    <td>	:		</td>
    <td>	<input type=text name="txtPrice" id="txtPrice" />	</td>
</tr>

<tr>
	<td>No. of copies </td>
    <td>	:	</td>
    <td>	<input type=text name="txtCopies" id="txtCopies" /> </td>
</tr>

<tr>
		<td>Date of purchase </td>
        <td>	:	</td>
        <td>	<input type=date name="txtDop" id="txtDop" />	</td>
</tr>

<tr>
	<td>Content</td>
    <td>	:	</td>
    <td>	<input type=file name="fileContent" id="fileContent"  />	</td>
</tr>

<tr>
	<td>	</td>
    <td></td>
    <td>	<input type=submit name="btnSave" id="btnSave" value="Save"  />	 &nbsp; &nbsp;&nbsp;
    		<input type=submit name="btnCancel" id="btnCancel" value="Cancel" />	</td>
</tr>

</table>
</form>
</body>

<?php

	if(isset($_REQUEST['btnCancel']))
	{
		header("location:Addnewbook.php");
	}
	else if(isset($_REQUEST['btnSave']))
	{
		$objBook=new cDbase();
		$bookNo=$_REQUEST['txtBookNo'];
		$bookNo=str_replace("'","''",$bookNo);
		$ress=$objBook->sel("select * from Books where ISBN='$bookNo'");
		$rows=mysql_fetch_row($ress);
		if(!$rows)
		{
			$bname=$_REQUEST['txtBName'];
			$bname=str_replace("'","''",$bname);
			$author=$_REQUEST['txtAuthor'];
			$author=str_replace("'","''",$author);
			$edition=$_REQUEST['txtEdition'];
			$price=$_REQUEST['txtPrice'];
			$copies=$_REQUEST['txtCopies'];	
			$dop=$_REQUEST['txtDop'];	
			$content=$_FILES['fileContent'];
			$ext = pathinfo($_FILES["fileContent"]["name"], PATHINFO_EXTENSION);
			$filepath="FileContent/".microtime().".".$ext ;
			move_uploaded_file($content['tmp_name'],$filepath);
			$qry=$objBook->sel("select * from Books where ISBN='$bookNo'");
			$row=mysql_fetch_row($qry);
			if($row)
			{
				$n=$row[5];
				$x=$n+$copies;
				$objBook->idu("update Books set NoOfCopies=$x where ISBN='$bookNo'");
				$objBook->idu("insert into BookTxn values('".$bookNo."', '".$dop."',".$copies.",".$price.")");
				for($i=$n+1;$i<=$x;$i++)
				{
					$bno="".$bookNo.$i;
					$objBook->idu("insert into BookCopies values('".$bno."','".$bookNo."','usable','newbook')");
				}
				print "Record Saved";
			}
			else
			{
				if(empty($_FILES['fileContent']['name']))
				{
					$n=$row[5];
					$x=$n+$copies;
					$sql="insert into Books values('".$bookNo."', '".$bname."', '".$author."', '".$edition."', ' ',".$copies.")";
					$objBook->idu($sql);
					$objBook->idu("insert into BookTxn values('".$bookNo."', '".$dop."',".$copies.",".$price.")");
					for($i=$n+1;$i<=$x;$i++)
					{
						$bno="".$bookNo.$i;
						$objBook->idu("insert into BookCopies values('".$bno."','".$bookNo."','usable','newbook')");
					}
					print "Record Saved";
				}
				else
				{
					$n=$row[5];
					$x=$n+$copies;
					$sql="insert into Books values('".$bookNo."', '".$bname."', '".$author."', '".$edition."', '".$filepath."',".$copies.")";
					$objBook->idu($sql);
					$objBook->idu("insert into BookTxn values('".$bookNo."', '".$dop."',".$copies.",".$price.")");
					for($i=$n+1;$i<=$x;$i++)
					{
						$bno="".$bookNo.$i;
						$objBook->idu("insert into BookCopies values('".$bno."','".$bookNo."','usable','newbook')");
					}
					print "Record Saved";
				}
			}
		}
		else
		{
			print "<h4>Book Number already exists";
			print "<br>Click <a href=Addnewbook.php>here</a> to try again</h4>";
		}			
	}
}
	include "footer.php"

?>
