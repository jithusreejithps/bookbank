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
	$batchNo=$_REQUEST['txtBatchNo'];
	$objBatch=new cDbase();
	$sql="select * from Batch where BatchCode like '".$batchNo."'";
	$res=$objBatch->sel($sql);
	$row=mysql_fetch_array($res);	
	
	$sql1="select * from Semester where BatchCode like '".$batchNo."'";
	$res1=$objBatch->sel($sql1);
	$row1=mysql_fetch_array($res1);
	
?>

<head>
	<script>
		function getProgram(str) 
		{
    		if (str == 0) 
			{
        		document.getElementById("selPgm").innerHTML = "";
        		return;
    		} 
			else 
			{ 
        		if (window.XMLHttpRequest) 
				{
            		// code for IE7+, Firefox, Chrome, Opera, Safari
            		xmlhttp = new XMLHttpRequest();
        		} 
				else 
				{
            		// code for IE6, IE5
            		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        		}
        		xmlhttp.onreadystatechange = function() 
				{
            		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
                		document.getElementById("selPgm").innerHTML = xmlhttp.responseText;
            		}
        		}
        		xmlhttp.open("GET","getProgram.php?q="+str,true);
        		xmlhttp.send();
    		}
		}
</script>
</head>
<body>
<form action="#" method="post">
<center>
<h2>Edit Batch Details</h2>
</center>
<table>

<tr>
	<td>	Batch Code 	</td>
    <td>    :	</td>
    <td>	<label><?php echo $row['BatchCode']; ?></label>		</td>
</tr>

<tr>

	<td> Department	</td>
    <td> :	</td>
    <td>	<select name="selDept" onChange="getProgram(this.value)">
			<?php
			$obj=new cDbase();			
            $ress=$obj->sel("select * from Department");
			$rows=mysql_fetch_row($ress);
			print "<option value=0 selected=true> ---Select Department--- </option>";
			while($rows)
			{
				print "<option value=$rows[0]> $rows[1] </option>";	
				$rows=mysql_fetch_row($ress);
			}
			?>
       		</select>		</td>
</tr>

<tr>
	<td> 	Program 	</td>
    <td>	:	</td>
    <td>	<select name=selPgm id=selPgm> </select> </td>	
</tr>

<tr>
	<td>Semester</td>
    <td> :	</td>
    <td>	<input type=text name="txtSem" id="txtSem" value="<?php echo $row1['SemId'];?>" />		</td>
</tr>

<tr>
	<td>Start Date</td>
    <td>	:	</td>
    <td>	<input type=date name="txtSDate" id="txtSDate" value="<?php echo $row['s_date'];?>" /> </td>
</tr>

<tr>
	<td>End Date</td>
    <td>	:		</td>
    <td>	<input type=date name="txtEDate" id="txtEDate" value="<?php echo $row['e_date'];?>" />	</td>
</tr>

<tr>
		<td>Batch Status</td>
        <td>	:	</td>
        <td>	<input type=text name="txtBStatus" id="txtBStatus" value="<?php echo $row['status'];?>" />	</td>
</tr>

<tr>
		<td>Semester Status</td>
        <td>	:	</td>
        <td>	<input type=text name="txtSStatus" id="txtSStatus" value="<?php echo $row1['status'];?>" />	</td>
</tr>

<tr>
<td>	</td>
<td></td>
    <td>	<input type=submit name="btnSave" id="btnSave" value="Save"  />	 &nbsp; &nbsp;&nbsp;
    		<input type=submit name="btnCancel" id="btnCancel" value="Cancel" />	</td>
</tr>

</table>
</form>
<?php 
	if(isset($_REQUEST['btnSave']))
	{
		$pgmid=$_REQUEST['selPgm'];
		$sem=$_REQUEST['txtSem'];
		$sdate=$_REQUEST['txtSDate'];
		$edate=$_REQUEST['txtEDate'];		
		$bstatus=$_REQUEST['txtBStatus'];
		$bstatus=str_replace("'","''",$bstatus);
		$sstatus=$_REQUEST['txtSStatus'];
		$sstatus=str_replace("'","''",$sstatus);
		$qry1="update Batch set pgmId='$pgmid',s_date='$sdate',e_date='$edate',status='$bstatus' where BatchCode='$batchNo'";
		$objBatch->idu($qry1);
		$qry2="update Semester set SemId='$sem',status='$sstatus' where BatchCode='$batchNo'";
		$objBatch->idu($qry2);		
		header("location:ViewBatchDetails.php");
	}
	if(isset($_REQUEST['btnCancel']))
	{
		header("location:ViewBatchDetails.php");
	}
}

include "footer.php"
?>