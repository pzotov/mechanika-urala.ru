<?php
/*
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License

  Featured Products V1.1
  Displays a list of featured products, selected from admin
  For use as an Infobox instead of the "New Products" Infobox
*/
?>
<!-- featured_products //-->
<?php
 if(FEATURED_PRODUCTS_DISPLAY == true)
 {
  $featured_products_category_id = $new_products_category_id;
  $cat_name_query = tep_db_query("select categories_name from categories_description where categories_id = '" . $featured_products_category_id . "' limit 1");
  $cat_name_fetch = tep_db_fetch_array($cat_name_query);
  $cat_name = $cat_name_fetch['categories_name'];
  $info_box_contents = array();

  if ( (!isset($featured_products_category_id)) || ($featured_products_category_id == '0') ) {
    $info_box_contents[] = array('align' => 'left', 'text' => TABLE_HEADING_FEATURED_PRODUCTS);
    $featured_products_query = tep_db_query("select p.products_id, p.products_image, p.products_tax_class_id, s.status as specstat, s.specials_new_products_price, p.products_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id left join " . TABLE_FEATURED . " f on p.products_id = f.products_id where p.products_status = '1' and f.status = '1' order by rand() DESC limit " . MAX_DISPLAY_FEATURED_PRODUCTS);
  } else {
    $info_box_contents[] = array('align' => 'left', 'text' => sprintf(TABLE_HEADING_FEATURED_PRODUCTS_CATEGORY, $cat_name));
    $featured_products_query = tep_db_query("select distinct p.products_id, p.products_image, p.products_tax_class_id, s.status as specstat, s.specials_new_products_price, p.products_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c left join " . TABLE_FEATURED . " f on p.products_id = f.products_id where p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and c.parent_id = '" . $featured_products_category_id . "' and p.products_status = '1' and f.status = '1' order by rand() DESC limit " . MAX_DISPLAY_FEATURED_PRODUCTS);
  }

  $row = 0;
  $col = 0;
  $num = 0;
  $colum=0;
  $rows = 0;
  while ($featured_products = tep_db_fetch_array($featured_products_query)) {
    $num ++; if ($num == 1) {
//new infoBoxHeading($info_box_contents, false, false);
$rc = 0;
echo ' <table cellspacing=0 cellpadding=0 width=100% border=0>
        <tr><td height=10px></td></tr>
		<tr><td>
         <table cellspacing=0 cellpadding=0 border=0 width=100%>
		 <tr>';
    }

  $featured_query_description = tep_db_query("select products_description  from " . TABLE_PRODUCTS_DESCRIPTION . " where products_id = '" . (int)$featured_products['products_id'] . "' and language_id = '" . (int)$languages_id . "'");

  $featured_description = tep_db_fetch_array($featured_query_description);
  $featured_products['products_name'] = tep_get_products_name($featured_products['products_id']);

  $cat_name_query = tep_db_query("select categories_id from products_to_categories where products_id = '" . (int)$featured_products['products_id'] . "' limit 1");
  $cat_id = tep_db_fetch_array($cat_name_query);
  $cat_name_query = tep_db_query("select categories_name from categories_description where categories_id  = '" . (int)$cat_id['categories_id'] . "' limit 1");
  $cat_name = tep_db_fetch_array($cat_name_query);
  $rc++;
  
  $r_name = substr($featured_products['products_name'], 0, 25);
  $r_link = tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $featured_products['products_id']);
  $r_pic = tep_image(DIR_WS_IMAGES . $featured_products['products_image'], $featured_products['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'align=top  style="margin-right:16px; float:left"');
  $r_price = $currencies->display_price($featured_products['products_price'], tep_get_tax_rate($featured_products['products_tax_class_id']));
  $r_desc = substr($featured_description['products_description'],0,70);
  $r_buy = tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $featured_products['products_id']);
  $r_view = tep_href_link('product_info.php','products_id=' . $featured_products['products_id']);
  
echo '<td style="width:198px;">

										<table border="0" cellpadding="0" cellspacing="0" style="width:187px;">
													<tr><td><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="1" height="11"></td></tr>
													<tr><td><a href="'.$r_link.'">'.$r_pic.'</a>
														<br style="line-height:5px;">
														<strong>'.$r_name.'</strong><br><br style="line-height:23px;">
														<b><div class="deep_price">'.$r_price.'</div></b>
													</td></tr>
													<tr><td><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/dot_cen.jpg" style="margin:9px 0 11px 0;"></td></tr>
													<tr><td class="deep_x">'.$r_desc.'...</td></tr>
													<tr><td><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/dot_cen.jpg" style="margin:9px 0 11px 0;"></td></tr>
													<tr><td><a href="'.$r_view.'" style="margin-left:15px;">' . tep_image_button('small_view.gif') . '</a><a href="'.$r_buy.'" style="margin-left:6px;">' .tep_image_button('button_in_cart.gif').'</a></td></tr>
													<tr><td><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="1" height="16"></td></tr>
												</table>
										
										
										
										</td>';

      $colum++;
    if ($colum > (COLUMN_COUNT-1)) {
      $colum = 0;
	  if ($row != 1)
	  {
	   echo '
         </tr>
		 <tr><td colspan='.$rc.' class="outline3" ><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif"></td></tr> 
         <tr>';
	  }
        

    } else {echo '<td width=13 class="outline2" ><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="13" height="1"></td>'; $rc++;}


    $col ++;
    if ($col > 2) {
      $col = 0;
      $row ++;
    }
  }

  if($num) {

//      new contentBox($info_box_contents);

  echo '
       </tr>
</table>
</td></tr>
</table>
';


  }
 } else // If it's disabled, then include the original New Products box
 {
   include (DIR_WS_MODULES . FILENAME_NEW_PRODUCTS);
 }

?>

<!-- featured_products_eof //-->
