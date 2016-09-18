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
	$bno=$_REQUEST['txtBookNo'];
	$objBook=new cDbase();
	$sql="select * from Books where ISBN like '".$bno."'";
	$res=$objBook->sel($sql);
	$row=mysql_fetch_array($res);	
	
	$sql1="select * from BookTxn where ISBN like '".$bno."'";
	$res1=$objBook->sel($sql1);
	$row1=mysql_fetch_array($res1);		
	
	if(isset($_REQUEST['btnSave']))
	{
		$bname=$_REQUEST['txtBName'];
		$bname=str_replace("'","''",$bname);
		$author=$_REQUEST['txtAuthor'];
		$author=str_replace("'","''",$author);
		$edition=$_REQUEST['txtEdition'];
		$price=$_REQUEST['txtPrice'];
		$dop=$_REQUEST['txtDop'];
		if($_FILES['fileContent']['name']!='')
		{		
			$content=$_FILES['fileContent'];
			$ext = pathinfo($_FILES["fileContent"]["name"], PATHINFO_EXTENSION);
			$filepath="./FileContent/".microtime().".".$ext ;
			move_uploaded_file($content['tmp_name'],$filepath);
			$qry1="update Books set Title='$bname',Author='$author',Edition='$edition',Content='$filepath' where ISBN='$bno'";
			$objBook->idu($qry1);
		}
		else
		{
			$qry1="update Books set Title='$bname',Author='$author',Edition='$edition' where ISBN='$bno'";
			$objBook->idu($qry1);
		}
			$qry2="update BookTxn set dop='$dop',Price=$price where ISBN='$bno'";
			$objBook->idu($qry2);		
			header("location:ViewFBookDetails.php");
	}
	else if(isset($_REQUEST['btnCancel']))
	{
		header("location:ViewFBookDetails.php");
	}
}
?>
</head>
<body>
<form action="#" method="post" enctype="multipart/form-data">
<center>
<h2>Edit Book Details</h2>
</center>
<table>

<tr>
	<td>	Book Number 	</td>
    <td>    :	</td>
    <td>	<label><?php echo $row['ISBN']; ?></label>		</td>    
</tr>

<tr>
	<td>	Book Name	</td>
    <td>	:	</td>
    <td>	<input type=text name="txtBName" id="txtBName" value="<?php echo $row['Title']; ?>" />	</td>
</tr>

<tr>
	<td>Author</td>
    <td> :	</td>
    <td>	<input type=text name="txtAuthor" id="txtAuthor" value=<?php echo $row['Author']; ?> />		</td>
</tr>

<tr>
	<td>Edition</td>
    <td>	:	</td>
    <td>	<input type=text name="txtEdition" id="txtEdition" value=<?php echo $row['Edition']; ?> /> </td>
</tr>

<tr>
	<td>Price</td>
    <td>	:		</td>
    <td>	<input type=text name="txtPrice" id="txtPrice" value=<?php echo $row1['Price']; ?> />	</td>
</tr>

<tr>
		<td>Date of purchase </td>
        <td>	:	</td>
        <td>	<input type=date name="txtDop" id="txtDop" value=<?php echo $row1['dop']; ?> />	</td>
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
<?php include "footer.php"?>