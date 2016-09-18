<?php
	session_start();
	include "BookBankerMenu.php";
	include "bookMongerdb.php";
	if(!isset($_SESSION['status']))
		header("location:exit.php");
?><head>
	<script>
		function getBooks(str) 
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
                		document.getElementById("tabBook").innerHTML = xmlhttp.responseText;
            			}
        			}
        		xmlhttp.open("GET","getbooks.php?q="+str,true);
        		xmlhttp.send();
    			}
			}
	</script>
    </head>
    
<form action="" method="post">
    <center><h1>BOOKS</h1>
    <br><br>
    <table>
    <tr>
    <td>Select the semester to view books</td>
    <td>
<?php
	$sem=$_SESSION['sem'];
	$obj=new cDbase();
	$res=$obj->sel("select SemId from Semester where BatchCode like (select BatchCode from semester where SemId like '".$sem."')");
	if($res)
	{
		print "<select name=selSem id=selSem onChange=getBooks(this.value)>";
		$c=0;
		while($row=mysql_fetch_row($res))
		{
			if($c==0)
				print "<option name=".$row[0]." selected=selected>".$row[0]."</option>";
			else
				print "<option name=".$row[0].">".$row[0]."</option>";	
				$c+=1;		
		}
		print "</select>";
	}
?>
</td>
</tr>

</center>
</table>
<br><br>
<table id="tabBook" border="1">
</table>
<br>
<br>
<br>
<?php
include "footer.php";
?>