<?php 
	session_start();
	include "BookBankerMenu.php";
	include "bookMongerdb.php";
	if(!isset($_SESSION['status']))
		header("location:exit.php");
	$uname=$_SESSION['uname'];
	$sem=$_SESSION['sem'];
	$obj=new cDbase();
?>
<center><h1> BOOKS OF CURRENT SEMESTER  </h1><?php print "(".$sem.")"; ?>
<br>
<br>
<table border="1">
	<tr>
    	<th>TITLE</th>
        <th>AUTHOR</th>
        <th>EDITION</th>
        <th></th>
    </tr>
    <?php
	/*$sql1="select Cid from Semcourse where SemId like '".$sem."'";
	$cids=$obj->sel($sql1);
	if($cids)
	{
		while($cid=mysql_fetch_array($cids))
    	{
			$sql2="select ISBN from bookassignment where Cid like '".$cid[0]."'";
			$isbns=$obj->sel($sql2);
			if($isbns)
			{
				while($isbn=mysql_fetch_array($isbns))
				{
					$sql3="select * from books where ISBN like '".$isbn[0]."'";
					$details=$obj->sel($sql3);
					if($details)
					{
						while($detail=mysql_fetch_row($details))
						{
							print "<tr>";
    							print "<td><a href=ViewBookDetails.php?ISBN=".$detail[0].">".$detail[1]."</a></td>";
        						print "<td>".$detail[2]."</td>";
        						print "<td>".$detail[3]."</td>";
        						print "<td> <a href=bdownload.php?path=".$detail[4].">bdownload</a></td>";
    						print "</tr>";
						}
					}
				}
			}
		}
	}*/
	
	$sql="select * from Books where ISBN in( select ISBN from BookAssignment where Cid in (select Cid from semcourse where SemId like '$sem'))";
	$res=$obj->sel($sql);
	while($isbn=mysql_fetch_array($res))
				{
					$sql3="select * from books where ISBN like '".$isbn[0]."'";
					$details=$obj->sel($sql3);
					if($details)
					{
						while($detail=mysql_fetch_row($details))
						{
							print "<tr>";
    							print "<td><a href=ViewBookDetails.php?ISBN=".$detail[0].">".$detail[1]."</a></td>";
        						print "<td>".$detail[2]."</td>";
        						print "<td>".$detail[3]."</td>";
        						print "<td> <a href=bdownload.php?filepath=".$detail[4].">Download</a></td>";
    						print "</tr>";
						}
					}
				}
    ?>
</table>
<br>
<br>
<br>
<?php
 include "footer.php"; ?>