<?php
class cDbase
{
	var $con;
	public function open()
	{
		$con=mysql_connect("localhost","root");
		mysql_select_db("BookMonger");
		if (!$con) 
		{
    			die('Could not connect: ' . mysqli_error($con));
		}
	}
	public function idu($sql)
	{
		$this->open();
		mysql_query($sql);
		$this->close();
	}
	public function sel($sql)
	{
		$this->open();
		$res=mysql_query($sql);
		return $res;
	}
	public function close()
	{
		mysql_close();
	}
}
?>