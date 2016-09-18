<?php 	session_start();
?>

<?php
if(isset($_SESSION['role']))
	{
		if ($_SESSION['role']=="Book Banker")
		{
		include "BookBankerMenu.php";
		}
		elseif($_SESSION['role']=="Student")
		{
		include "StudMenu.php";
		}
		else
		{
		 include "FacultyMenu.php";
		}
	}
	else
	{
		include "indexmenu.php";
	}
	
?>

<h1>Help...</h1>
   <br><div id="templatemo_content">&nbsp<br>    	
	<div id="templatemo_content_left">
    <div class="templatemo_content_left_section">	
 				<center><label><h3>Faculty</h3></label>	
				  					The faculty has to login with their Faculty Id as the Username and the password being provided to them<br>
		</div>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<div id="templatemo_content_left">
    	<div class="templatemo_content_left_section">
 				<center><label><h3>Book Banker</h3></label>	
				  					The Book Banker has to login with their Register Number as the Username and the password being provided to them
		</div>
        </div>
		<div id="templatemo_content_left">
    	<div class="templatemo_content_left_section">
 				<center><label><h3>Student</h3></label>	
				  					The Student has to login with their Register Number as the Username and the password being provided to them<br>
		</div>
       </div>
    </div> <!-- end of content left -->
	</center>
	 

	
<?php include "footer.php"?>

