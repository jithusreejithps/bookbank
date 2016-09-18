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
		
		function getStudent(str) 
		{
    		if (str == 0) 
			{
        		document.getElementById("selBanker").innerHTML = "";
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
                		document.getElementById("selBanker").innerHTML = xmlhttp.responseText;
            		}
        		}
        		xmlhttp.open("GET","getStudent.php?q="+str,true);
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
		//header("location:Addnewbanker.php");
	}
	else if(isset($_REQUEST['btnSave']))
	{
		$objBanker=new cDbase();
		$rno=$_REQUEST['selBanker'];
		$ress=$objBanker->sel("select * from BookBanker where RegNo='$rno'");
		$rows=mysql_fetch_row($ress);
		if(!$rows)
		{
			$fdate=$_REQUEST['txtFDate'];
			$tdate=$_REQUEST['txtTDate'];
			$sql="insert into BookBanker values('".$rno."','".$fdate."','".$tdate."')";
			$objBanker->idu($sql);
			$status="<h4>Record Saved</h4>";
		}
		else
		{
			$status="<h4>Book Banker already exists<br>Click <a href=Addnewbanker.php>here</a> to try again</h4>";
		}
	}
}

?>
<form action="#" method="post">
<center>
<h2>BOOK BANKER REGISTRATION</h2>
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
    <td>	<select name=selPgm id=selPgm onChange="getBatch(this.value)"> </select> </td>
</tr>

<tr>
	<td> 	Batch		</td>
    <td>	:		</td>
    <td>	<select name=selBatch id=selBatch onChange="getStudent(this.value)"></select>	</td>
</tr>

<tr>
	<td> 	Book Banker 	</td>
    <td>	:	</td>
    <td>	<select name=selBanker id=selBanker></select> </td>
</tr>

<tr>
		<td>	From Date	</td>
        <td>	:	</td>
        <td>	<input type=date name="txtFDate" id="txtFDate" />	</td>
</tr>

<tr>
		<td>	To Date	</td>
        <td>	:	</td>
        <td>	<input type=date name="txtTDate" id="txtTDate" />	</td>
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
	include "footer.php";
?>