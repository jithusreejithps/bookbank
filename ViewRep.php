<?php
session_start();
include "BookBankerMenu.php";
include "bookMongerdb.php";
if(!isset($_SESSION['status']))
	header("location:exit.php");
print "<form action=ViewRep.php method=post>";
$sem=$_SESSION['sem'];
$obj=new cDbase();
$batch=$obj->sel("select BatchCode from Semester where SemId like '$sem'");
$bat=mysql_fetch_array($batch);
?>
<br>
<form action="#" method="post">
<center><h1>REPORTS CREATED</h1>
<table>


<?php
$ffs = scandir("./Reports");
foreach($ffs as $ff)
	{
     if($ff != '.' && $ff != '..')
	 	{
			print "<tr>";
  				print "<td>";
					echo "File name : ".$ff;
				print "</td>";
				print "<td>";
					echo "<a href=downloadrep.php?filepath=./Reports/$ff>Download</a>";
				print "</td>";
			print "</tr> ";
			
		}
    }
?>

</table>
</center>
</form>
<br>
<br>
<?php

include "footer.php";
?>