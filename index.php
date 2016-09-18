<?php
session_start();
include "indexmenu.php";
include "bookMongerdb.php";
	if(isset($_POST['btnSubmit']))
	{
		$status="";					// for setting eror message
		$role=$_POST['radiobutton'];	//Role of the user
		$obj=new cDbase();
		$uname=$_POST['txtUname'];
		$pwd=$_POST['txtPwd'];
	
		if($role == 'F')
		{
			$qry=$obj->sel("select * from Faculty where Fid like '".$uname."' and password like '".$pwd."'");
			if(!$qry)
			{
				$status="Invalid User name or password";
			}
			else
			{
				$row=mysql_fetch_row($qry);
				if(!$row)
				{
					$status="<b>Invalid username or password</b>";			
				}
				else
				{
					if($row)
					{
						$_SESSION['unid']=$uname;
						$_SESSION['role']="Faculty";
						$_SESSION['status']=1;
						header("location:FacultyHome.php");
					}
					else 
					{
						$status="<b>Invalid username or password</b>";	
						break;
					}
				}
			}
		}
		else if($role == 'B')			//banker
		{
			$qry=$obj->sel("select BookBanker.RegNo,student.password,Student.SemId from student,BookBanker where BookBanker.RegNo=student.RegNo and student.RegNo like '".$uname."' and student.password like '".$pwd."'");
			if(!$qry)
			{
				$status="Invalid User name or password";
			}
			else
			{
				$row=mysql_fetch_row($qry);
				if(!$row)
				{
					$status="<b>Invalid username or password</b>";			
				}
				else
				{
					if($row)
					{
						$_SESSION['uname']=$uname;
						$_SESSION['uid']=$uname;
						$_SESSION['role']="Book Banker";
						$_SESSION['status']=1;
						header("location:BookBankerHome.php");
					}
					else 
					{
						$status="<b>Invalid username or password</b>";	
						break;
					}
				}
			}
		}
		else	//// student
		{
			$qry=$obj->sel("select RegNo,password,SemId from Student where RegNo like '".$uname."' and password like '".$pwd."'");
			if(!$qry)
			{
				$status="Invalid User name or password";
			}
			else
			{
				$row=mysql_fetch_row($qry);
				if(!$row)
				{
					$status="<b>Invalid username or password</b>";		
				}
				else
				{
					if($row)
					{
						$_SESSION['uname']=$uname;
						$_SESSION['role']="Student";
						$_SESSION['status']=1;
						header("location:StudHome.php");
					}
					else 
					{			
						$status="<b>Invalid username or password</b>";	
						break;
					}
				}
			}	
		}
		if($role=='B' || $role=='S')
		{
			$_SESSION['sem']=$row[2];
		}
	}
?>

<form id="formIndex" name="formIndex" method="post" action="#" >
	
   
<div id="templatemo_content">&nbsp<br>    	
	<div id="templatemo_content_left">
    	<div class="templatemo_content_left_section">
 				<center><label><h3>UserName:</h3></label>	<input type="text" name="txtUname" id="txtUname"/>  <br />
  					<label><h3>Password:</h3></label>  <input type="password" name="txtPwd" id="txtPwd"/>  <br/></center>
                    <?php if(isset($_POST['btnSubmit'])) print "<center><font color=#FF0000>".$status."</font></center>";?>
                    
    				<label><h3 align="left">Login as :</h3> 
    				</label>   
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
                <div align="left">
	        <input name="radiobutton" type="radio" id="radiobutton" value="F" />
	      Faculty <br>
	      <input name="radiobutton" type="radio" id="radiobutton" value="B" />
		  Book Banker<br>
		  <input name="radiobutton" type="radio" id="radiobutton" checked="checked"  value="S" />
Student<br/>
<br/>
                </div>
                <center><input type="submit" name="btnSubmit" id="btnSubmit" value="LOGIN" /><br />
			<p><a href="ForgotPsw.php">Forgot Password</a></p></center><br />
		
        </div>
    </div> <!-- end of content left -->
        
        <div id="templatemo_content_right">
        
            
            <div class="cleaner_with_height">&nbsp;</div>
        </div> <!-- end of content right -->
   		<table>
        <tr><td>
<h1>Book Monger</h1>

<p>
A book bank is intended to organize the book lending system in our college Rajagiri. The department stocks the required books for each of the semesters and then gives it to the students at the beginning of the semester. The students need to place the set of books back to the department at the end of the semester. Our project Book Mongeris to automate the book bank system so that all the tasks related to it can be done much efficiently and effectively.
 
	</p>
	<p>
Book Monger system is a project which aims in developing a computerized system to maintain all the work of Book Bank. The faculty in-charge will facilitate the book bank with required books and assigns the book banker for each batch of student. The book banker issues, returns and calculates fine for each student assigned to them. Students will be given access to track their books.
	</p>

</td> </tr></table>
    	<div class="cleaner_with_height">&nbsp;</div>
    </div> <!-- end of content --></form>
 <?php
 include "footer.php";
?>
 
 
 
