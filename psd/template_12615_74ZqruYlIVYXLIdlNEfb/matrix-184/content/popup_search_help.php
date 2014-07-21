<?php
/*
  $Id: popup_search_help.php,v 1.1.1.1 2004/03/04 23:38:02 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
error_reporting(0);
  require("../../../includes/configure.php");
  require("../../../includes/filenames.php");
     require('../../../' . DIR_WS_FUNCTIONS . 'database.php');
    require('../../../' . DIR_WS_FUNCTIONS . 'html_output.php');
    require('../../../' . DIR_WS_INCLUDES . 'database_tables.php');
	define('HTML_PARAMS','dir="LTR" lang="en"');
	
	
      define('DIR_WS_CATALOG', DIR_WS_HTTP_CATALOG);
	
	

//require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_ADVANCED_SEARCH);
require('../../../'.DIR_WS_LANGUAGES . 'english/' . FILENAME_ADVANCED_SEARCH);
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<title><?php echo STORE_NAME; ?></title>
<link rel="stylesheet" type="text/css" href="<? echo TEMPLATE_STYLE;?>">
</head>

<style type="text/css">
body {margin:0; padding:0; background:#FFFFFF;}
form {margin:0; padding:0}

td, tr {font:11px/14px tahoma, arial, helvetica, sans-serif; vertical-align:top;  text-align:left;}
.ins{ padding:91px 0 0 114px;}
.ins a{ color:#505050; font-size:11px; text-decoration:none}
.ins a:hover{ color:#505050; font-size:11px; text-decoration:underline}
.dd1{ padding:24px 0 13px 21px;}
.dd1{ color:#7A7A7A;}
.dd1 strong{ color:#7A7A7A;}
.dd1 b{ color:#2B2B2B; font-size:10px; text-transform:uppercase;}
.cc1{ color:#505050; padding:0 0 10px 21px}

</style>
<body>
<?php
/*
  $info_box_contents = array();
  $info_box_contents[] = array('text' =>   HEADING_SEARCH_HELP );

  new infoBoxHeading($info_box_contents, false, false);

  $info_box_contents = array();
  $info_box_contents[] = array('text' => TEXT_SEARCH_HELP);

  new infoBox($info_box_contents);
  $info_box_contents = array();
    $info_box_contents[] = array('align' => 'left',
                                  'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
                                );
    new infoBoxFooter($info_box_contents, false, false);
	*/
?>

</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" align="center" width="385" style="margin-top:14px;">
<tr>
	<td><table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td><img alt=""  src="<?=DIR_WS_TEMPLATES?>/matrix-184/images/logo1.jpg"></td>
			<td class="ins"><a href="#"  onclick="window.close()">[  close window  ]</a></td>
		</tr>
	</table></td>
</tr>
<tr>
	<td class="dd1 ins">
		<b><?php echo HEADING_SEARCH_HELP; ?></b><br><br style="line-height:13px;">

		<?php echo TEXT_SEARCH_HELP; ?>
		<br><br style="line-height:15px;">
		
		<a href="#"  onclick="window.close()" style="margin-left:271px;">[  close window  ]</a>
	</td>
</tr>

</table>



</body>
</html>
<?php
 //require('includes/application_bottom.php');
?>
