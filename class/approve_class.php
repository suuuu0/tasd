<?php
class appr extends connection
{ 
   
function fetchdata($student_id)

	{
		//print_r("$student_id");exit;
		$this->Query= "SELECT * FROM ".admission_form." WHERE adid= $student_id";
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