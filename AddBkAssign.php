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
		function getBook() 
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
                	document.getElementById("selBook").innerHTML = xmlhttp.responseText;
            	}
        	}
        	xmlhttp.open("GET","getBook.php",true);
        	xmlhttp.send();
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
<h2>BOOK ASSIGNMENT</h2>
</center>
<table>

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
    <td>	<select name=selCourse id=selCourse onChange="getBook()"></select>	</td>
</tr>

<tr>
	<td> 	Book Name </td>
    <td>	:	</td>
    <td>	<select name=selBook id=selBook> </select> </td>
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
		header("location:AddBkAssign.php");
	}
	if(isset($_REQUEST['btnSave']))
	{
		$objAssign=new cDbase();
		$bno=$_REQUEST['selBook'];
		$ress=$objAssign->sel("select * from BookAssignment where ISBN='$bno'");
		$rows=mysql_fetch_row($ress);
		if(!$rows)
		{
		$cid=$_REQUEST['selCourse'];
		$sql="select NoOfCopies from Books where ISBN='".$bno."'";
		$res=$objAssign->sel($sql); 
		$row=mysql_fetch_array($res);
		$copies=$row[0];
		$sql="insert into BookAssignment values('".$bno."','".$cid."',".$copies.")";
		$objAssign->idu($sql);
		print "Record Saved";
		}
		else
		{
			print "<h4>Book already assigned";
			print "<br>Click <a href=AddBkAssign.php>here</a> to try again</h4>";
		}
	}
}
	
	include "footer.php"
	
?>