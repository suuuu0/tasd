<?php
class Admission extends connection
{ 
   
function fetchdata()
	{
		$this->Query= "SELECT * FROM ".admission_form." ";
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