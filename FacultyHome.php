<?php
session_start();
include "FacultyMenu.php";
include "bookMongerdb.php";
if(!isset($_SESSION['status']))
	header("location:exit.php");
?>
<br>
<form action="#" method="post">
<center><h1>REPORT LIST</h1>
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