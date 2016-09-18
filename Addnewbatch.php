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
<h2>BATCH REGISTRATION</h2>
</center>
<table>

<tr>
	<td>	Batch Code 	</td>
    <td>    :	</td>
    <td>	<input type=text name="txtBatchNo" id="txtBatchNo" /></td>   
</tr>

<tr>
	<td> Department	</td>
    <td> :	</td>
    <td>	<select name="selDept" onChange="getProgram(this.value)">
			<?php
			$obj=new cDbase();			
            $res1=$obj->sel("select * from Department");
			$row1=mysql_fetch_row($res1);
			print "<option value=0 selected=true> ---Select Department--- </option>";
			while($row1)
			{
				print "<option value=$row1[0]> $row1[1] </option>";	
				$row1=mysql_fetch_row($res1);
			}
			?>
       		</select></td>
</tr>

<tr>
	<td> 	Program 	</td>
    <td>	:	</td>
    <td>	<select name=selPgm id=selPgm> </select> </td>
</tr>

<tr>
	<td> 	Semester 	</td>
    <td>	:	</td>
    <td>	<input type=text name=txtSem id=txtSem /> </td>
</tr>

<tr>
		<td>	Start date	</td>
        <td>	:	</td>
        <td>	<input type=date name=txtSDate id=txtSDate />	</td>
</tr>

<tr>
		<td>	End date	</td>
        <td>	:	</td>
        <td>	<input type=date name=txtEDate id=txtEDate />	</td>
</tr>

<tr>
	<td>		Batch Status	</td>
    <td>	:	</td>
    <td>	<input type=text name=txtBatchStatus id=txtStatus  />	</td>
</tr>

<tr>
	<td>		Semester Status	</td>
    <td>	:	</td>
    <td>	<input type=text name=txtSemStatus id=txtStatus  />	</td>
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
		header("location:Addnewbatch.php");
	}
	else if(isset($_REQUEST['btnSave']))
	{
		$objBatch=new cDbase();
		$batchNo=$_REQUEST['txtBatchNo'];
		$batchNo=str_replace("'","''",$batchNo);
		$pgmid=$_REQUEST['selPgm'];
		$sem=$_REQUEST['txtSem'];
		$sdate=$_REQUEST['txtSDate'];
		$edate=$_REQUEST['txtEDate'];	
		$bstatus=$_REQUEST['txtBatchStatus'];
		$bstatus=str_replace("'","''",$bstatus);	
		$sstatus=$_REQUEST['txtSemStatus'];	
		$sstatus=str_replace("'","''",$sstatus);
		$ress=$objBatch->sel("select * from Batch where BatchCode='$batchNo'");
		$rows=mysql_fetch_row($ress);
		$res2=$objBatch->sel("select * from Semester where SemId='$sem'");
		$row2=mysql_fetch_row($res2);
		if(!$rows)
		{
			$sql="insert into Batch values('".$batchNo."', '".$pgmid."', '".$sdate."', '".$edate."', '".$bstatus."')";
			$objBatch->idu($sql);
			$sql1="insert into Semester values('".$sem."','".$batchNo."', '".$sstatus."')";
			$objBatch->idu($sql1);
			print "Record Saved";
		}
		else if(!$row2)
		{
			$sql2="insert into Semester values('".$sem."','".$batchNo."', '".$sstatus."')";
			$objBatch->idu($sql2);
			print "Record Saved";
		}
		else
		{
			print "<h4>Batch Code and Semester already exists";
			print "<br>Click <a href=Addnewbatch.php>here</a> to try again</h4>";
		}
	}
}
	include "footer.php"
	
?>