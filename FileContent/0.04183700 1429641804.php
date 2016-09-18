<?php
	if(isset($_POST['b1']))
	{
		$file=fopen("file1.txt","w");
		fwrite($file,$_POST['t2']);
	}

?>

<HTML>
<body>
	<form method=post action="fileTest.php">
		<textarea name=t2 id=t2> </textarea>
		<input type=submit name=b1 id="b1" value="Submit">
	</form>
	
</body>
</html>