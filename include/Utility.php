<?php
#####################################################################
# File Name : Utility.php
# Author : Sachin Kumar
# EmailID's : sachink@neoventis.com
# Last Modify : 19 FEB 2007
#####################################################################
# This script defined the all function.
#####################################################################

#####################################################################
#Email Functions Start
#####################################################################
	
	function SendEnquiryMail($Name, $Email, $Enquiry)
	{
		$Subject = "$Name has submitted an enquiry on ".SITE_NAME;
		return SendEmail($Subject, ADMIN_EMAIL, $Email, $Name, $Enquiry, BCC_EMAIL);
	}
	function SendEmail($Subject,$ToEmail,$FromEmail,$FromName,$Message,$Bcc,$Format="html")
	{
			$headers  = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
   			$headers .= "From:$FromName <$FromEmail>\r\n"; 
            $headers .= "Reply-to:$FromEmail\r\n"; 
            $headers .= "Bcc:$Bcc\r\n"; 

			$headers .= "X-Mailer: PHP/" . phpversion() . "\n";
		    $headers .= "X-Priority: 1";

			if(mail($ToEmail,$Subject,$Message,$headers))
			{
              
				return true;
          	}
          	else 
          	{
			  return false;
			}
				
	}
	
	function EncodeString($String)
	{
		return base64_encode($String);
	}
	
	function DecodeString($String)
	{
		return base64_decode($String);
	}
	
	
	function ValidateEmail($email)
	{
	    $mail_pat = '^(.+)@(.+)$';
	    $valid_chars = "[^] \(\)<>@,;:\.\\\"\[]";
	    $valid_address = true;
	    $atom = "$valid_chars+";
	    $quoted_user='(\"[^\"]*\")';
	    $word = "($atom|$quoted_user)";
	    $user_pat = "^$word(\.$word)*$";
	    $ip_domain_pat='^\[([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})\]$';
	    $domain_pat = "^$atom(\.$atom)*$";
	
	    if (eregi($mail_pat, $email, $components)) 
	    {
	    	$user = $components[1];
	    	$domain = $components[2];
	      	// validate user
	      	if (eregi($user_pat, $user)) 
	      	{
	        	// validate domain
	        	if (eregi($ip_domain_pat, $domain, $ip_components)) 
	        	{
		        	// this is an IP address
		 	  		for ($i=1;$i<=4;$i++) 
		 	  		{
	      	    		if ($ip_components[$i] > 255) 
	      	    		{
	      	      			$valid_address = false;
	      	      			break;
	      	    		}
	          		}
	        	}
	        	else 
	        	{
	          		// Domain is a name, not an IP
	          		if (eregi($domain_pat, $domain)) 
	          		{
	            		/* domain name seems valid, but now make sure that it ends in a valid TLD or ccTLD
	               			and that there's a hostname preceding the domain or country. */
	            			$domain_components = explode(".", $domain);
	            		// Make sure there's a host name preceding the domain.
	            		if (sizeof($domain_components) < 2) 
	              			$valid_address = false;
	            		else 
	              			$top_level_domain = strtolower($domain_components[sizeof($domain_components)-1]);
	          		}
	          		else 
	      	    		$valid_address = false;
	      		}
	      	}
	      	else 
	       		$valid_address = false;
	    }
	    else 
	      $valid_address = false;
	    
	    //if (!checkdnsrr($domain, "MX") && !checkdnsrr($domain, "A")) 
	     //   $valid_address = false;
	    //if(getmxrr($domain, $mxhosts,$w) == FALSE && gethostbyname($domain) == $domain) 
	     //   $valid_address = false;
			
	    return $valid_address;
	}

	function authenticate()
	{
		header( 'WWW-Authenticate: Basic realm="Please enter the user information.."' ); 
	    header( 'HTTP/1.0 401 Unauthorized' ); 
	    echo "<H1>Authorization Required</H1>
				This server could not verify that you
				are authorized to access the document
				requested.  Either you supplied the wrong
				credentials (e.g., bad password), or your
				browser doesn't understand how to supply
				the credentials required.<P>
				<P>Additionally, a 404 Not Found
				error was encountered while trying to use an ErrorDocument to handle the request.
				<HR>
				<ADDRESS>Apache/1.3.33 Server at www.".SITE_NAME.".com Port 80</ADDRESS>"; 
	    exit; 
	}

	function sendToHost($host,$method,$path,$data,$useragent=0)
	{
	    // Supply a default method of GET if the one passed was empty
	    $buf="";
	    if (empty($method)) {
	        $method = 'GET';
	    }
	    $method = strtoupper($method);
	    $fp = fsockopen($host, 80);
	    if ($method == 'GET') {
	        $path .= '?' . $data;
	    }
	    fputs($fp, "$method $path HTTP/1.1\r\n");
	    fputs($fp, "Host: $host\r\n");
	    fputs($fp,"Content-type: application/x-www-form- urlencoded\r\n");
	    fputs($fp, "Content-length: " . strlen($data) . "\r\n");
	    if ($useragent) {
	        fputs($fp, "User-Agent: MSIE\r\n");
	    }
	    fputs($fp, "Connection: close\r\n\r\n");
	    if ($method == 'POST') {
	    	fputs($fp, $data);
	    }
		
	    while (!feof($fp)) {
	        $buf .= fgets($fp,128);
	    }
	    fclose($fp);
	    $buf = strstr($buf,"<html>");
	    return $buf;
	}
	
	function download_file($file)
	{
		if (!is_file($file)) 
		{
			 die("<b>404 File not found!</b>"); 
		}

		
			  //Gather relevent info about file
			$len = filesize($file);
			$filename = basename($file);
			$file_extension = strtolower(substr(strrchr($filename,"."),1));

			//This will set the Content-Type to the appropriate setting for the file
			switch( $file_extension )
				 {
 				case "pdf": $ctype="application/pdf"; break;
					case "exe": $ctype="application/octet-stream"; break;
					case "zip": $ctype="application/zip"; break;
					case "doc": $ctype="application/msword"; break;
					case "xls": $ctype="application/vnd.ms-excel"; break;
					case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
					case "gif": $ctype="image/gif"; break;
					case "png": $ctype="image/png"; break;
					case "jpeg":
					case "jpg": $ctype="image/jpg"; break;
					case "mp3": $ctype="audio/mpeg"; break;
					case "wav": $ctype="audio/x-wav"; break;
					case "mpeg":
					case "mpg":
					case "mpe": $ctype="video/mpeg"; break;
					case "mov": $ctype="video/quicktime"; break;	
					case "avi": $ctype="video/x-msvideo"; break;

					//The following are for extensions that shouldn't be downloaded (sensitive stuff, like php files)
					case "php":
					case "htm":
					case "html":
					case "txt":die("<b>Cannot be used for ". $file_extension ." files!</b>"); break; 

					default: $ctype="application/force-download";
				}
				ob_clean();
				//Begin writing headers
				header("Pragma: public");
				header("Expires: 0");
				header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
				header("Cache-Control: public"); 
				header("Content-Description: File Transfer");

				//Use the switch-generated Content-Type
				header("Content-Type: $ctype");

				//Force the download
				$header="Content-Disposition: attachment; filename=".$filename.";";
				header($header );
				header("Content-Transfer-Encoding: binary");
				header("Content-Length: ".$len);
				@readfile($file);
				exit;
		}
	
	function backupFile($backup_file,$MemberArray)
	{
	
		$fp = fopen($backup_file, "w");
		foreach ($MemberArray as $Value)
		     fputs($fp,$Value."\n");	
		
     fclose($fp);
	}
	
	function DeleteFullFolder($CurrentPath)
	{
		$dir = dir($CurrentPath);		
		while ($file = $dir->read()) 
		{
			if($file != '..' && $file !='.' && $file !='')
			{ 
				$CurrentDir = $CurrentPath."/".$file; 
				if(is_dir($CurrentDir))
				{
					DeleteFullFolder($CurrentDir);
				}
				if (is_file($CurrentDir))
				{
					unlink($CurrentDir);
				}
			}
		}
		$dir->close();
		rmdir($CurrentPath);
	}
	

function MyImplode($MyArray,$Glue="@@@")
{
	$TmpString ="";
	foreach($MyArray as $Key=>$Value)
		$TmpString .=$Key."=".$Value."@@@";
	
	return substr($TmpString,0,strlen($TmpString)-3);
}
function Myexplode($MyString,$Seprate="@@@")
{
	$MyArray=array();
	$ArrValue = explode($Seprate,$MyString);
	foreach($ArrValue as $Value)
	{
		$SubArray = split("=",$Value);
		$MyArray[$SubArray[0]]=$SubArray[1]; 
	}
	return $MyArray;	
}

function GetAbsolutePathReplace($MyString)
{
	$MyString = str_replace("<?=DIR_WS_SITE?>",DIR_WS_SITE,$MyString);
	return $MyString;	
}
function MyHtmlEntities($Str)
					{
						$MyStr = htmlentities(str_replace('"','&quot;',str_replace("'","&quot;",$Str)));
						//$MyStr = str_replace("\n","<br>",$MyStr);										
						$MyStr = str_replace(" ","&nbsp;",$MyStr);										
						//$MyStr = str_replace("\r","",$MyStr);										
						return $MyStr;
					} 	

/*
function encodeHTML($sHTML)
	{
	$sHTML=ereg_replace("&","&amp;",$sHTML);
	$sHTML=ereg_replace("<","&lt;",$sHTML);
	$sHTML=ereg_replace(">","&gt;",$sHTML);
	return $sHTML;
	*/
	
?>
