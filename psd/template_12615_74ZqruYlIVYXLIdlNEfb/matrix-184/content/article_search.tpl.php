<?php
/*
  $Id: article_search.php
  by AlDaffodil:  aldaffodil@hotmail.com
  Allows you to search articles using article_manager v 1.0

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_ARTICLE_SEARCH);

  $akeywords = '';

    if (isset($HTTP_GET_VARS['akeywords'])) {
      $akeywords = $HTTP_GET_VARS['akeywords'];
    }
	
  $breadcrumb->add(NAVBAR_TITLE_1, tep_href_link(FILENAME_ADVANCED_SEARCH));
  $breadcrumb->add(NAVBAR_TITLE_2, tep_href_link(FILENAME_ADVANCED_SEARCH_RESULT, tep_get_all_get_params(), 'NONSSL', true, false));
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="<? echo TEMPLATE_STYLE;?>">
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<!-- header //-->
<?php require(DIR_WS_TEMPLATES . TEMPLATE_NAME .'/' . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="3" cellpadding="3">
  <tr>
    <td width="<?php echo BOX_WIDTH; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="0" cellpadding="2">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
<!-- left_navigation_eof //-->
    </table></td>
<!-- body_text //-->
    <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE_2; ?></td>
            <td class="pageHeading" align="right"><?php echo tep_image(DIR_WS_IMAGES . 'table_background_browse.gif', HEADING_TITLE_2, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td>
<?php
  if ($akeywords == ""){
?>  
    <table>
	  <tr>
	    <td class="main"><?php echo ERROR_INPUT; ?></td>
	  </tr>
	</table>
<?php
    } else {		 
	
  if (isset($HTTP_GET_VARS['description'])) {
    $search_query = tep_db_query("select ad.articles_name, a.articles_id, ad.articles_description from " . TABLE_ARTICLES_DESCRIPTION . " ad inner join " . TABLE_ARTICLES . " a on ad.articles_id = a.articles_id where a.articles_status = '1' and ad.language_id = '" . (int)$languages_id . "' and (ad.articles_name like '%" . $akeywords . "%' or ad.articles_description like '%" . $akeywords . "%' or ad.articles_head_desc_tag like '%" . $akeywords . "%' or ad.articles_head_keywords_tag like '%" . $akeywords . "%' or ad.articles_head_title_tag like '%" . $akeywords . "%') order by ad.articles_name ASC");
  }  else {
    $search_query = tep_db_query("select ad.articles_name, a.articles_id, ad.articles_description from " . TABLE_ARTICLES_DESCRIPTION . " ad inner join " . TABLE_ARTICLES . " a on ad.articles_id = a.articles_id where a.articles_status='1' and ad.language_id = '" . (int)$languages_id . "' and (ad.articles_name like '%" . $akeywords . "%' or ad.articles_head_desc_tag like '%" . $akeywords . "%' or ad.articles_head_keywords_tag like '%" . $akeywords . "%' or ad.articles_head_title_tag like '%" . $akeywords . "%') order by ad.articles_name ASC");
  }    
    $count=0;
?>
        <table>  
		  <tr>
            <td width="50%" height="100%" valign="top"><table border="0" width="100%" height="100%" cellspacing="1" cellpadding="2" class="infoBox">
              <tr class="infoBoxContents">
                <td><table border="0" width="100%" height="100%" cellspacing="0" cellpadding="0">
				  <tr>
	                <td valign="middle" align="center" width="33%"><font size= +1><b><?php echo TEXT_ARTICLE_NAME; ?></font></b></td>
	                <td valign="middle" align="center"><font size= +1><b><?php echo TEXT_ARTICLE_EXCERPT; ?></font></b></td>
	              </tr>

<?php		
    while($results = tep_db_fetch_array($search_query)){
	  $article_ex = substr($results['articles_description'], 0, 500);
	  
?>
				   <tr>
				    <td colspan="2"><hr color="#2E3E67" size="1"></td>
				   </tr>
	               <tr>
	                 <td class = "main" valign="top" align="center"><a href="<?php echo FILENAME_ARTICLE_INFO; ?>?articles_id=<?php echo $results['articles_id'] ?>"><b><u><?php echo $results['articles_name'] ?></b></u></a></td>
	                 <td class = "smallText" valign = "top">
					 <!--Article Start-->
					 <?=strip_tags($article_ex)?> ...
					 <!--Article End-->
					 </td>
		           </tr>

		  
<?php
    $count++;
	} 
	if ($count == 0){
?>	

	               	<tr>
				    <td colspan="2"><hr color="#2E3E67" size="1"></td>
				   </tr>
				   <tr>
		            <td class="main" colspan="2" align="center"><?php echo TEXT_NO_ARTICLES ?></td>
		           </tr>
<?php	
	}  
?>
                 </table></td>
			   </tr>
		    </table></td>
		</tr>			 		
	</table>				
<?php
  }
?>
        </td>
      </tr>
    </table></td>
<!-- body_text_eof //-->
    <td width="<?php echo BOX_WIDTH; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="0" cellpadding="2">
<!-- right_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_right.php'); ?>
<!-- right_navigation_eof //-->
    </table></td>
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_TEMPLATES . TEMPLATE_NAME .'/'. 'footer.php'); ?>
<!-- footer_eof //-->
<br>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
