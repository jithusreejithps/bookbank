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
	$FacultyId='admin';
	$objFaculty=new cDbase();
	$sql="select * from Faculty where Fid like '".$FacultyId."'";
	$res=$objFaculty->sel($sql);
	$row=mysql_fetch_array($res);
	$pwd=$row[4];
?>

</head>
<body>
<form action="#" method="post">
<center>
<h2>Change Faculty Password</h2>
</center>
<table>

<tr>
	<td>	Faculty Id 	</td>
    <td>    :	</td>
    <td>	<label><?php echo $row['Fid']; ?></label>		</td>
</tr>

<tr>
	<td>	Old Password	</td>
    <td>	:	</td>
    <td>	<input type=password name="txtOPwd" id="txtOPwd"/>	</td>
</tr>


<tr>
	<td>	New Password	</td>
    <td>	:	</td>
    <td>	<input type=password name="txtNPwd" id="txtNPwd"/>	</td>
</tr>

<tr>
	<td>	Conform Password	</td>
    <td>	:	</td>
    <td>	<input type=password name="txtCPwd" id="txtCPwd"/>	</td>
</tr>

<tr>
<td>	</td>
<td></td>
    <td>	<input type=submit name="btnChange" id="btnChange" value="Change"  />	 &nbsp; &nbsp;&nbsp;
    		<input type=submit name="btnCancel" id="btnCancel" value="Cancel" />	</td>
</tr>

</table>
</form>

<?php

	if(isset($_REQUEST['btnChange']))
	{
		$Oldpwd=$_REQUEST['txtOPwd'];
		$Oldpwd=str_replace("'","''",$Oldpwd);
		$Newpwd=$_REQUEST['txtNPwd'];
		$Newpwd=str_replace("'","''",$Newpwd);
		$Cpwd=$_REQUEST['txtCPwd'];
		$Cpwd=str_replace("'","''",$Cpwd);
		if($Oldpwd==$pwd)
		{
			if($Newpwd==$Cpwd)
			{
				$qry="update Faculty set password='$Newpwd' where Fid='$FacultyId'";
				$objFaculty->idu($qry);	
				print "Successfully password changed";
				print "<br> Click <a href=ViewFaculty.php>here</a> to go back";	
			}
			else
			{
				print "Password Mismatch";
				print "<br> Click <a href=ChangeFPwd.php>here</a> to try again";
			}
		}
		else
		{
			print "Incorrect Old Password";
			print "<br> Click <a href=ChangeFPwd.php>here</a> to try again";
		}
	}
	if(isset($_REQUEST['btnCancel']))
	{
		header("location:ViewFaculty.php");
	}
}
	include "footer.php"
?>