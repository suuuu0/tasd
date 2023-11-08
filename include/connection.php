<?php
class Connection
{
	var $Recordset, $Query;
	var $PageSize=0, $AllowPaging=false, $PageNo, $TotalRecords=0,$TotalPages=0;
	
	public static $con;
	
	function __Construct()
	{
		//print_r($DataBase);
		global $HostName, $UserName, $Password, $DataBase;
		$HostName = "localhost";
		$DataBase = "mentor_db";
		$UserName = "root";
		$Password = "";
		if($con = mysql_connect($HostName,$UserName,$Password,$DataBase))
		{
			Connection::$con = $con;
			/*if(!mysql_select_db($DataBase))
			{
				$ParameterArray = array("Host" => $HostName, 
										"User" => $UserName, 
										"Password" => $Password,
										"DataBase" =>$DataBase);
			
				$this->SendErrorMail(ERROR_EMAIL,mysql_error(),$ParameterArray);
				die(ERROR_MESSAGE);
			}*/
		}
		else 
		{
			$ParameterArray = array("Host" => $HostName, 
									"User" => $UserName, 
									"Password" => $Password,
									"DataBase" =>$DataBase);
			
			$this->SendErrorMail(ERROR_EMAIL,mysql_error(),$ParameterArray);
			die(ERROR_MESSAGE);
		}
	}
	
	function ExecuteQuery()
	{
		
		if ($this->Recordset = mysql_query($this->Query)) 
		{
			if($this->AllowPaging and $this->PageSize > 0 and $this->GetNumRows() > 0)
			{
				$this->TotalRecords = $this->GetNumRows();
				$this->TotalPages = intval($this->TotalRecords/$this->PageSize);
				
				$this->TotalPages = ($this->TotalRecords%$this->PageSize) > 0 ? $this->TotalPages+1:$this->TotalPages;
				$this->PageNo = (empty($this->PageNo) or $this->PageNo==0) ? 1:$this->PageNo;
				$this->Query .= " LIMIT ".($this->PageNo-1)*$this->PageSize.",".$this->PageSize;
				if ($this->Recordset = mysql_query($this->Query)) 
					return true;		
				else 
				{
					$ParameterArray = array("Query" => $Query,
											"FunctionName"=>"ExecuteQuery");
					$this->SendErrorMail(ERROR_EMAIL,mysql_error(),$ParameterArray);
					die(ERROR_MESSAGE);
				}
			}
			else
				return true;
		}
		else 
		{
			//var_dump($Query);
			//exit;
			$ParameterArray = array("Query" => $this->Query,
									"FunctionName"=>"ExecuteQuery");			
			
			$this->SendErrorMail(ERROR_EMAIL,mysql_error(),$ParameterArray);
			die(ERROR_MESSAGE);
		}
	}
	
	
	function GetPagingLinks($URL,$PagingFormat,$LinkClass="LinkCl",$PrefixText="")
	{
		
		$Text = "";
		$CurrentPageNo = $this->PageNo;
		
		$CurrentPageNo = (empty($CurrentPageNo) or $CurrentPageNo == 0) ? 1:$CurrentPageNo;
		if($this->AllowPaging and $this->PageSize > 0 and $this->GetNumRows() > 0 and $this->TotalPages > 1)
		{
			$Text .= $PrefixText;
			if($PagingFormat==PAGING_FORMAT_PREVNEXT)
			{
				for ($i=1; $i<=$this->TotalPages;$i++)
				{
					if($i == 1)
					{
						if($CurrentPageNo == 1)
							$Text .= "";
						else 
							$Text .= " <a href='$URL".($CurrentPageNo-1)."' class='$LinkClass'>&laquo;&nbsp;Prev</a>&nbsp;";
						//$Text .= "<select name='ddlPager' onChange='document.location.href = value'>";
					}
					
					//$Text .= "<option value='$URL$i'".($i==$CurrentPageNo ? " selected":"").">$i</option>";
					if($i == $this->TotalPages)
					{
						$Text .= "</select>";
						if($CurrentPageNo == $this->TotalPages)
							$Text .= "&nbsp;Next&nbsp;&raquo;";
						else 
							$Text .= "&nbsp;<a href='$URL".($CurrentPageNo+1)."' class='$LinkClass'></a>";
					}
					
				}
			}
			else 
			{
				$Text.="<font color='#ffffff'><b>Pages</b></font>&nbsp";
				for ($i=1; $i<= $this->TotalPages;$i++)
				{
					if($i == $CurrentPageNo)
						$Text .= "<font color='gray'>$i | </font>";
					else 
						$Text .= "<a href='$URL$i' class='$LinkClass'><b> $i </b></a> | ";
				}
				$Text = substr($Text, 0, strlen($Text)-2);
			}
		}
		return $Text;
	}
	
	function GetObjectFromRecordset()
	{
		if($this->Recordset)
		{
			if(mysql_num_rows($this->Recordset)>0)
			{
				return mysqli_fetch_object($this->Recordset);
			}
			return false;
		}
		else 
		{
			$ParameterArray = array("Query" => $this->Query, 
									"FunctionName"=>"GetObjectFromRecord");
			$this->SendErrorMail(ERROR_EMAIL,mysql_error(),$ParameterArray);
			die(ERROR_MESSAGE);
		}
	}
	
	function GetArrayFromRecord()
	{
		if ($this->Recordset) 
		{
			if (mysql_num_rows($this->Recordset)>0) 
			{
				return mysqli_fetch_array($this->Recordset);	
			}
			else 
			{
				$ParameterArray = array("Query" => $this->Query, 
										"FunctionName"=>"GetArrayFromRecord");
				$this->SendErrorMail(ERROR_EMAIL,mysql_error(),$ParameterArray);
				die(ERROR_MESSAGE);
			}
		}
	}
	
	function GetNumRows()
	{
		if($this->Recordset)
		{
			return mysql_num_rows($this->Recordset);
		}
		else 
		{
			$ParameterArray = array("Query" => $this->Query, 
									"FunctionName"=>"GetNumRows");
			$this->SendErrorMail(ERROR_EMAIL,mysql_error(),$ParameterArray);
			die(ERROR_MESSAGE);
		}
	}
	
	function SendErrorMail($EmailAddress,$MySQLError,$SupportParms)
	{
		echo "<font color='Maroon'>$MySQLError</font><br>";
		$Body = "".$_SERVER['PHP_SELF']."<br><br>".SITE_NAME."<br><br>".$_SERVER['REMOTE_ADDR']."<br><br>Session Variables start here :";
		
		foreach($_SESSION as $key => $value) 
		{
			$Body .= $key."===========".$value."<br>"; 	
		}

		$Body .= "<br>Session variables end here<br><br>";

		/*foreach ($SupportParms as $key => $value) 
		{
			$Body .= $key."===========".$value."<br>"; 	
		}*/
		echo $Body;exit;
		//if(!SendEmail($MySQLError,ERROR_EMAIL,ADMIN_EMAIL,SITE_NAME,$Body))
		//	echo $Body."<br><br>".$MySQLError;
	}
};

function CategoryChain4Caption($CatID,$LinkPath,$Parm="cID",$LinkClass="",$ActiveOnly=true,$ExtraParm="",$Encoded=true,$Title="")
{
	$CategoryObj = new category();
	if(!empty($CatID))
	{
		if(is_object($CurrentCategory = $CategoryObj->GetCategoryByCategoryID($CatID,$ActiveOnly)))
		{
			$Title="<a class='$LinkClass' href='".$LinkPath."?".$Parm."=".($Encoded ? EncodeString($CatID):$CatID).$ExtraParm."'><b>".ucwords($CurrentCategory->categoryName)."</b></a>&nbsp;&raquo;&nbsp;".$Title;
			CategoryChain4Caption($CurrentCategory->parentid,$LinkPath,$Parm,$LinkClass,$ActiveOnly,$ExtraParm,$Encoded,$Title);	
		}
		return;
	}
	else 
	{
		print($Title);
	}
}

function mysql_connect($HostName,$UserName,$Password,$DataBase){
	return mysqli_connect($HostName,$UserName,$Password,$DataBase);
}

function mysql_query($query){
	return mysqli_query(Connection::$con, $query);
}

function mysql_num_rows($result){
	return mysqli_num_rows($result);
}

function mysql_fetch_object($result){
	return mysqli_fetch_object($result);
}
function mysql_fetch_array($result){
	return mysqli_fetch_array($result);
}
function mysql_error()
{
	return mysqli_error(Connection::$con);
}

?>
