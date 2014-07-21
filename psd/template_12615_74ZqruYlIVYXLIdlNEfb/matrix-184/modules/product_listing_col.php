<?php
/*
  $Id: product_listing_col.php,v 1.1.1.1 2004/03/04 23:41:11 ccwjr Exp $
*/

  $listing_split = new splitPageResults($listing_sql, MAX_DISPLAY_SEARCH_RESULTS, 'p.products_id');

  if ( ($listing_split->number_of_rows > 0) && ( (PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3') ) ) {
?>
<?php
  }
  $rc= 0;
echo ' <table width=100% cellspacing=0 cellpadding=0 width=100% border=0 class=cm1>
<tr><td height=1px></td></tr>
         <tr><td>
         <table width=100% cellspacing=0 cellpadding=0 border=0>
          ';

  $list_box_contents = array();

  if ($listing_split->number_of_rows > 0) {
    $listing_query = tep_db_query($listing_split->sql_query);

    $row = 0;
    $column = 0;
    $colums=0;
    while ($listing = tep_db_fetch_array($listing_query)) {

      $product_contents = array();

      for ($col=0, $n=sizeof($column_list); $col<$n; $col++) {
        $lc_align = '';

        switch ($column_list[$col]) {
          case 'PRODUCT_LIST_MODEL':
            $lc_align = '';
            $lc_text = '&nbsp;' . $listing['products_model'] . '&nbsp;';
            break;
          case 'PRODUCT_LIST_NAME':
            $lc_align = '';
            $lc_text = '&nbsp;<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, ($cPath ? 'cPath=' . $cPath . '&' : '') . 'products_id=' . $listing['products_id']) . '">' . $listing['products_name'] . '</a>&nbsp;';
            break;
          case 'PRODUCT_LIST_MANUFACTURER':
            $lc_align = '';
            $lc_text = '&nbsp;<a href="' . tep_href_link(FILENAME_DEFAULT, 'manufacturers_id=' . $listing['manufacturers_id']) . '">' . $listing['manufacturers_name'] . '</a>&nbsp;';
            break;
          case 'PRODUCT_LIST_PRICE':
            $lc_align = 'right';
            if (tep_get_products_special_price($listing['products_id'])) {
              $lc_text = '&nbsp;<s>' .  $currencies->display_price($listing['products_price'], tep_get_tax_rate($listing['products_tax_class_id'])) . '</s>&nbsp;&nbsp;<span class="productSpecialPrice">' . $currencies->display_price(tep_get_products_special_price($listing['products_id']), tep_get_tax_rate($listing['products_tax_class_id'])) . '</span>&nbsp;';

            } else {
              $lc_text = '&nbsp;' . $currencies->display_price($listing['products_price'], tep_get_tax_rate($listing['products_tax_class_id'])) . '&nbsp;';
            }
            break;
          case 'PRODUCT_LIST_QUANTITY':
            $lc_align = 'right';
            $lc_text = '&nbsp;' . $listing['products_quantity'] . '&nbsp;';
            break;
          case 'PRODUCT_LIST_WEIGHT':
            $lc_align = 'right';
            $lc_text = '&nbsp;' . $listing['products_weight'] . '&nbsp;';
            break;
          case 'PRODUCT_LIST_IMAGE':
            $lc_align = 'center';
            if (isset($HTTP_GET_VARS['manufacturers_id'])) {
              $lc_text = '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'manufacturers_id=' . $HTTP_GET_VARS['manufacturers_id'] . '&products_id=' . $listing['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $listing['products_image'], $listing['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a>';
            } else {
              $lc_text = '&nbsp;<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, ($cPath ? 'cPath=' . $cPath . '&' : '') . 'products_id=' . $listing['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $listing['products_image'], $listing['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a>&nbsp;';
            }
            break;
          case 'PRODUCT_LIST_BUY_NOW':
            $lc_align = 'center';
            $lc_text = '<a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $listing['products_id']) . '">' . tep_template_image_button('button_buy_now.gif', IMAGE_BUTTON_BUY_NOW) . '</a>&nbsp;';
            break;
        }
        $product_contents[] = $lc_text;

      }
      $lc_text = implode('<br>', $product_contents);
      $list_box_contents[$row][$column] = array('align' => 'center',
                                                'params' => 'class="productListing-data"',
                                                'text'  => $lc_text);

  $product_listing_query_description = tep_db_query("select products_description  from " . TABLE_PRODUCTS_DESCRIPTION . " where products_id = '" . (int)$listing['products_id'] . "' and language_id = '" . (int)$languages_id . "'");

  $product_listing_description = tep_db_fetch_array($product_listing_query_description);


$rc++;		
								
  $r_name = substr($listing['products_name'], 0, 25);
  $r_link = tep_href_link(FILENAME_PRODUCT_INFO, ($cPath ? 'cPath=' . $cPath . '&' : '') . 'products_id=' . $listing['products_id']);
  $r_pic = tep_image(DIR_WS_IMAGES . $listing['products_image'], $listing['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, '');

  $r_desc =substr($product_listing_description['products_description'], 0, 70);
  $r_buy = tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $listing['products_id']);
  $r_view = tep_href_link('product_info.php','products_id=' . $listing['products_id']);
  
echo '<td style="width:198px;">

<table border="0" cellpadding="0" cellspacing="0" style="width:187px;">
													<tr><td><img src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="1" height="11"></td></tr>
													<tr><td><center><a href="'.$r_link.'">'.$r_pic.'</a></center>
														<br style="line-height:5px;">
														<strong><center>'.$r_name.'</strong><br><br style="line-height:23px;"></center>
														<b><div class="deep_price"><center>'.$product_contents[2].'</div></center></b>
													</td></tr>
													<tr><td><img src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/dot_cen.jpg" style="margin:9px 0 11px 0;"></td></tr>
													<tr><td class="deep_x">'.$r_desc.'...</td></tr>
													<tr><td><img src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/dot_cen.jpg" style="margin:9px 0 11px 0;"></td></tr>
													<tr><td><a href="'.$r_view.'" style="margin-left:15px;">' . tep_image_button('small_view.gif') . '</a><a href="'.$r_buy.'" style="margin-left:6px;">' .tep_image_button('button_in_cart.gif').'</a></td></tr>
													<tr><td><center><img src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="1" height="16"></td></center></tr>
												</table>


</td>';
      $colums++;
    if ($colums > (COLUMN_COUNT-1)) {
      $colums = 0;

	 echo '
         </tr>
		 <tr><td colspan='.$rc.' class="outline3" ><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif"></td></tr> 
         <tr>';

    } else {echo '<td width=13 class="outline2" ><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="13" height="1"></td>'; $rc++;}





      $column ++;
      if ($column >= COLUMN_COUNT) {
        $row ++;
        $column = 0;
      }
    }

//    new productListingBox($list_box_contents);
  } else {
    $list_box_contents = array();

    $list_box_contents[0] = array('params' => 'class="productListing-odd"');
    $list_box_contents[0][] = array('params' => 'class="productListing-data"',
                                   'text' => TEXT_NO_PRODUCTS);

//    new productListingBox($list_box_contents);
  }


  echo '
  </tr>
</table>
</td></tr></table>
';


  if ( ($listing_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3')) ) {
?>
<table border="0" width="100%" cellspacing="0" cellpadding="0" style="padding-right: 10px; padding-left: 10px;">
  <tr><td height=3></td></tr>
  <tr>
    <td class="smallText"><?php echo $listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?></td>
    <td class="smallText" align="right"><div align="right"><?php echo TEXT_RESULT_PAGE . ' ' . $listing_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></div>    </td>
  </tr>
</table>
<?php
  }
?>
