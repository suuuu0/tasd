<?php
class Page extends connection 
{
	var $pname,$description;
	function addrecord()
	{
		$this->Query = "insert into ".Page." set pname = '$this->pname',description = '$this->description'";
		//print_r($this->Query);exit;
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	function ShowCourses()
	{
		$this->Query= "select * from ".Page." order by pname";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
	} 
	
	function Deletepage($pid)
	{
		$this->Query= "delete from ".Page." where pid = $pid";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
		
	}
	function Fetchdata($pid)
	{
		$this->Query= "select * from ".Page." where pid = $pid";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
		
	}
	function editdata($pid)
	{
		$this->Query= "update  ".Page." set  pname = '$this->pname',description = '$this->description' where pid = $pid";
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