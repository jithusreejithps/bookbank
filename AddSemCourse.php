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
$status="";
if(isset($_REQUEST['btnCancel']))
	{
			$status="";
			header("location:AddSemCourse.php");
	}
	else if(isset($_REQUEST['btnSave']))
	{
			$sem=$_REQUEST['selSem'];
			$course=$_REQUEST['selCourse'];
			$sqls="select * from SemCourse where SemId='$sem' and Cid='$course'";
			$ress=$obj->sel($sqls);
			$rows=mysql_fetch_array($ress);
			if(!$rows)
			{
				$sql="insert into SemCourse values('".$sem."','".$course."')";
				$obj->idu($sql);
				$status="<h4>Record Saved</h4>";
			}
			else
			{
				$status="<h4>This course is already assigned to this sem <br>Click <a href=AddSemCourse.php>here</a> to try again</h4>";
			}
	}
?>

<form action="#" method="post">
<center>
<h2>Assign Course to Semester</h2>
</center>
<table>

<tr>
	<td> 	Course	</td>
    <td>	:		</td>
    <td>	<select name=selCourse id=selCourse>
			<?php		
            $res2=$obj->sel("select * from Course");
			$row2=mysql_fetch_row($res2);
			print "<option value=0 selected=true> ---Select Course--- </option>";
			while($row2)
				{
				print "<option value=$row2[0]> $row2[1] </option>";	
				$row2=mysql_fetch_row($res2);
				}
			?>
			</select>	</td>
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
echo "$status";
}
include "footer.php";
?>