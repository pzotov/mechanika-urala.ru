<table border="0" width="100%" cellspacing="0" cellpadding="<?php echo CELLPADDING_SUB; ?>">
<?php
// BOF: Lango Added for template MOD
if (SHOW_HEADING_TITLE_ORIGINAL == 'yes') {
$header_text = '&nbsp;'
//EOF: Lango Added for template MOD
?>
      <tr>
        <td>
       <?php echo HEADING_TITLE; ?>
          </td>
      </tr>

<?php
// BOF: Lango Added for template MOD
}else{
$header_text = HEADING_TITLE;
}
// EOF: Lango Added for template MOD
?>
<?php
  $specials_query_raw = "select p.products_id, pd.products_name, p.products_price, p.products_tax_class_id, p.products_image, s.specials_new_products_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_SPECIALS . " s where p.products_status = '1' and s.products_id = p.products_id and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' and s.status = '1' order by s.specials_date_added DESC";
$specials_split = new splitPageResults($specials_query_raw, MAX_DISPLAY_SEARCH_RESULTS);
  if (($specials_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>
<?php
  }
?>
<?php
// BOF: Lango Added for template MOD
if (MAIN_TABLE_BORDER == 'yes'){
table_image_border_top(false, false, $header_text);
}
// EOF: Lango Added for template MOD
?>
      <tr>
        <td width=100%>
<?php
$rc = 0;
echo ' <table width=100% cellspacing=0 cellpadding=0 width=100% border=0>
<tr><td height=1px></td></tr>
        <tr><td>
         <table width=100% cellspacing=0 cellpadding=0 border=0 class=cm1>';



    $row = 0;
    $colum=0;
    $colums=0;
    $rows=0;

    $specials_query = tep_db_query($specials_split->sql_query);
    while ($specials = tep_db_fetch_array($specials_query)) {
      $row++;

    $specials_products_query_description = tep_db_query("select products_description  from " . TABLE_PRODUCTS_DESCRIPTION . " where products_id = '" . (int)$specials['products_id'] . "' and language_id = '" . (int)$languages_id . "'");
    $specials_products_description = tep_db_fetch_array($specials_products_query_description);

  $cat_name_query = tep_db_query("select categories_id from products_to_categories where products_id = '" . (int)$specials['products_id'] . "' limit 1");
  $cat_id = tep_db_fetch_array($cat_name_query);
  $cat_name_query = tep_db_query("select categories_name from categories_description where categories_id  = '" . (int)$cat_id['categories_id'] . "' limit 1");
  $cat_name = tep_db_fetch_array($cat_name_query);


$rc++;

  $r_name = substr($specials['products_name'], 0, 25);
  $r_link = tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $specials['products_id']);
  $r_pic = tep_image(DIR_WS_IMAGES . $specials['products_image'], $specials['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, '');
	$special_price = tep_get_products_special_price($specials['products_id']);
    if ($special_price) {
      $products_price = '<s>' .  $currencies->display_price($specials['products_price'], tep_get_tax_rate($new_products['products_tax_class_id'])) . '</s>&nbsp;&nbsp;<span class="productSpecialPrice">' . $currencies->display_price($special_price, tep_get_tax_rate($specials['products_tax_class_id'])) . '</span>';
    } else {
      $products_price = $currencies->display_price($specials['products_price'], tep_get_tax_rate($specials['products_tax_class_id']));
    }
  $r_desc = preg_replace('/\s\S*$/i', '', substr($specials_products_description['products_description'], 0, 70));
  $r_buy = tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $specials['products_id']);
  $r_view = tep_href_link('product_info.php','products_id=' . $specials['products_id']);
										
										
echo '<td style="width:198px;">

										<table border="0" cellpadding="0" cellspacing="0" style="width:187px;">
													<tr><td><img src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="1" height="11"></td></tr>
													<tr><td><center><a href="'.$r_link.'">'.$r_pic.'</a></center>
														<br style="line-height:5px;">
														<strong><center>'.$r_name.'</strong><br><br style="line-height:23px;"></center>
														<b><div class="deep_price"><center>'.$products_price.'</div></center></b>
													</td></tr>
													<tr><td><img src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/dot_cen.jpg" style="margin:9px 0 11px 0;"></td></tr>
													<tr><td class="deep_x">'.$r_desc.'...</td></tr>
													<tr><td><img src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/dot_cen.jpg" style="margin:9px 0 11px 0;"></td></tr>
													<tr><td><a href="'.$r_view.'" style="margin-left:15px;">' . tep_image_button('small_view.gif') . '</a><a href="'.$r_buy.'" style="margin-left:6px;">' .tep_image_button('button_in_cart.gif').'</a></td></tr>
													<tr><td><center><img src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="1" height="16"></td></center></tr>
												</table>
										
										
										
										</td>';

      $colum++;
    if ($colum > (COLUMN_COUNT-1)) {
      $colum = 0;
         echo '
         </tr>
		 <tr><td colspan='.$rc.' class="outline3" ><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif"></td></tr> 
         <tr>';

    } else {echo '<td width=13 class="outline2" ><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="13" height="1"></td>'; $rc++;}





   // Lango Added: for Salemaker Mod EOF  

    }
?>
       </tr>
     </table>
   </td>
  </tr>
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

  if (($specials_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>
      <tr>
        <td><br /><table border="0" width="100%" cellspacing="0" cellpadding="0" style="padding-left: 10px; padding-right: 10px;">
          <tr>
            <td class="smallText"><?php echo $specials_split->display_count(TEXT_DISPLAY_NUMBER_OF_SPECIALS); ?></td>
            <td align="right" class="smallText"><div align="right"><?php echo TEXT_RESULT_PAGE . ' ' . $specials_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></div>            </td>
          </tr>
          <tr><td height=10></td></tr>
        </table></td>
      </tr>
<?php
  }
?>
    </table>

