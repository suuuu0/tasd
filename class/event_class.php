<?php
class Event extends connection 
{
	var $ename,$e_description,$e_date,$e_img;
	function addrecord()
	{
		$this->Query = "insert into ".Event." set ename = '$this->ename',e_description = '$this->e_description',e_date = '$this->e_date',e_img = '$this->e_img'";
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
		$this->Query= "select * from ".Event." order by ename";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
	} 
	function fetchdata($eid)
	{
		$this->Query= "SELECT * FROM ".Event." WHERE eid= $eid";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	function deletedata($eid)
	{
	
		$this->Query= "DELETE FROM ".Event." WHERE eid=$eid";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	function editdata($eid)
	{
		//$this->cid= $cid;
		//echo $this->cid;
		$this->Query= "update ".Event." set ename= '$this->ename', e_description= '$this->e_description', e_date='$this->e_date',e_date='$this->e_date',e_img='$this->e_img' where eid=$eid";
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
	
	function ShowEventfront()
	{
		$this->Query= "select * from ".Event." order by ename limit 2";
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