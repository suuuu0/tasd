<?php
class Review extends connection 
{
	var $vname,$vcourse,$description,$vimg;
	function addrecord()
	{
		$this->Query = "insert into ".Review." set vname='$this->vname',vcourse='$this->vcourse',description='$this->description',vimg='$this->vimg'";
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
		$this->Query= "select * from ".Review." order by vname";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
	} 
	function fetchdata($vid)
	{
		$this->Query= "SELECT * FROM ".Review." WHERE vid= $vid";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	function deletedata($vid)
	{
	
		$this->Query= "DELETE FROM ".Review." WHERE vid=$vid";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	function editdata($vid)
	{
		//$this->cid= $cid;
		//echo $this->cid;
		$this->Query= "update ".Review." set vname='$this->vname',vcourse='$this->vcourse',description='$this->description' where vid=$vid";
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
	function update_image($vid)
	{
		
		$this->Query = "update ".Review." set vimg='$this->vimg' where vid=$vid";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	
	function Showreviewfront()
	{
		$this->Query = "select * from ".Review." order by vname ";
		
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