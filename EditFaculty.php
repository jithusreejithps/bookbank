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
	
	if(isset($_REQUEST['btnSave']))
	{
		$name=$_REQUEST['txtName'];
		$name=str_replace("'","''",$name);
		$deptid=$_REQUEST['selDept'];
		$email=$_REQUEST['txtEmail'];
		$qry="update Faculty set Name='$name',DeptId='$deptid',email='$email' where Fid='$FacultyId'";
		$objFaculty->idu($qry);		
		header("location:ViewFaculty.php");
	}
	if(isset($_REQUEST['btnCancel']))
	{
		header("location:ViewFaculty.php");
	}
?>
</head>
<body>
<form action="#" method="post">
<center>
<h2>Edit Faculty Details</h2>
</center>
<table>

<tr>

	<td>	Faculty Id 	</td>
    <td>    :	</td>
    <td>	<label><?php echo $row['Fid']; ?></label>		</td>
</tr>

<tr>

	<td>	Faculty Name	</td>
    <td>	:	</td>
    <td>	<input type=text name="txtName" id="txtName" value="<?php echo $row['Name'];?>" />	</td>
</tr>

<tr>

	<td>  Department Id  </td>
    <td> :	</td>
    <td>	<select name="selDept">
			<?php
			$obj=new cDbase();			
			$Did=$row['DeptId'];
			$res1=$obj->sel("select Name from Department where DeptId='$Did'");
			$row1=mysql_fetch_row($res1);
            echo "<option value=$Did> $row1[0] </option>";
			$res1=$obj->sel("select * from Department where DeptId<>'$Did'");
			$row1=mysql_fetch_row($res1);	
			while($row1)
				{
				print "<option value=$row1[0]> $row1[1] </option>";	
				$row1=mysql_fetch_row($res1);
				}
				}
			?>
       		</select>		</td>
</tr>

<tr>
	<td>  E-mail Id  </td>
    <td>	:	</td>
    <td>	<input type=text name="txtEmail" id="txtEmail" value="<?php echo $row['email'];?>" /> </td>
</tr>

<td>	</td>
<td></td>
    <td>	<input type=submit name="btnSave" id="btnSave" value="Save"  />	 &nbsp; &nbsp;&nbsp;
    		<input type=submit name="btnCancel" id="btnCancel" value="Cancel" />	</td>
</tr>

</table>
</form>
<?php include "footer.php"?>