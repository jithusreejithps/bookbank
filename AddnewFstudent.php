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
<form action="#" method="post">
<center>
<h1>STUDENT REGISTRATION</h1>

<table>


<tr>

	<td>	Register Number 	</td>
    <td>    :	</td>
    <td>	<input type=text name="txtRegNo" id="txtRegNo" />		</td>
    
</tr>

<tr>

	<td>	Name	</td>
    <td>	:	</td>
    <td>	<input type=text name="txtName" id="txtName" />	</td>

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
		<td>	E-mail	</td>
        <td>	:	</td>
        <td>	<input type=text name=txtMail id=txtMail />	</td>
</tr>

<tr>
	<td>		Password	</td>
    <td>	:	</td>
    <td>	<input type=password name=txtPsw id=txtPsw  />	</td>
</tr>
<tr>
	<td>	</td>
    <td></td>
    <td>	<input type=submit name="btnSave" id="btnSave" value="Save"  />	 &nbsp; &nbsp;&nbsp;
    		<input type=submit name="btnCancel" id="btnCancel" value="Cancel" />	</td>
</tr>

</table>
<br><br>
</center>
</form>
</body>

<?php

if(isset($_REQUEST['btnCancel']))
		{
			header("location:AddnewFstudent.php");
		}
		if(isset($_REQUEST['btnSave']))
		{
			$objStudent=new cDbase();
			$regNo=$_REQUEST['txtRegNo'];
			$ress=$objStudent->sel("select * from Student where RegNo='$regNo'");
			$rows=mysql_fetch_row($ress);
			if(!$rows)
			{
				$name=$_REQUEST['txtName'];
				$sem=$_REQUEST['selSem'];
				$email=$_REQUEST['txtMail'];
				$psw=$_REQUEST['txtPsw'];	
				$sql="insert into Student values('".$regNo."', '".$name."', '".$sem."', '".$email."', '".$psw."')";
				$objStudent->idu($sql);
				print "Record Saved";
			}
			else
			{
				print "<h4>Register Number already exists";
				print "<br>Click <a href=AddnewFstudent.php>here</a> to try again</h4>";
			}

		}
	}
	include "footer.php"

?>