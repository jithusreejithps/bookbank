<?php
session_start();
include "BookBankerMenu.php";
include "bookMongerdb.php";
if(isset($_REQUEST['status']))
{
	header("location:exit.php");
}
$uid=$_SESSION['uid'];
?><head>
	<script>
		function getBooks(str) 
			{
    		if (str == 0) 
				{
        		document.getElementById("tabBook").innerHTML = "";
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
                		document.getElementById("tabBook").innerHTML = xmlhttp.responseText;
            			}
        			}
        		xmlhttp.open("GET","getbooksofstd.php?q="+str,true);
        		xmlhttp.send();
    			}
			}
			
function getStud(str) 
			{
    		if (str == 0) 
				{
        		document.getElementById("selStud").innerHTML = "";
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
                		document.getElementById("selStud").innerHTML = xmlhttp.responseText;
            			}
        			}
        		xmlhttp.open("GET","getStudents.php?q="+str,true);
        		xmlhttp.send();				
    			}
			
			}			
			
</script>
</head>



<br>
<br>   
<form action="issuetostd.php" method="get">
    <center><h1>RETURN BOOKS</h1>
    <br><br>
    <table>
    <tr>
    <td>Select the semester </td>
    <td>
<?php
	$sem=$_SESSION['sem'];
	$obj=new cDbase();
	$res=$obj->sel("select SemId from Semester where BatchCode like (select BatchCode from semester where SemId like '".$sem."')");
	if($res)
	{
		print "<select name=selSem id=selSem onChange=getStud(this.value)>";
		while($row=mysql_fetch_row($res))
		{
				print "<option name=".$row[0].">".$row[0]."</option>";						
		}
		print "</select></td>";
		print "";
	}
?>

</td>
</tr>
<tr>
<td>
Student Id
</td>
<td><select name="selStud" id="selStud"  onchange="getBooks(this.value)" ></td>
</tr>
</table>
<br><br>
<h2>BOOKS TO BE RETURNED</h2>
(Select book copy to issue)
<table id="tabBook" border="1">
<?php
if(isset($_REQUEST['btnissue']))
{
	print "here";
}
?>

</table>
</center>
</form>

<br><br>
<?php
include "footer.php"
?>