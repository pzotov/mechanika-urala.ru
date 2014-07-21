<?php echo tep_draw_form('cart_quantity', tep_href_link(FILENAME_PRODUCT_INFO, tep_get_all_get_params(array('action')) . 'action=add_product')); ?>
<table border="0" width="100%" cellspacing="0" cellpadding="<?php echo CELLPADDING_SUB;?>" class="rbg44">
<?php
  if ($product_check['total'] < 1) {
?>
      <tr>
        <td><?php new infoBox(array(array('text' => TEXT_PRODUCT_NOT_FOUND))); ?></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tr class="infoBoxContents">
            <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td align="right"><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_template_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>'; ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
<?php
  } else {
// BOF MaxiDVD: Modified For Ultimate Images Pack!
    $product_info_query = tep_db_query("select p.products_id, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, p.products_image_med, p.products_image_lrg, p.products_image_sm_1, p.products_image_xl_1, p.products_image_sm_2, p.products_image_xl_2, p.products_image_sm_3, p.products_image_xl_3, p.products_image_sm_4, p.products_image_xl_4, p.products_image_sm_5, p.products_image_xl_5, p.products_image_sm_6, p.products_image_xl_6, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'");
// EOF MaxiDVD: Modified For Ultimate Images Pack!
    $product_info = tep_db_fetch_array($product_info_query);

    tep_db_query("update " . TABLE_PRODUCTS_DESCRIPTION . " set products_viewed = products_viewed+1 where products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and language_id = '" . (int)$languages_id . "'");

    if (tep_not_null($product_info['products_model'])) {
      $products_name = $product_info['products_name'] . '<br><span class="smallText">[' . $product_info['products_model'] . ']</span>';
    } else {
      $products_name = $product_info['products_name'];
    }


    if ($new_price = tep_get_products_special_price($product_info['products_id'])) {
      $products_price = '<span class=ch20><s>' . $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) . '</s></span> <span class="ch9">' . $currencies->display_price($new_price, tep_get_tax_rate($product_info['products_tax_class_id'])) . '</span>';
    } else {
      $products_price ='<span class=ch11>'.$currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id'])).'</span>';
    }

// BOF: WebMakers.com Added: Show Featured Products
if (SHOW_HEADING_TITLE_ORIGINAL=='yes') {
$header_text = '&nbsp;';
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading" valign="top"><?php echo $products_name; ?></td>
            <td class="pageHeading" align="right" valign="top"><?php echo $products_price; ?></td>
          </tr>
        </table></td>
      </tr>
<?php
} else {
  $header_text =  $products_name;
}

// BOF: Lango Added for template MOD
if (MAIN_TABLE_BORDER == 'yes'){
  table_image_border_top(false, false, $header_text);
}
// EOF: Lango Added for template MOD
?>
      <tr>
        <td class="main"><br />

		<strong style="color:#383838"><?php echo $products_name; ?></strong><br />
<br style="line-height:5px;" />

<?php
    if (tep_not_null($product_info['products_image'])) {
?>

          <table border="0" cellspacing="0" cellpadding="0" align="left" width="91">
            <tr>
              <td align="center" class="smallText">

<!-- // BOF MaxiDVD: Modified For Ultimate Images Pack! //-->
<?php
      if ($product_info['products_image_med']!='') {
        $new_image = $product_info['products_image_med'];
        $image_width = MEDIUM_IMAGE_WIDTH;
        $image_height = MEDIUM_IMAGE_HEIGHT;
      } else {
        $new_image = $product_info['products_image'];
        $image_width = SMALL_IMAGE_WIDTH;
        $image_height = SMALL_IMAGE_HEIGHT;
      }?>
<script language="javascript"><!--
      document.write('<?php echo '<a href="javascript:popupWindow(\\\'' . tep_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $product_info['products_id'] . '&image=0') . '\\\')">' . tep_image(DIR_WS_IMAGES . $new_image, addslashes($product_info['products_name']), $image_width, $image_height, 'hspace="5" vspace="5" class=picture') . '</a>'; ?>');
//--></script>

<!-- // EOF MaxiDVD: Modified For Ultimate Images Pack! //-->
<!-- // BEGIN  Affiliate program mods for 2.5a upgrade DMG  -->
<?php
      //affiliate build a link begin
      if (tep_session_is_registered('affiliate_id')) {
        echo '<a href="' . tep_href_link(FILENAME_AFFILIATE_BANNERS_BUILD, 'individual_banner_id=' . $product_info['products_id']) .'" target="_self">' . tep_image('includes/languages/english/images/buttons/button_affiliate_build_a_link.gif', 'Make a link') . ' </a>'; ?><?php
      }
      //affiliate build a link begin
?>
<!-- // EOF Affiliate program 2.5a upgrade mods DMG -->
              </td>
            </tr>
          </table>
<?php
    }
?><?php echo stripslashes($product_info['products_description']); ?><br />
<br />
          <strong style="font-size:14px; color:#F7800C">Price: <? echo $products_price; ?></strong><br />
<br />


<?php
   $products_attributes_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS_ATTRIBUTES . " where products_id='" . (int)$HTTP_GET_VARS['products_id'] . "' ");
    $products_attributes = tep_db_fetch_array($products_attributes_query);
    if ($products_attributes['total'] > 0) {
?>
          <table width="100%" border="0" cellspacing="0" cellpadding="2" class="bg0">
            <tr>
              <td class="main" colspan="2"><?php echo TEXT_PRODUCT_OPTIONS; ?></td>
            </tr>
<?php
      $products_options_query = tep_db_query("select pa.options_id, pa.options_values_id, pa.options_values_price, pa.price_prefix, po.options_type, po.options_length, pot.products_options_name, pot.products_options_instruct, ptov.products_options_values_name from
           " . TABLE_PRODUCTS_ATTRIBUTES  . " pa left join 
           " . TABLE_PRODUCTS_OPTIONS_VALUES . " ptov on pa.options_values_id = ptov.products_options_values_id left join
           " . TABLE_PRODUCTS_OPTIONS  . " po on pa.options_id = po.products_options_id left join
           " . TABLE_PRODUCTS_OPTIONS_TEXT  . " pot on po.products_options_id = pot.products_options_text_id and pot.language_id = '" . (int)$languages_id . "'
           where pa.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "'
               and ptov.products_options_values_id is not null
               and po.products_options_id is not null
               order by pa.products_options_sort_order, ptov.products_options_values_id
               ");
      
      // Store the information from the tables in arrays for easy of processing
      $options = array();
      $options_values = array();
                while ($po = tep_db_fetch_array($products_options_query)) {
                  //  we need to find the values name
                  if ( $po['options_type'] != 1  && $po['options_type'] != 4 ) {
                    $options_values_query = tep_db_query("select products_options_values_name from " . TABLE_PRODUCTS_OPTIONS_VALUES . " where products_options_values_id ='". $po['options_values_id'] . "' and language_id = '" . (int)$languages_id . "'");
                    $ov = tep_db_fetch_array($options_values_query);
                  } else {
                    $ov['products_options_values_name'] = '';
                  }
                  $options[$po['options_id']] = array('name' => $po['products_options_name'],
                                                      'type' => $po['options_type'],
                                                      'length' => $po['options_length'],
                                                      'instructions' => $po['products_options_instruct'],
                                                      'price' => $po['options_values_price'],
                                                      'prefix' => $po['price_prefix'],
                                                     );

                  $options_values[$po['options_id']][$po['options_values_id']] =  array('name' => stripslashes($ov['products_options_values_name']),
                                                                                        'price' => $po['options_values_price'],
                                                                                        'prefix' => $po['price_prefix']);
                }
      
      foreach ($options as $oID => $op_data) {
        switch ($op_data['type']) {
            
          case 1:
              $tmp_html = '<input type="text" name="id[' . $oID . '][t]" maxlength="' . $op_data['length'] . '" />'; 
              break;
?>
            <tr>
              <td class="main"><?php echo $op_data['name'] . ':' . ($op_data['instructions'] != '' ? '<br /><span class="smallText">' . $op_data['instructions'] . '</span>' : '' ); ?></td>
              <td class="main"><?php echo $tmp_html;  ?></td>
            </tr>
<?php
            break;
			
          case 4:
            $text_area_array = explode(';',$op_data['length']);
            $cols = $text_area_array[0];
            if ( $cols == '' ) $cols = '100%';
            $rows = $text_area_array[1];
            $tmp_html = '<textarea name="id[' . $oID . '][t]" rows="'.$rows.'" cols="'.$cols.'" wrap="virtual"></textarea>'; 
?>
            <tr>
              <td class="main"><?php echo $op_data['name'] . ':' . ($op_data['instructions'] != '' ? '<br /><span class="smallText">' . $op_data['instructions'] . '</span>' : '' ); ?></td>
              <td class="main"><?php echo $tmp_html;  ?></td>
            </tr>
<?php
            break;
			
          case 2:
            $tmp_html = '';
            foreach ( $options_values[$oID] as $vID => $ov_data ) {
              if ( (int)$ov_data['price'] == 0 ) {
		          		$price = '&nbsp;';
		          } else {
		          		$price = '(&nbsp;' . $ov_data['prefix'] . '&nbsp;' . $currencies->display_price($ov_data['price'], $tax_rate) . '&nbsp;)';
		          }
		          $tmp_html .= '<input type="radio" name="id[' . $oID . ']" value="' . $vID . '">' . $ov_data['name'] . '&nbsp;' . $price . '<br />';
            } // End of the for loop on the option value
?>
            <tr>
              <td class="main"><?php echo $op_data['name'] . ':' . ($op_data['instructions'] != '' ? '<br /><span class="smallText">' . $op_data['instructions'] . '</span>' : '' ); ?></td>
              <td class="main"><?php echo $tmp_html;  ?></td>
            </tr>
<?php
            break;
          
          case 3:
            $tmp_html = '';
            $i = 0;
            foreach ( $options_values[$oID] as $vID => $ov_data ) {
		          if ( (int)$ov_data['price'] == 0 ) {
		            $price = '&nbsp;';
		          } else {
		          	$price = '(&nbsp;'.$ov_data['prefix'] . '&nbsp;' . $currencies->display_price($ov_data['price'], $tax_rate).'&nbsp;)';
		          }
		          $tmp_html .= '<input type="checkbox" name="id[' . $oID . '][c][' . $i . ']" value="' . $vID . '">' . $ov_data['name'] . '&nbsp;' . $price . '<br />';
              $i++;
            }
?>
            <tr>
              <td class="main"><?php echo $op_data['name'] . ':' . ($op_data['instructions'] != '' ? '<br /><span class="smallText">' . $op_data['instructions'] . '</span>' : '' ); ?></td>
              <td class="main"><?php echo $tmp_html;  ?></td>
            </tr>
<?php
            break;
            
          case 0:
            $tmp_html = '<select name="id[' . $oID . ']">';
            foreach ( $options_values[$oID] as $vID => $ov_data ) {
		          if ( (int)$ov_data['price'] == 0 ) {
		          	$price = '&nbsp;';
		          } else {
		          	$price = '(&nbsp; '.$ov_data['prefix'] . '&nbsp;' . $currencies->display_price($ov_data['price'], $tax_rate).'&nbsp;)';
		          }
		          $tmp_html .= '<option value="' . $vID . '"' . ($ov_data['default_value'] == '1' ? 'selected=selected' : '') . '>' . $ov_data['name'] . '&nbsp;' . $price .'</option>';
            } // End of the for loop on the option values
            $tmp_html .= '</select>';
?>
            <tr>
              <td class="main"><?php echo $op_data['name'] . ':' . ($op_data['instructions'] != '' ? '<br /><span class="smallText">' . $op_data['instructions'] . '</span>' : '' ); ?></td>
              <td class="main"><?php echo $tmp_html;  ?></td>
            </tr>
<?php
            break;
        }  //end of switch
      } //end of while
?>
          </table>
<?php
    } // end of ($products_attributes['total'] > 0)
?>
        </td>
      </tr>

<?php
// BOF MaxiDVD: Modified For Ultimate Images Pack!
 if (ULTIMATE_ADDITIONAL_IMAGES == 'enable') { include(DIR_WS_MODULES . 'additional_images.php'); }
// BOF MaxiDVD: Modified For Ultimate Images Pack!
 ?>

<?php
    $reviews_query = tep_db_query("select count(*) as count from " . TABLE_REVIEWS . " where products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "'");
    $reviews = tep_db_fetch_array($reviews_query);
    if ($reviews['count'] > 0) {
?>
      <tr>
        <td class="main"><?php echo TEXT_CURRENT_REVIEWS . ' ' . $reviews['count']; ?></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
<?php
    }
    // Extra Products Fields are checked and presented
    // START: Extra Fields Contribution  DMG
    $extra_fields_query = tep_db_query("SELECT pef.products_extra_fields_status as status, pef.products_extra_fields_name as name, ptf.products_extra_fields_value as value
        FROM ". TABLE_PRODUCTS_EXTRA_FIELDS ." pef
        LEFT JOIN  ". TABLE_PRODUCTS_TO_PRODUCTS_EXTRA_FIELDS ." ptf ON ptf.products_extra_fields_id=pef.products_extra_fields_id
        WHERE ptf.products_id='".(int)$HTTP_GET_VARS['products_id']."' 
          and ptf.products_extra_fields_value<>'' 
          and (pef.languages_id='0' or pef.languages_id='".$languages_id."')
        ORDER BY products_extra_fields_order");
    if ( tep_db_num_rows($extra_fields_query) > 0 ) {
?>
      <tr>
        <td class="main"><table border="0" cellspacing="1" cellpadding="2">
<?php
      while ($extra_fields = tep_db_fetch_array($extra_fields_query)) {
        if (! $extra_fields['status'])  // show only enabled extra field
          continue;
?>
          <tr>
            <td class="main" valign="top"><b><?php echo $extra_fields['name']; ?>:&nbsp;</b></td>
            <td class="main" valign="top"><?php echo $extra_fields['value']; ?></td>
          </tr>
<?php
      }
?>
        </table></td>
      </tr>
<?php
    }
    // END: Extra Fields Contribution
    if (tep_not_null($product_info['products_url'])) {
?>
      <tr>
        <td class="main"><?php echo sprintf(TEXT_MORE_INFORMATION, tep_href_link(FILENAME_REDIRECT, 'action=url&goto=' . urlencode($product_info['products_url']), 'NONSSL', true, false)); ?></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
<?php
    }

    if ($product_info['products_date_available'] > date('Y-m-d H:i:s')) {
?>
      <tr>
        <td align="left" class="main"><?php echo sprintf(TEXT_DATE_AVAILABLE, tep_date_long($product_info['products_date_available'])); ?></td>
      </tr>
<?php
    } else {
?>
      <tr>
        <td align="left" class="main"><?php echo sprintf(TEXT_DATE_ADDED, tep_date_long($product_info['products_date_added'])); ?></td>
      </tr>
<?php
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// MOD begin of sub product

	$sub_products_sql = tep_db_query("select p.products_id, p.products_price, p.products_image, pd.products_name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_parent_id = " . (int)$HTTP_GET_VARS['products_id'] . " and p.products_quantity > '0' and p.products_id = pd.products_id and pd.language_id = " . (int)$languages_id);
	if (tep_db_num_rows($sub_products_sql) > 0) {
		if (MAIN_TABLE_BORDER == 'yes'){
			table_image_border_bottom();
		}
	if (MAIN_TABLE_BORDER == 'yes'){
		table_image_border_top(false, false, '');
	}
?>
      <tr>
        <td align="right" class="main"><table class="bg0">
<?php
  while ($sub_products = tep_db_fetch_array($sub_products_sql)) {
    $subname = substr( $sub_products['products_name'], strlen( $product_info['products_name'] . ' - ' ));
	?>		
					<tr>
						<td class="main"><?php if ($sub_products['products_image']) echo "<img src='images/" . $sub_products['products_image'] . "' />"; ?></td>
						<td class="main">&nbsp;<b><?php echo $subname; ?></b></td>
						<td class="smallText">&nbsp;<?php echo $currencies->display_price($sub_products['products_price'], tep_get_tax_rate($product_info['products_tax_class_id'])); ?></td>
						<td align="right" class="smallText" style="color:#838383">&nbsp;Quantity:&nbsp;<input type="text" name="sub_products_qty[]" value="0" size="5" /></td>
					</tr>
	<?php
		echo '<input type="hidden" name="sub_products_id[]" value="' . $sub_products['products_id'] . '">';
	}
?>
        </table></td>
      </tr>
<?php  
}
// MOD end of sub product
///////////////////////////////////////////////////////////////////////////////////////////////////////////

// BOF: Lango Added for template MOD
if (MAIN_TABLE_BORDER == 'yes'){
table_image_border_bottom();
}
// EOF: Lango Added for template MOD
?>
        <td height="10" class="main"></td>
      </tr>
      <tr>
        <td><table border="0" width="95%" align="center" cellspacing="0" cellpadding="0" class="infoBox">
          <tr class="infoBoxContents">
            <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td valign="middle"><?php echo '<a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS, tep_get_all_get_params()) . '">' . tep_template_image_button('button_reviews.gif', IMAGE_BUTTON_REVIEWS,'align="absmiddle"') . '</a>'; ?></td>
               <!-- Begin Wishlist Code -->
                <!-- <td align="center" class="main2" valign="middle" width="100">
                <?php if (DESIGN_BUTTON_WISHLIST == 'true') {
                echo '<a href="' . tep_href_link(FILENAME_WISHLIST, tep_get_all_get_params(array('action')) . 'action=add_wishlist') . '">' . tep_image_button('button_add_wishlist.gif', IMAGE_BUTTON_ADD_WISHLIST,'align="absmiddle"') . '</a>' ;
                } ; ?>
                </td>-->
               <!-- End Wishlist Code -->
				 <!--td class="main" align="right"><?php //echo tep_draw_hidden_field('products_id', $product_info['products_id']) . tep_template_image_submit('button_in_cart.gif', IMAGE_BUTTON_IN_CART); ?></form></td-->
				<td align="right" valign="middle" style="color:#838383">
		<?php if (tep_db_num_rows($sub_products_sql) ==0) {
	                    echo TEXT_ENTER_QUANTITY . ":" . tep_draw_input_field('cart_quantity', '1', 'size="6"');
			}
			echo '<span style="padding-left: 2px"></span>'.tep_draw_hidden_field('products_id', $product_info['products_id']) . tep_image_submit('button_in_cart.gif', IMAGE_BUTTON_IN_CART,'align="absmiddle"'); 
		?>
                </form></td>
            </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td class="bg0"><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
<?php
   if ( (USE_CACHE == 'true') && !SID) {
    echo tep_cache_also_purchased(3600);
     include(DIR_WS_MODULES . FILENAME_XSELL_PRODUCTS);
    } else {
     include(DIR_WS_MODULES . FILENAME_XSELL_PRODUCTS_BUYNOW);
  include(DIR_WS_MODULES . FILENAME_ALSO_PURCHASED_PRODUCTS);

    }
   }
?>
       </td>
      </tr>
    </table>

