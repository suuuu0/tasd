<?php
ob_start();
session_start();
	
//define('DTS_WS','http://dev.webcreationuk.com/gurbir/',true);
define('DTS_WS','http://localhost/');
define('DTS_WS_SITE',DTS_WS.'tasd/');

//print_r($_SERVER['DOCUMENT_ROOT']);exit;
//define('DTS_FS','d:/inetpub/wwwroot/dev.webcreationuk.com/gurbir',true);
define('DTS_FS',$_SERVER['DOCUMENT_ROOT']);
define('DTS_FS_SITE',DTS_FS.'/tasd/');

define('DTS_WS_SITE_ADMINPAGES',DTS_WS_SITE.'websitecontrolpanel/');
define('DTS_WS_SITE_CLASS',DTS_WS_SITE.'class/');
define('DTS_WS_SITE_INCLUDES',DTS_WS_SITE.'include/');
define('DTS_WS_SITE_UPLODE',DTS_WS_SITE.'upload_img/');
define('DTS_WS_SITE_WEB_ASSETS',DTS_WS_SITE.'assets/');
define('DTS_WS_SITE_IMG',DTS_WS_SITE_WEB_ASSETS.'img/');
define('DTS_WS_SITE_WEB_VENDOR',DTS_WS_SITE_WEB_ASSETS.'vendor/');
define('DTS_WS_SITE_WEBSITEPAGES',DTS_WS_SITE.'websitepages/');
define('DTS_WS_SITE_JAVASCRIPT',DTS_WS_SITE_WEB_ASSETS.'js/');


define('DTS_FS_SITE_ADMINPAGES',DTS_FS_SITE.'websitecontrolpanel/');
define('DTS_FS_SITE_CLASS',DTS_FS_SITE.'class/');
define('DTS_FS_SITE_INCLUDES',DTS_FS_SITE.'include/');
define('DTS_FS_SITE_WEB_ASSETS',DTS_FS_SITE.'assets/');
define('DTS_FS_SITE_WEBSITEPAGES',DTS_FS_SITE.'websitepages/');
define('DTS_FS_SITE_JAVASCRIPT',DTS_FS_SITE_WEB_ASSETS.'js/');


define("PAGING_FORMAT_NUMBERED","Numbered");
define("PAGING_FORMAT_PREVNEXT","PrevNext");


define('Login','admin_login');
define('Course','course');
define('Student','student');
define('Trainer','trainer');
define('Page','page');
define('Event','event_data');
define('Review','review');
define('admission_form','admission_form');

//Email address
define("EMAIL_ORDERS_ADMIN","himanshusaini26112002@gmail.com");
define("BCC","himanshusaini26112002@gmail.com");
define("EMAIL_CONTACTIS_ADNIN","himanshusaini26112002@gmail.com");
define("EMAIL_ADMIN_FROM_NAME","MENTOR WEBSITE");
define("ERROR_EMAIL","himanshusaini26112002@gmail.com");

//////////////Currency////////////////
define("SITE_CURRENCY","&pound;");
define("MESSAGE_COLOR","#eb0a0a");


////////////Front End Color //////////////////////

define("SITE_NAME","MENTOR");
define("SHOP_ADDDRESS","MENTOR<br>");
define("PAGES_TITLE","MENTOR");



require(DTS_FS_SITE_INCLUDES.'connection.php');
require(DTS_FS_SITE_INCLUDES.'Utility.php');
require(DTS_FS_SITE_INCLUDES.'sitemessage.php');

require_once(DTS_FS_SITE_CLASS.'login_class.php');
require_once(DTS_FS_SITE_CLASS.'course_class.php');
require_once(DTS_FS_SITE_CLASS.'trainers_class.php');
require_once(DTS_FS_SITE_CLASS.'page_class.php');
require_once(DTS_FS_SITE_CLASS.'student_class.php');
require_once(DTS_FS_SITE_CLASS.'event_class.php');
require_once(DTS_FS_SITE_CLASS.'review_class.php');
require_once(DTS_FS_SITE_CLASS.'admission_class.php');
require_once(DTS_FS_SITE_CLASS.'approve_class.php');
$obj_login = new Login();
$obj_course = new Course();
$obj_page = new Page();
$obj_trainer = new Trainer();
$obj_student = new Student();
$obj_event = new Event();
$obj_review = new review();
$obj_admission = new Admission();
$obj_appr = new appr();
///////////////////Site Colors//////////////////

/////////////Admin Panel////////////////////




 
$DayArrays =array(
					  1=>"Mon",
					  2=>"Tue",
					  3=>"Wed",
					  4=>"Thu",
					  5=>"Fri",
					  6=>"Sat",
					  7=>"Sun"
					 );
	$MonthArrays =array(1=>"January",
					  2=>"Februry",
					  3=>"March",
					  4=>"April",
					  5=>"May",
					  6=>"June",
					  7=>"July",
					  8=>"August",
					  9=>"September",
					  10=>"October",
					  11=>"November",
					  12=>"December"
					 );



?>

