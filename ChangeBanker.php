<?php 	
	include "header.php"; 
	include "bookMongerdb.php";
?>

<head>
	<script>
		function getNewStudent(str) 
			{
    		if (str == 0) 
				{
        		document.getElementById("selNewBanker").innerHTML = "";
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
                		document.getElementById("selNewBanker").innerHTML = xmlhttp.responseText;
            			}
        			}
        		xmlhttp.open("GET","getStudent.php?q="+str,true);
        		xmlhttp.send();
    			}
			}
</script>

</head>
<body>
<form action="#" method="post">
<center>
<h2>Change Book Banker</h2>
</center>
<table>

<tr>
	<td>	Old Banker	</td>
    <td>	:	</td>
    <td>	<input type=text name="txtOBanker" id="txtOBanker"/>	</td>
</tr>

<tr>
	<td> Batch Code	</td>
    <td> :	</td>
    <td>	<select name="selBatch" onChange="getNewStudent(this.value)">
			<?php
			$obj=new cDbase();			
            $res=$obj->sel("select BatchCode from Batch");
			$row=mysql_fetch_row($res);
			print "<option value=0 selected=true> ---Select Batch--- </option>";
			while($row)
			{
				print "<option value=$row[0]> $row[0] </option>";
				print "$row[0]";	
				$row=mysql_fetch_row($res);
			}
			?> 
			</select> </td>
</tr>

<tr>
	<td>	New Banker	</td>
    <td>    :	</td>
    <td>	<select name="selNewBanker" id="selNewBanker" </select> </td></td>
</tr>

<tr>
	<td>	From Date	</td>
    <td>	:	</td>
    <td>	<input type=text name="txtFDate" id="txtTDate"/>	</td>
</tr>

<tr>
	<td>   To Date  </td>
    <td> :	</td>
    <td>	<input type=text name="txtTDate" id="txtTDate"/>		</td>
</tr>

<td>	</td>
<td></td>
    <td>	<input type=submit name="btnChange" id="btnChange" value="Change"  />	 &nbsp; &nbsp;&nbsp;
    		<input type=submit name="btnCancel" id="btnCancel" value="Cancel" />	</td>
</tr>

</table>
</form>
</body>
<?php 
	$objBanker=new cDbase();	
	if(isset($_REQUEST['btnChange']))
	{
		$rno=$_REQUEST['txtOBanker'];
		$ress=$objBanker->sel("select * from BookBanker where RegNo='$rno'");
		$rows=mysql_fetch_row($ress);
		if($rows)
		{
			$batch=$_REQUEST['selBatch'];
			$res1=$objBanker->sel("select SemId from Student where RegNo='$rno'");
			$row1=mysql_fetch_row($res1);
			$res2=$objBanker->sel("select BatchCode from Semester where SemId='$row1[0]'");
			$row2=mysql_fetch_row($res2);
			if($row2[0]==$batch)
			{
				$newrno=$_REQUEST['selNewBanker'];
				$fdate=$_REQUEST['txtFDate'];
				$tdate=$_REQUEST['txtTDate'];
				$qry="update BookBanker set RegNo='$newrno',from_date='$fdate',to_date='$tdate' where RegNo='$rno'";
				$objBanker->idu($qry);
				header("location:ViewBankerDetails.php");
			}
			else
			{
				print "<h4>Book Banker is not in this batch";
				print "<br>Click <a href=Changebanker.php>here</a> to try again</h4>";
			}
		}
		else
		{
			print "<h4>Book Banker not exists";
			print "<br>Click <a href=Changebanker.php>here</a> to try again</h4>";
		}
	}
	if(isset($_REQUEST['btnCancel']))
	{
		header("location:ViewBankerDetails.php");
	}
	include "footer.php"
?>