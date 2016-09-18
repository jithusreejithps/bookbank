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
	$obj=new cDbase();
	$cid=$_REQUEST['cid'];
	$sql="select * from SemCourse where Cid='$cid'";
	$res=$obj->sel($sql);
	$row=mysql_fetch_array($res);	
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
		function getBatch(str) 
		{
    		if (str == 0) 
			{
        		document.getElementById("selBatch").innerHTML = "";
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
                		document.getElementById("selBatch").innerHTML = xmlhttp.responseText;
            		}
        		}
        		xmlhttp.open("GET","getBatch.php?q="+str,true);
        		xmlhttp.send();
    		}
		}
		function getSem(str) 
		{
    		if (str == 0) 
			{
        		document.getElementById("selSem").innerHTML = "";
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
                		document.getElementById("selSem").innerHTML = xmlhttp.responseText;
            		}
        		}
        		xmlhttp.open("GET","getSem.php?q="+str,true);
        		xmlhttp.send();
    		}
		}
	</script>
</head>
	
<body>
<?php

	if(isset($_REQUEST['btnSave']))
	{
		$semid=$_REQUEST['selSem'];
		$qry="update SemCourse set SemId='$semid' where Cid='$cid'";
		$obj->idu($qry);
		header("location:ViewSemCourseDetails.php");
	}
	else if(isset($_REQUEST['btnCancel']))
	{
		header("location:ViewSemCourseDetails.php");
	}
	
?>	
<form action="#" method="post">
<center>
<h2>Edit Semester Course Details</h2>
</center>
<table>

<tr>

	<td>	Course Id 	</td>
    <td>    :	</td>
    <td>	<label><?php echo $row['Cid']; ?></label>	</td>
</tr>

<tr>
	<td> Department	</td>
    <td> :	</td>
    <td>	<select name="selDept" onChange="getProgram(this.value)">
			<?php			
            $res1=$obj->sel("select * from Department");
			$row1=mysql_fetch_row($res1);
			print "<option value=0 selected=true> ---Select Department--- </option>";
			while($row1)
				{
				print "<option value=$row1[0]> $row1[1] </option>";	
				$row1=mysql_fetch_row($res1);
				}
			}
			?>
       		</select>		</td>
</tr>

<tr>
	<td> 	Program 	</td>
    <td>	:	</td>
    <td>	<select name=selPgm id=selPgm onChange="getBatch(this.value)"> </select> </td>
</tr>

<tr>
	<td> 	Batch		</td>
    <td>	:		</td>
    <td>	<select name=selBatch id=selBatch onChange="getSem(this.value)"></select>	</td>
</tr>

<tr>
	<td> 	Semester 	</td>
    <td>	:	</td>
    <td>	<select name=selSem id=selSem > </select> </td>
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
	include "footer.php"
	
?>