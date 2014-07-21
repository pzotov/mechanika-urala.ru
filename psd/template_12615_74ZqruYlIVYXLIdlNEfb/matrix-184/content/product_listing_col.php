<?php
/*
  $Id: product_listing_col.php,v 1.1.1.1 2004/03/04 23:41:11 ccwjr Exp $
*/

  $listing_split = new splitPageResults($listing_sql, MAX_DISPLAY_SEARCH_RESULTS, 'p.products_id');

  if ( ($listing_split->number_of_rows > 0) && ( (PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3') ) ) {
?>
<?php
  }
echo ' <table cellspacing=0 cellpadding=0 width=100% border=0>
         <tr><td>
         <table cellspacing=0 cellpadding=0 border=0>
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

/*
echo '

		  <td width="50%" height="162" align="center" style="padding:7px 0px 0px 0px; "><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, ($cPath ? 'cPath=' . $cPath . '&' : '') . 'products_id=' . $listing['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $listing['products_image'], $listing['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a><br>
		 <br style="line-height:5px;">
		 <div style="margin:0 10 0 10px"><span class=pn><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, ($cPath ? 'cPath=' . $cPath . '&' : '') . 'products_id=' . $listing['products_id']) . '"><u>' .substr($listing['products_name'], 0, 50). '</u></a></span>|<span class=pn2>'.$currencies->display_price($listing['products_price'], tep_get_tax_rate($listing['products_tax_class_id'])).'</span></div>
			
			<table cellpadding="0" cellspacing="0" border="0" style="border-top:25px solid #ffffff;">
			 <tr>
			 <td width="40%"><img src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="11" height="1" alt=""></td>
			 <td><a href="' . tep_href_link('product_info.php','products_id=' . $listing['products_id']) . '">' . tep_image_button('small_view.gif') . '</a></td>
			 <td width="1%"><img src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="1" height="1" alt=""></td>
			 <td><a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $listing['products_id']) . '">' .tep_image_button('button_in_cart.gif').'</a></td>
			 <td width="20%"><img src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="10" height="1" alt=""></td>
			</tr>
		   </table>
		</td>
';*/
echo '<td style="width:193px;"><table border="0" cellpadding="0" cellspacing="0" style="width:187px;">
													<tr>
														<td style="height:15px;"><table border="0" cellpadding="0" cellspacing="0">
															<tr><td><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="1" height="7"></td></tr>
															<tr>
																<td><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="10" height="1"></td>
																<td style="width:104px;" class="h1">'.substr($products_new['products_name'], 0, 10).'</td>
																<td class="line1"><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="1" height="14"></td>
																<td><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="11" height="1"></td>
																<td class="h2">fgfdgsdfgsdfg'.$products_price.'</td>
															</tr>
														</table></td>
													</tr>
													<tr><td><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="1" height="7"></td></tr>
													<tr><td class="main_bbgr"><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="1" height="1"></td></tr>
													<tr><td><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="1" height="8"></td></tr>
													<tr>
														<td><table border="0" cellpadding="0" cellspacing="0">
															<tr>
																<td>
																<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, ($cPath ? 'cPath=' . $cPath . '&' : '') . 'products_id=' . $listing['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $listing['products_image'], $listing['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'style="margin-right:10px; margin-left:6px;"') . '</a></td>
																<td><table border="0" cellpadding="0" cellspacing="0">
																	<tr><td class="r4" height=58>
																		<ul>
																			<li><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $featured_products['products_id']) . '">'.substr($new_products_description['products_description'],0,30).'</a></li>
																		</ul>
																	</td></tr>
																	<tr><td style="padding:10px 0px 1px 0px"><a href="' . tep_href_link('product_info.php','products_id=' . $products_new['products_id']) . '">' . tep_image_button('small_view.gif') . '</a></td></tr>
																	<tr><td><a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $products_new['products_id']) . '">' .tep_image_button('button_in_cart.gif').'</a></td></tr>
																	<tr><td><img src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="1" height="10" alt=""></td></tr>
																</table></td>
															</tr>
														</table></td>
													</tr>
												</table></td>';

      $colums++;
    if ($colums > (COLUMN_COUNT-1)) {
      $colums = 0;

	echo '
         </tr> 
         <tr><td colspan=3 style="background:url('.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/bg_point_x.gif) left 1px repeat-x;" height=3><img src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="1" height="3" alt=""></td></tr>
         <tr>';

    } else echo '<td style="background:url('.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/bg_point_y.gif) center top repeat-y; "><img src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="3" height="1" alt=""></td>';





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
    <td class="smallText" align="right"><?php echo TEXT_RESULT_PAGE . ' ' . $listing_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></td>
  </tr>
</table>
<?php
  }
?>
