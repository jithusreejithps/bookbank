<?php
	session_start();
	$usr=$_SESSION['uname'];
	include "bookMongerdb.php";
	include "BookBankerMenu.php"; 
	$sem=$_REQUEST['selSem'];
	$std=$_REQUEST['selStud'];
	$objsembook=new cDbase();
	$st=$objsembook->sel("select Name from Student where RegNo like '".$std."'");
	$regno=mysql_fetch_array($st);
	$res=$objsembook->sel("select * from books where ISBN  in (select ISBN from BookAssignment where cid in(select cid from semcourse where SemId like '".$sem."'))");
	while($row=mysql_fetch_array($res))
	{
		if($_REQUEST[$row[0]])
		{
			$idate=$_REQUEST['idate'];
			$rdate=$_REQUEST['rdate'];
			$rem=$_REQUEST['txtRem'];
			$qry="insert into bookbanking values ('".$_REQUEST[$row[0]]."','".$std."','".$sem."','".$idate."','".$rdate."','".$rem."')";
			$objsembook->idu($qry);
			$objsembook->idu("update bookcopies set Status='Issued' where BookNum like '".$_REQUEST[$row[0]]."'");
		}
	}
	
?>


	<center>
    <h1>ISSUE BOOKS TO <?php print $regno[0]; ?> </h1>
    	<table>
        	<tr>
            	<td>Register Number</td>
                <td>:</td>
                <td><?php print $std; ?> </td>
            </tr>
            <tr>
            	<td>Student Name</td>
                <td>:</td>
                <td><?php print $regno[0]; ?> </td>
            </tr>
             <tr>
             	<td>Books Issued</td>
                <td>:</td>
                <td></td>
             </tr>
            <?php
            $res=$objsembook->sel("select * from books where ISBN  in (select ISBN from BookAssignment where cid in(select cid from semcourse where SemId like '".$sem."'))");
	while($row=mysql_fetch_array($res))
	{
		if($_REQUEST[$row[0]])
		{
			print "<tr>";
            	print "<td>$row[1]</td>";
                print "<td>:</td>";
                print "<td>".$_REQUEST[$row[0]]."</td>";
            print "</tr>";
		}
	}
			?> 
             
        </table>
        <a href="issue.php">Back to issue</a>
    </center>
<?php
	include "footer.php";
?>