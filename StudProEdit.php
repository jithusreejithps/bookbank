
<?php
// Start the session
session_start();
?>

<?php
if(!isset($_SESSION['status']))
	{
		header("location:exit.php");
	}
else
{
 include "bookMongerdb.php";
 include "StudMenu.php";
 print "<center>";
 print "<h1>Edit Details</h1>";
 $rno=$_SESSION["uname"];
 $objEProfile=new cDbase();
 $sql="select * from student where RegNo like '".$rno."'";
 $res=$objEProfile->sel($sql);
 mysql_query($sql) or die(mysql_error);
 $row=mysql_fetch_array($res);
 $pwd=$row[4];
 //print "".$pwd;
 //$sem=$row[2];
 ?>
 <table>
<tr>

	<td>	Register Number 	</td>
    <td>    :	</td>
    <td>	<label><?php echo "$row[0]";   ?></label>		</td>
    
</tr>

<tr>

	<td>	Name	</td>
    <td>	:	</td>
    <td>	<input type=text name="txtName" id="txtName" value=<?php echo "$row[1]";?>  />	</td>

</tr>

<tr>

	<td>Email</td>
    <td> :	</td>
    <td>	<input type=text name="txtEmail" id="txtEmail" value=<?php echo "$row[3]";?> />		</td>
</tr>

<tr>
	<td>Password</td>
    <td>	:	</td>
    <td>	<input type=password name="txtPswd" id="txtPswd"  /> </td>
</tr>
<tr>
	<td>New Password</td>
    <td>	:	</td>
    <td>	<input type=password name="txtNPswd" id="txtNPswd" /> </td>
</tr>
<tr>
	<td>Confirm Password</td>
    <td>	:	</td>
    <td>	<input type=password name="txtCPswd" id="txtCPswd" /> </td>
</tr>
<tr></tr>
<tr></tr>
<tr>
<td></td>
<td></td>
 <td>	<input type=submit name="btnSave" id="btnSave" value="Save" />		</td>
	<td> 	<input type=submit name="btnCancel" id="btnCancel" value="Cancel" /> 		</td>  
</tr>
</centre>
</table>
 
 <?php
 if(isset($_REQUEST['btnSave']))
	{
		$name=$_REQUEST['txtName'];
		//print "".$name;
		$email=$_REQUEST['txtEmail'];
		//print "".$email;
		$qry="update student set Name='$name',email='$email' where RegNo='$rno'";
		$objEProfile->idu($qry);
		//$qry="update student set Name='$Newpwd' where RegNo='$rno'";
		//$objEProfile->idu($qry);
		$Oldpwd=$_REQUEST['txtPswd'];
		//$Oldpwd=str_replace("'","''",$Oldpwd);
		$Newpwd=$_REQUEST['txtNPswd'];
		$Newpwd=str_replace("'","''",$Newpwd);
		$Cpwd=$_REQUEST['txtCPswd'];
		$Cpwd=str_replace("'","''",$Cpwd);
		//print "".$Oldpwd;
		//print "".$pwd;
		if($Oldpwd==$pwd)
		{
			if($Newpwd==$Cpwd)
			{
				$qry="update student set password='$Newpwd' where RegNo='$rno'";
				$objEProfile->idu($qry);	
				print "Successfully changed";
				print "<br> Click <a href=StudProfile.php>here</a> to go back";	
				//header("location:ViewFaculty.php");
			}
			else
			{
				print "Password Mismatch";
				print "<br> Click <a href=StudProEdit.php>here</a> to try again";
			}
		}
		else
		{
			print "Incorrect Old Password";
			print "<br> Click <a href=StudProEdit.php>here</a> to try again";
		}
	}
	if(isset($_REQUEST['btnCancel']))
	{
		header("location:StudProile.php");
	}
}
	?>

<?php include "footer.php"?>