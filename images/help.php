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
<p align="left"><font color="#CCCCCC" size="5">Faculty</font></p>
<div align="left">
  <ul>
    <font size="4"><br />
    </font>
    
  </ul>
</div>
<ul>
  <p align="left" allign="justify"><font size="3">
    The faculty has to login with their Faculty Id as the Username and the password being provided to them  </font></p>
  <div align="left"><br />
  </div>
</ul>
<p align="left"><font color="#CCCCCC" size="5">Book Banker</font></p>
<div align="left">
  <ul>
    <font size="4"><br />
    </font>
    
  </ul>
</div>
<ul>
  <p align="left" allign="justify"><font size="3">
    The Book Banker has to login with their Register Number as the Username and the password being provided to them  </font></p>
  <div align="left"><br />
  </div>
</ul>
<p align="left"><font color="#CCCCCC" size="5">Student</font></p>
<div align="left">
  <ul>
    <font size="4"><br />
    </font>
    
  </ul>
</div>
<ul>
  <p align="left" allign="justify"><font size="3">
    The Student has to login with their Register Number as the Username and the password being provided to them  </font></p>
</ul>
<?php include "footer.php"?>
