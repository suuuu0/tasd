

<?php
class Student extends connection 
{
	var $sname,$course,$fee,$e_mail,$phone,$alt_phone,$username,$password,$admission_date,$student_img,$sid;
	function addrecord()
	{
		$this->Query = "insert into ".Student." set sname = '$this->sname',scourse = '$this->course',fee = '$this->fee',e_mail = '$this->e_mail',phone = '$this->phone',alt_phone = '$this->alt_phone',username = '$this->username',password = '$this->password',admission_date = '$this->admission_date',student_img = '$this->student_img'";
		//print_r($this->Query );exit;
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
		$this->Query = "select * from ".Student." order by sname";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
	} 
	
	function deletedata($sid)
	{
		
		$this->Query = "DELETE FROM ".Student." WHERE sid = $sid";
		if($this->ExecuteQuery())
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	function FetchData($sid)
	{
		$this->Query = "SELECT * FROM ".admission_form." WHERE sid= $sid";
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
	function editdata($sid)
	{
		$this->Query = "update ".Student." set sname='$this->sname',scourse='$this->course',fee='$this->fee',e_mail='$this->e_mail',phone='$this->phone',alt_phone='$this->alt_phone',username ='$this->username',password='$this->password',student_img='$this->student_img' where sid =$sid";
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
	function student_login($username,$password)
	{
		$this->Query = "select * from ".Student." where username='$username' AND password='$password'" ;
		
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