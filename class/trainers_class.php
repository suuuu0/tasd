<?php
class Trainer extends connection 
{
	var $tname,$t_details,$description,$cid,$timg,$phone,$username,$password;
	function addrecord()
	{
		$this->Query = "insert into ".Trainer." set tname = '$this->tname',cid = '$this->cid',t_details = '$this->t_details',description = '$this->description',timg = '$this->timg',phone='$this->phone',username = '$this->username',password = '$this->password'";
		
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
		$this->Query= "select * from ".Trainer." order by tname ";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
	} 
	function deletedata($tid)
	{
	
		$this->Query= "DELETE FROM ".Trainer." WHERE tid=$tid";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	function FetchData($tid)
	{
	
		$this->Query= "select * FROM ".Trainer." WHERE tid=$tid";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	
	function editdata($tid)
	{
		$this->Query = "update ".Trainer." set cid=$this->cid,tname ='$this->tname',t_details='$this->t_details',description='$this->description',phone='$this->phone',username='$this->username',password='$this->password' where tid=$tid";
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
	function update_image($tid)
	{
		
		$this->Query = "update ".Trainer." set timg='$this->timg' where tid=$tid";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	function ShowTrainerFrount()
	{
		$this->Query= "select * from ".Trainer." order by tname limit 3";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	function ShowTrainerFrountJion()
	{
		$this->Query= "select ".Trainer.".tname,".Trainer.".description,".Trainer.".t_details,".Trainer.".timg   FROM  ".Course." INNER JOIN ".Trainer." on ".Course.".cid=".Trainer.".cid limit 3" ;

		if($this->ExecuteQuery())
		{
			return true ;
		}
		else
		{
			return false;
		}
		
	}
	
	function teacher_login($username,$password)
	{
		$this->Query = "select * from ".Trainer." where username='$username' AND password='$password'";
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