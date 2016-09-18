<?php 	
	session_start();
	ob_start();
	
	include "FacultyMenu.php";
	include "bookMongerdb.php";
	$txtVal="";
	if(!isset($_SESSION['status']))
		header("location:exit.php");
	if(isset($_REQUEST['btnEdit']))
	{
		$txtVal=$_REQUEST['txtRegNo'];
	}
	else
	{
		$txtVal="";
	}
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

<form action="EditFStudent.php" method="post">
<center>
<h1>EDIT STUDENT DETAILS</h1>
<table>
<tr>

	<td>	Register Number 	</td>
    <td>    :	</td>
    <td>	<input type=text name="txtRegNo" id="txtRegNo" value="<?php print $txtVal; ?>">	</td>
	<td> 	<input type="submit" name="btnEdit" id="btnEdit" value="Edit Details" />	</td>  
    <td>	<input type="submit" name="btnCancel" id="btnCancel" value="Cancel" />	</td>
</tr>
</table>
</center>
<br>
<br>


<?php
if(isset($_REQUEST['btnEdit']))
{
	$reg=$_REQUEST['txtRegNo'];
	$objStudent=new cDbase();
	$sql="select * from Student where RegNo like '".$reg."'";
	$res=$objStudent->sel($sql);
	if($res)
	{
		$row=mysql_fetch_array($res);
		if(!$row)
			{
			print "Invalid Register Number";
			print "<br> Click <a href=EditFStudent.php>on this link </a> to go back";
			}
		else
			{
			print "<center>";
			print "<h1><label>Details Of ".$row[1]."</h1></label>";
			print "<table>";
			
			print "<tr>";
			print "<td>Register Number</td>";
			print "<td>:</td>";
			print "<td><input type=text name=txtRegNo1 id=txtRegno1 value=".$row[0]." disabled=true></td>";
			print "</tr>";
			
			print "<tr>";
			print "<td>Name</td>";
			print "<td>:</td>";
			print "<td><input type=text name=txtname id=txtname value=".$row[1]."></td>";
			print "</tr>";
			
			print "<tr>";
			print "<td>Department</td>";
			print "<td>:</td>";
			print "<td><select name=selDept onChange=getProgram(this.value)>";
			$obj=new cDbase();			
            $ress=$obj->sel("select * from Department");
			$rows=mysql_fetch_row($ress);
			print "<option value=0 selected=true> ---Select Department--- </option>";
			while($rows)
			{
				print "<option value=$rows[0]> $rows[1] </option>";	
				$rows=mysql_fetch_row($ress);
			}
       		print "</select></td>";
			print "</tr>";
			
			print "<tr>";
			print "<td>Program</td>";
			print "<td>:</td>";
			print "<td><select name=selPgm id=selPgm onChange=getBatch(this.value)> </select></td>";
			print "</tr>";
			
			print "<tr>";
			print "<td>Batch</td>";
			print "<td>:</td>";
			print "<td><select name=selBatch id=selBatch onChange=getSem(this.value)></select></td>";
			print "</tr>";
		
			print "<tr>";
			print "<td>Semester</td>";
			print "<td>:</td>";
			print "<td><select name=selSem id=selSem></select></td>";
			print "</tr>";
		
			print "<tr>";
			print "<td>Email</td>";
			print "<td>:</td>";
			print "<td><input type=text name=txtemail id=txtemail value=".$row[3]."></td>";					
			print "</tr>";
			
			print "<tr>";
			print "<td>Password</td>";
			print "<td>:</td>";
			print "<td><input type=text name=txtpsw id=txtpsw value=".$row[4]."></td>";					
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
		else
		{
			print "Invalid Student Registet number<br>";
			print "Click <a href=ViewFstudentDetails.php>on this link </a> to go back";
		}
}
if(isset($_REQUEST['btnCancel']))
{
	//header("location:EditFStudent.php");
}
if(isset($_REQUEST['btnupdate']))
{
	$reg=$_REQUEST['txtRegNo'];
	$name=$_REQUEST['txtname'];
	$mail=$_REQUEST['txtemail'];
	$sem=$_REQUEST['selSem'];
	$psw=$_REQUEST['txtpsw'];
	
	$upobj=new cDbase();
	$upsql="update Student set Name = '".$name."', SemId = '".$sem."', email = '".$mail."', password = '".$psw."' where RegNo like '".$reg."' ";
	$upobj->idu($upsql);
	header("location:ViewFstudentDetails.php");
	print "</form>";
}
?>
<br><br>
<?php include "footer.php"?>