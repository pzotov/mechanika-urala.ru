<?php
/*
  $Id: whats_new.php,v 1.1.1.1 2004/03/04 23:42:16 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  CRE Loaded , Open Source E-Commerce Solutions
  http://www.creloaded.com
 
  Chain Reaction Works, Inc
  Portions: Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
 	
 	Last Modified by $Author$
 	Last Modifed on : $Date$
 	Latest Revision : $Revision: 1075 $


  Released under the GNU General Public License
*/

  if ($random_product = tep_random_select("select products_id, products_image, products_tax_class_id, products_price from " . TABLE_PRODUCTS . " where DATE_SUB(CURDATE(),INTERVAL " .NEW_PRODUCT_INTERVAL ." DAY) <= products_date_added and products_status = '1' order by products_date_added desc limit " . MAX_RANDOM_SELECT_NEW)) {
?>
<!-- whats_new //-->
<tr><td class="tab_linex"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td></tr>
          <tr>

<td ><table border="0" cellpadding="0" cellspacing="0" style="width:100%;"><tr><td class="tab_liney" ><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td><td class="lef4">

<div><font color="<?= $font_color ?>"><?= BOX_HEADING_WHATS_NEW ?> </font><br><br style="line-height:5px;"></div>
<?php               
//Eversun mod for sppc and qty price breaks
			  /*
    $random_product['products_name'] = tep_get_products_name($random_product['products_id']);
    $random_product['specials_new_products_price'] = tep_get_products_special_price($random_product['products_id']);
*/
$random_product['products_name'] = tep_get_products_name($random_product['products_id']);
  $random_product['specials_new_products_price'] = tep_get_products_special_price($random_product['products_id']);
// BOF Separate Pricing Per Customer
// global variable (session) $sppc_customer_group_id -> local variable customer_group_id

  if(!tep_session_is_registered('sppc_customer_group_id')) {
  $customer_group_id = '0';
  } else {
   $customer_group_id = $sppc_customer_group_id;
  }

       if ($customer_group_id !='0') {
	$customer_group_price_query = tep_db_query("select customers_group_price from " . TABLE_PRODUCTS_GROUPS . " where products_id = '" . $random_product['products_id'] . "' and customers_group_id =  '" . $customer_group_id . "'");
	  if ($customer_group_price = tep_db_fetch_array($customer_group_price_query)) {
	    $random_product['products_price'] = $customer_group_price['customers_group_price'];
	  }
     }
// EOF Separate Pricing Per Customer
//Eversun mod end for sppc and qty price breaks
    $info_box_contents = array();
$info_box_contents[] = array('text'  => '

							<strong> <font color="' . $font_color . '">' . BOX_HEADING_WHATS_NEW . '</font></strong>');
    //new info2BoxHeading2($info_box_contents, false, false);

    if (tep_not_null($random_product['specials_new_products_price'])) {
      $whats_new_price = '<s>' . $currencies->display_price($random_product['products_price'], tep_get_tax_rate($random_product['products_tax_class_id'])) . '</s><br>';
      $whats_new_price .= '<span class="productSpecialPrice">' . $currencies->display_price($random_product['specials_new_products_price'], tep_get_tax_rate($random_product['products_tax_class_id'])) . '</span>';
    } else {
      $whats_new_price = $currencies->display_price($random_product['products_price'], tep_get_tax_rate($random_product['products_tax_class_id']));
    }


   $whats_query = tep_db_query("select products_description  from " . TABLE_PRODUCTS_DESCRIPTION . " where products_id = '" .(int)$random_product['products_id'] . "' and language_id = '" . (int)$languages_id . "'");
   $whats_description = tep_db_fetch_array($whats_query);

    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'left',
                                
				 'text' => '
							
							
							
							
							<td class="lef_5">
									<img alt="" src="'. DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/img1.jpg" style="margin-right:9px; float:left;"><br style="line-height:6px;">
									<img alt="" src="'. DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/red1.gif" style="margin:0 4px 1px 0;"><strong><a href=" ' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $random_product['products_id']) . ' ">'. substr($random_product['products_name'], 0, 10) .'</a></strong><br><br style="line-height:5px;">
									<img alt="" src="'. DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="11" height="1"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $random_product['products_id']) . '">' . $whats_new_price .'</a>
								</td>
							
							
							
							
							
				 
');

//Eversun mod for sppc and qty price breaks

 new info3Box($info_box_contents);
$info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                                'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
                              );
// new WNboxFooter($info_box_contents, true, true);

?>
</div>
          </td>
		  <td class="tab_liney"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td>
									</tr>
									
									
								</table>

		    </td>
          </tr>
		  <tr>
									
				 <td class="tab_linex"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td>
									</tr>
									<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="2"></td></tr>
<!-- whats_new_eof //-->
<?php
  }
?>
