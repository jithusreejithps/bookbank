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
	$objBanker=new cDbase();
	$rno=$_REQUEST['txtRegNo'];
	$sql="select * from BookBanker where RegNo='$rno'";
	$res=$objBanker->sel($sql);
	$row=mysql_fetch_array($res);		
	if(isset($_REQUEST['btnSave']))
	{
		$fdate=$_REQUEST['txtFDate'];
		$tdate=$_REQUEST['txtTDate'];
		$qry="update BookBanker set from_date='$fdate',to_date='$tdate' where RegNo='$rno'";
		$objBanker->idu($qry);
		header("location:ViewBankerDetails.php");
	}
	if(isset($_REQUEST['btnCancel']))
	{
		header("location:ViewBankerDetails.php");
	}
}
?>
</head>
<body>
<form action="#" method="post">
<center>
<h2>Edit Banker Details</h2>
</center>
<table>

<tr>

	<td>	Banker Number 	</td>
    <td>    :	</td>
    <td>	<label><?php echo $row['RegNo']; ?></label>	</td>
</tr>

<tr>

	<td>	From Date	</td>
    <td>	:	</td>
    <td>	<input type=date name="txtFDate" id="txtTDate" value="<?php echo $row['from_date']; ?>"/>	</td>
</tr>

<tr>

	<td>   To Date  </td>
    <td> :	</td>
    <td>	<input type=date name="txtTDate" id="txtTDate" value="<?php echo $row['to_date']; ?>"/>		</td>
</tr>

<td>	</td>
<td></td>
    <td>	<input type=submit name="btnSave" id="btnSave" value="Save"  />	 &nbsp; &nbsp;&nbsp;
    		<input type=submit name="btnCancel" id="btnCancel" value="Cancel" />	</td>
</tr>

</table>
</form>
<?php include "footer.php"?>