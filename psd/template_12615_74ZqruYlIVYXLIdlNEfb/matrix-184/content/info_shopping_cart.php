<?

/*
  $Id: info_shopping_cart.php,v 1.1.1.1 2004/03/04 23:37:59 ccwjr Exp $

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

    tep_db_connect() or die('Unable to connect to database server!');

    $configuration_query = tep_db_query('select configuration_key as cfgKey, configuration_value as cfgValue from ' . TABLE_CONFIGURATION);

    while ($configuration = tep_db_fetch_array($configuration_query)) {
     define($configuration['cfgKey'], $configuration['cfgValue']);
    }

    include('../../../' . DIR_WS_CLASSES . 'language.php');
    $lng = new language();

    if (isset($HTTP_GET_VARS['language']) && tep_not_null($HTTP_GET_VARS['language'])) {
      $lng->set_language($HTTP_GET_VARS['language']);
    } else {
      $lng->get_browser_language();
    }

    $language = $lng->language['directory'];
    $languages_id = $lng->language['id'];
              
    if ($request_type == 'NONSSL') {
      define('DIR_WS_CATALOG', DIR_WS_HTTP_CATALOG);
    } else {
      define('DIR_WS_CATALOG', DIR_WS_HTTPS_CATALOG);
    }

    require('../../../' . DIR_WS_LANGUAGES . $language . '/' . FILENAME_INFO_SHOPPING_CART);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo STORE_NAME; ?></title>
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
</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" align="center" width="385" style="margin-top:14px;">
<tr>
	<td><table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td><img alt=""  src="../images/logo1.jpg"></td>
			<td class="ins"><a href="#"  onclick="window.close()">[  close window  ]</a></td>
		</tr>
	</table></td>
</tr>
<tr>
	<td class="dd1 ins">
		<b><?php echo HEADING_TITLE; ?></b><br><br style="line-height:13px;">
		<strong><?php echo SUB_HEADING_TITLE_1; ?></strong><br><br style="line-height:2px;">
		<?php echo SUB_HEADING_TEXT_1; ?>  
		<br><br style="line-height:15px;">
		<strong><?php echo SUB_HEADING_TITLE_2; ?></strong><br><br style="line-height:2px;">
		<?php echo SUB_HEADING_TEXT_2; ?> 
		<br><br style="line-height:15px;">
		<strong><?php echo SUB_HEADING_TITLE_3; ?></strong><br><br style="line-height:2px;">
		<?php echo SUB_HEADING_TEXT_3; ?> 
		<br><br style="line-height:15px;">
		<a href="#"  onclick="window.close()" style="margin-left:271px;">[  close window  ]</a>
	</td>
</tr>
<tr><td class="cc1">Copyright &copy; <?=STORE_NAME?>, <?=date('Y')?> All Rights Reserved</td></tr>
</table>
</body>
</html>

<?php


  function tep_not_null($value) {
    if (is_array($value)) {
      if (sizeof($value) > 0) {
        return true;
      } else {
        return false;
      }
    } else {
      if (($value != '') && (strtolower($value) != 'null') && (strlen(trim($value)) > 0)) {
        return true;
      } else {
        return false;
      }
    }
  }

  function tep_output_string($string, $translate = false, $protected = false) {
    if ($protected == true) {
      return htmlspecialchars($string);
    } else {
      if ($translate == false) {
        return tep_parse_input_field_data($string, array('"' => '&quot;'));
      } else {
        return tep_parse_input_field_data($string, $translate);
      }
    }
  }

  function tep_parse_input_field_data($data, $parse) {
    return strtr(trim($data), $parse);
  }

?>
