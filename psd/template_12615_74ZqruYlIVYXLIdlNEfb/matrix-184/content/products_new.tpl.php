<table border="0" width="100%" cellspacing="0" cellpadding="0">
<?php
// BOF: Lango Added for template MOD
if (SHOW_HEADING_TITLE_ORIGINAL == 'yes') {
//$header_text = '&nbsp;'
//EOF: Lango Added for template MOD
?>
<?php
}else{
$header_text =  HEADING_TITLE;
}
?>

<?php
  $products_new_array = array();
 // $products_new_query_raw = "select p.products_id, pd.products_name, products_date_available as date_expected from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where to_days(products_date_available) >= to_days(now()) and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by " . EXPECTED_PRODUCTS_FIELD . " " . EXPECTED_PRODUCTS_SORT ;
//  $products_new_query_raw = "select products_id, products_image, products_tax_class_id, products_price from " . TABLE_PRODUCTS . " where products_status = '1' order by products_date_added desc limit " . MAX_DISPLAY_NEW_PRODUCTS;

  $products_new_query_raw = "select p.products_id, pd.products_name, p.products_image, p.products_price, p.products_tax_class_id, p.products_date_added, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where  DATE_SUB(CURDATE(),INTERVAL " .NEW_PRODUCT_INTERVAL ." DAY) <= p.products_date_added and p.products_status = '1'  and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.products_date_added DESC, pd.products_name";
  $products_new_split = new splitPageResults($products_new_query_raw, MAX_DISPLAY_PRODUCTS_NEW);

  if (($products_new_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>

<?php
  }
?>
      <tr>
        <td>
<?php
// BOF: Lango Added for template MOD
if (MAIN_TABLE_BORDER == 'yes'){
table_image_border_top(false, false, $header_text);
}
// EOF: Lango Added for template MOD
?>
<?php
$rc = 0;
echo ' <table width=100% cellspacing=0 cellpadding=0 width=100% border=0>
<tr><td height=1px></td></tr>
        <tr><td>
         <table width=100% cellspacing=0 cellpadding=0 border=0 class=cm1>
          <tr>';


  if ($products_new_split->number_of_rows > 0) {
    $products_new_query = tep_db_query($products_new_split->sql_query);
    while ($products_new = tep_db_fetch_array($products_new_query)) {
      if ($new_price = tep_get_products_special_price($products_new['products_id'])) {
        $products_price = '<s>' . $currencies->display_price($products_new['products_price'], tep_get_tax_rate($products_new['products_tax_class_id'])) . '</s> <span class="productSpecialPrice">' . $currencies->display_price($new_price, tep_get_tax_rate($products_new['products_tax_class_id'])) . '</span>';
      } else {
        $products_price = $currencies->display_price($products_new['products_price'], tep_get_tax_rate($products_new['products_tax_class_id']));
      }
     $manufname = '';
       $manufacturers_query = tep_db_query("select manufacturers_name from " . TABLE_MANUFACTURERS ." where manufacturers_id ='" . $products_new['manufacturers_id'] . "' ");
      while ($manufacturers = tep_db_fetch_array($manufacturers_query)) {
              $manufname = $manufacturers['manufacturers_name']; 
            } 
     
?>

<?php


    $new_products_query_description = tep_db_query("select products_description  from " . TABLE_PRODUCTS_DESCRIPTION . " where products_id = '" . (int)$products_new['products_id'] . "' and language_id = '" . (int)$languages_id . "'");
    $new_products_description = tep_db_fetch_array($new_products_query_description);


  $cat_name_query = tep_db_query("select categories_id from products_to_categories where products_id = '" . (int)$products_new['products_id'] . "' limit 1");
  $cat_id = tep_db_fetch_array($cat_name_query);
  $cat_name_query = tep_db_query("select categories_name from categories_description where categories_id  = '" . (int)$cat_id['categories_id'] . "' limit 1");
  $cat_name = tep_db_fetch_array($cat_name_query);

										
$rc++;		
								
  $r_name = substr($products_new['products_name'], 0, 25);
  $r_link = tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products_new['products_id']);
  $r_pic = tep_image(DIR_WS_IMAGES . $products_new['products_image'], $products_new['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'align=top  style="margin-right:16px; float:left"');
  $r_price = $products_price;
  $r_desc =substr($new_products_description['products_description'], 0, 70);
  $r_buy = tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $products_new['products_id']);
  $r_view = tep_href_link('product_info.php','products_id=' . $products_new['products_id']);
  
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
    if ($colum >(COLUMN_COUNT-1)) {
      $colum = 0;
        echo '
         </tr>
		 <tr><td colspan='.$rc.' class="outline3" ><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif"></td></tr> 
         <tr>';

    } else {echo '<td width=13 class="outline2" ><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="13" height="1"></td>'; $rc++;}

                 




    }
  } else {
?>
          <tr>
            <td class="main"><?php echo TEXT_NO_NEW_PRODUCTS; ?></td>
          </tr>
          <tr>
            <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
          </tr>
<?php
  }
?>
  </tr>
 </table>
 </td></tr>
</table>
</td></tr>

<?php
// BOF: Lango Added for template MOD
if (MAIN_TABLE_BORDER == 'yes'){
table_image_border_bottom();
}
// EOF: Lango Added for template MOD
?>

<?php
  if (($products_new_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>
      <tr>
        <td><br /><table border="0" width="100%" cellspacing="0" cellpadding="0" style="PADDING-LEFT: 10px; padding-right: 10px">
          <tr>
            <td class="smallText"><?php echo $products_new_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS_NEW); ?></td>
            <td align="right" class="smallText"><?php echo TEXT_RESULT_PAGE . ' ' . $products_new_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></td>
          </tr>
          <tr><td height=8></td></tr>
        </table></td>
      </tr>
<?php
  }
?>
    </table>

