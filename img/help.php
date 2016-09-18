<?php 	session_start();
?>

<?php
if(isset($_SESSION['uname']))
	include "BookBankerMenu.php";
else
	{
	include "indexmenu.php";	
	}
?>
<h1>Help...</h1>
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
<?php include "footer.php"?>
