<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<?php
if ( file_exists(DIR_WS_INCLUDES . 'header_tags.php') ) {
  require(DIR_WS_INCLUDES . 'header_tags.php');
} else {
?>
  <title><?php echo TITLE ?></title>
<?php
}
?>
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<link rel="stylesheet" type="text/css" href="<? echo TEMPLATE_STYLE;?>">
<?php

 if(isset($javascript))
  if(basename($javascript) == 'login.js')
   require(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/' . DIR_WS_JAVASCRIPT . basename($javascript)); 
  elseif(file_exists(DIR_WS_JAVASCRIPT . basename($javascript))) { 
   require(DIR_WS_JAVASCRIPT . basename($javascript)); 
 } 
 
?>
</head>
<body>
<table border="0" width="100%" cellspacing="0" cellpadding="0" height="100%" >
  <tr>
   <td style="background:url(<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/all_top.gif) top left repeat-x">
<!-- warnings //-->
<?php require(DIR_WS_INCLUDES . 'warnings.php'); ?>
<!-- warning_eof //-->
<!-- header //-->
<?php require(DIR_WS_TEMPLATES . TEMPLATE_NAME .'/header.php'); ?>
<!-- header_eof //-->
<!-- body //-->
<table border="0" width="100%" cellspacing="0" cellpadding="0" align=center>
  <tr>
<?php
if (DOWN_FOR_MAINTENANCE == 'true') {
  $maintenance_on_at_time_raw = tep_db_query("select last_modified from " . TABLE_CONFIGURATION . " WHERE configuration_key = 'DOWN_FOR_MAINTENANCE'");
  $maintenance_on_at_time= tep_db_fetch_array($maintenance_on_at_time_raw);
  define('TEXT_DATE_TIME', $maintenance_on_at_time['last_modified']);
}
?>
<?php
if (DISPLAY_COLUMN_LEFT == 'yes')  {
// WebMakers.com Added: Down for Maintenance
// Hide column_left.php if not to show
if (DOWN_FOR_MAINTENANCE =='false' || DOWN_FOR_MAINTENANCE_COLUMN_LEFT_OFF =='false') {
?>
    <td width="<?php echo BOX_WIDTH_LEFT; ?>" valign="top"  ><table border="0" width="<?php echo BOX_WIDTH_LEFT; ?>" cellspacing="0" cellpadding="0">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
<!-- left_navigation_eof //-->
    </table>
</td>
<?php
}
}
?>
<!-- content //-->
<td width="4px"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="4" height="1"></td>

    <td width="100%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="tab_linex_my" height="1px" width="15px"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td>
    <td class="tab_linex_my"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td>
    <td class="tab_linex_my" width="15px"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td  class="outline2"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td>
    <td valign="top">

<?php

if (isset($content_template) && file_exists(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/content/'.basename($content_template))) {
    require(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/content/'.basename($content_template));
  } else {
    require(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/content/'. $content . '.tpl.php');
  }  
?></td>
    <td class="outline"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/e1.jpg"></td>
    <td class="outline3"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td>
    <td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/e2.jpg"></td>
  </tr>
</table>
    </td><td width="4px"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="4" height="1"></td>

<!-- content_eof //-->
<?php
// WebMakers.com Added: Down for Maintenance
// Hide column_right.php if not to show
//  if (substr(basename($PHP_SELF), 0, 7) !='account') {
if (DISPLAY_COLUMN_RIGHT == 'yes')  {
if (DOWN_FOR_MAINTENANCE =='false' || DOWN_FOR_MAINTENANCE_COLUMN_RIGHT_OFF =='false') {
?>
<td width="<?php echo BOX_WIDTH_RIGHT; ?>" valign="top">

<table border="0" width="<?php echo BOX_WIDTH_RIGHT; ?>" cellspacing="0" cellpadding="0">
<!-- right_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_right.php'); ?>
<!-- right_navigation_eof //-->
    </table>
</td>
<?php
//}
}}
?>
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php
// WebMakers.com Added: Down for Maintenance
// Hide footer.php if not to show
if (DOWN_FOR_MAINTENANCE_FOOTER_OFF =='false') {
require(DIR_WS_INCLUDES . 'counter.php'); ?>


<!-- footer //-->
 <?php require(DIR_WS_TEMPLATES . TEMPLATE_NAME .'/footer.php'); ?>
<!-- footer_eof //-->

 <?php
  }
?>
 
<?php

// BOF: WebMakers.com Added: Center Shop Bottom of the tables are in footer.php
// EOF: WebMakers.com Added: Center Shop Bottom of the tables are in footer.php
?>
<!-- footer_eof //-->
 </td>
</tr>
</table>
</body>
</html>
