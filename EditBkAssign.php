<?php 	
	session_start();
	ob_start();
	
	include "bookMongerdb.php";
	include "FacultyMenu.php";
	if(!isset($_SESSION['status']))
	{
		header("location:exit.php");
	}
	else
	{
	$bno=$_REQUEST['txtBookNo'];
	$objAssign=new cDbase();
	$sql="select * from BookAssignment where ISBN like '".$bno."'";
	$res=$objAssign->sel($sql);
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
			
		function getCourse(str) 
		{
    		if (str == 0) 
			{
        		document.getElementById("selCourse").innerHTML = "";
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
                		document.getElementById("selCourse").innerHTML = xmlhttp.responseText;
            		}
        		}
        		xmlhttp.open("GET","getCourse.php?q="+str,true);
        		xmlhttp.send();
    		}
		}
	</script>
</head>
<body>
<form action="#" method="post">
<center>
<h2>Edit Book Assign Details</h2>
</center>
<table>

<tr>
	<td>	Book 	</td>
    <td>    :	</td>
    <td>	<label><?php echo $row['ISBN']; ?></label>		</td>
</tr>

<tr>
	<td>	No. of Copies  </td>
    <td>    :	</td>
    <td>	<label><?php echo $row['NoOfCopies']; ?></label>		</td>
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
       		</select>		</td>
</tr>

<tr>
	<td> 	Program 	</td>
    <td>	:	</td>
    <td>	<select name=selPgm id=selPgm onChange="getCourse(this.value)"> </select> </td>
</tr>

<tr>
	<td> 	Course	</td>
    <td>	:		</td>
    <td>	<select name=selCourse id=selCourse></select>	</td>
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
		$cid=$_REQUEST['selCourse'];
		$ress=$objAssign->sel("select * from BookAssignment where Cid='$cid' and ISBN='bno'");
		$rows=mysql_fetch_row($ress);
		if(!$rows)
		{
			$qry1="update BookAssignment set Cid='$cid' where ISBN like '".$bno."'";
			$objAssign->idu($qry1);
			header("location:ViewBkAssignDetails.php");
		}
		else
		{
			print "<h4>Book is already assigned to this course";
			print "<br>Click <a href=ViewBkAssignDetails.php>here</a> to go back</h4>";
		}
	}
	if(isset($_REQUEST['btnCancel']))
	{
		header("location:ViewBkAssignDetails.php");
	}
	}
 include "footer.php";
 
?>