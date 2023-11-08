<?php
class Course extends connection 
{
	var $cname,$description,$price,$cimg;
	function addrecord()
	{
		$this->Query = "insert into ".Course." set cname = '$this->cname',description = '$this->description',price = '$this->price',cimg = '$this->cimg'";
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
		$this->Query= "select * from ".Course." order by cname ";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
	} 
	function fetchdata($cid)
	{
		$this->Query= "SELECT * FROM ".Course." WHERE cid= $cid";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	function deletedata($cid)
	{
	
		$this->Query= "DELETE FROM ".Course." WHERE cid= $cid";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	function editdata($cid)
	{
		//$this->cid= $cid;
		//echo $this->cid;
		$this->Query= "update ".Course." set cname= '$this->cname', description= '$this->description', price=$this->price, cimg='$this->cimg' where cid=$cid";
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
	
	function ShowCoursesFront()
	{
		$this->Query= "select ".Trainer.".tname,".Trainer.".timg,".Course.".cname,".Course.".description,".Course.".price,".Course.".cimg   FROM  ".Course." INNER JOIN ".Trainer." on ".Course.".cid=".Trainer.".cid limit 3" ;
		if($this->ExecuteQuery())
		{
			return true ;
		}
		else
		{
			return false;
		}
		
	}
}
?>