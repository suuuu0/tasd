<?php
class login extends connection 
{
	var $name,$password;
	function Addrecord()
	{
		$this->Query = "insert into ".Login." set name = '$this->name',password = '$this->password'";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	function Check()
	{
		$this->Query = "select * from ".Login." where name = '$this->name' and password ='$this->password'";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	
}
?>